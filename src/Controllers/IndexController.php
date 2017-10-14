<?php

namespace App\Controllers;

use App\HtmlView;

class IndexController
{
    private $app;
    
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function index()
	{
        return $this->app->getResponse()->html('index');
	}
}
