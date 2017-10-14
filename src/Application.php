<?php

namespace App;

class Application
{
	private $request;
	private $container;
	private $response;

	public function __construct($request, $response, $container)
	{
		$this->request = $request;
		$this->response = $response;
		$this->container = $container;
	}

	public function getContainer()
	{
		return $this->container;
	}

	public function getRequest()
	{
		return $this->request;
	}

	public function getResponse()
	{
		return $this->response;
	}

	public function run()
	{
		$requestUri = $this->request->uri();
		$requestMethod = $this->request->method();
		
		$selectedRoutes = array_values(array_filter(
			$this->routesMap(), 
				function ($routePattern) use ($requestUri) {
					return preg_match($routePattern, $requestUri);
				}, 
		ARRAY_FILTER_USE_KEY));
		
		if (empty($selectedRoutes)) {
			throw new \Exception('No Route Found');
		}

		$selectedRoute = $selectedRoutes[0];

		if (!isset($selectedRoute[$requestMethod])) {
			throw new \Exception('No Appropiate Handler for this request method found');
		}

		$controller = new $selectedRoute[$requestMethod]['controller']($this);
		$controller->{$selectedRoute[$requestMethod]['action']}();
	}

	public function routesMap()
	{
		return require 'routes.php';
	}
}