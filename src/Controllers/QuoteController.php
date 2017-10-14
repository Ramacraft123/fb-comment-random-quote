<?php

namespace App\Controllers;

use App\HtmlView;

class QuoteController
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
		return $this->app->getResponse()->html('quote/index', [
			'quotes' => $quotes
		]);
	}

	public function createQuote()
	{
		$title = $this->app->getRequest()->post('title');
		$content = $this->app->getRequesy()->post('content');
		$pictureUrl = $this->app->getRequest()->post('picture_url');

		$stmt = $this->app->getContainer()->get('db')->prepare("INSERT INTO quote(title, content, picture_url) VALUES (:title, :content, :picture_url)");
		$stmt->execute([
			':title' => $title,
			':content' => $content,
			':picture_url' => $pictureUrl
		]);
		return $this->app->getResponse()->redirect('/quote/create');
	}

	public function showBatchCreateForm()
	{
		return $this->app->getResponse()->html('quote/batch-create');
	}

	public function createQuotesInBatch()
	{
		$quotesJson = $this->app->getRequest()->post('quotes');
		$decodedQuotes = json_decode($quotesJson);
		$filteredDecodedQuotes = array_filter($decodedQuotes, function($quote) {
			return (
				isset($quote->title) &&
				isset($quote->content) &&
				isset($quote->picture_url)
			);
		});

		$stmt = $this->app->getContainer()->get('db')->prepare("INSERT INTO quote(title, content, picture_url) VALUES (:title, :content, :picture_url)");

		foreach ($filteredDecodedQuotes as $quote) {
			$stmt->execute([
				':title' => $quote->title,
				':content' => $quote->content, 
				':picture_url' => $quote->picture_url
			]);
		}

		$this->app->getResponse()->redirect('/quote/create');
	}
}
