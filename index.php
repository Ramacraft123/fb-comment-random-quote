<?php

use App\Container;
use App\Application;
use App\ApplicationWrapper;
use App\Request;
use App\Response;

require_once 'vendor/autoload.php';

$config = require 'src/config.php';

$container = new Container($config);
$container->setLazy('db', function(Container $container) {
    $dbConfig = $container->getConfig('database');
    $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['name']};charset={$dbConfig['charset']}";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    return new PDO($dsn, $dbConfig['username'], $dbConfig['password'], $opt);
});

$request = Request::createFromGlobal($_SERVER, $_GET, $_POST);
$response = new Response();

$app = new Application($request, $response, $container);
$applicationWrapper = new ApplicationWrapper($app);
$applicationWrapper->run(); 