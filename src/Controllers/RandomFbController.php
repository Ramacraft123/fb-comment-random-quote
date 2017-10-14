<?php

namespace App\Controllers;

class RandomFbController
{
	private $app;

	public function __construct($app)
	{
		$this->app = $app;
	}

	public function index()
	{
		$stmt = $this->app->getContainer()->get('db')->prepare('SELECT * FROM quote');
		$stmt->execute();
		$quotes = $stmt->fetchAll();
		$randomQuoteIndex = rand(0, count($quotes) - 1);

		$name = $this->app->getRequest()->segment(1);
		$selectedQuote = $quotes[$randomQuoteIndex];
		$quoteContent = str_replace("{nama}", $name, $selectedQuote['content']);

		$this->app->getResponse()->html('random-fb', [
			'nama' => $name,
			'quoteContent' => $quoteContent,
			'quote' => $quotes[$randomQuoteIndex]
		]);
	}
}