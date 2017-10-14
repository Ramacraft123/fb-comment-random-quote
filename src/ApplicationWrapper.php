<?php

namespace App;

use App\HtmlView;

class ApplicationWrapper
{
	private $application;

	public function __construct($application)
	{
		$this->application = $application;
	}

	public function run()
	{
		try {
			$this->application->run();
		} catch(\Exception $e) {
			return $this->application->getResponse()->html('errors/index', [
				'errorMessage' => $e->getMessage()
			]);
		}
	}
} 