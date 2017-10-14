<?php

use App\Controllers\RandomFbController;
use App\Controllers\IndexController;
use App\Controllers\QuoteController;

return [
	"/^\/$/" => [
		"get" => [
			'controller' => IndexController::class,
			'action' => 'index'
		]	
	],
	"/^\/[a-zA-Z0-9 `~\!@#\$%\^&\*\(\)\[\]_\-\+\|\:=\<\>,.\?\{\}]+\/*$/" => [
		'get' => [
			'controller' => RandomFbController::class,
			'action' => 'index'
		],
	],
	"/^\/quote\/create\/*$/" => [
		'get' => [
			'controller' => QuoteController::class,
			'action' => 'index'
		],
		'post' => [
			'controller' => QuoteController::class,
			'action' => 'createQuote'
		]
	],
	"/^\/quote\/batch-create\/*$/" => [
		'get' => [
			'controller' => QuoteController::class,
			'action' => 'showBatchCreateForm'
		],
		'post' => [
			'controller' => QuoteController::class,
			'action' => 'createQuotesInBatch'
		]
	]
];