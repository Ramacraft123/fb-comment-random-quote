<?php

namespace App;

class HtmlView
{
	private $viewsDirectory = __DIR__ . '/views/';
	private $compiledView;

	public function __construct($viewName, $data)
	{
		ob_start();
		extract($data);
		include $this->viewsDirectory . $viewName . '.php';
		$this->compiledView = ob_get_contents();
		ob_end_clean();
	}

	public function render()
	{
		echo $this->compiledView;
	}
}