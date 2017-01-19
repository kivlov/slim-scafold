<?php

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$container = $app->getContainer();

$container['db'] = function() {
	return new PDO("mysql:host=".getenv('DB_HOST').";dbname=".getenv('DB_NAME')."", getenv('DB_USER'), getenv('DB_PASS'));
};

$container['view'] = function($container) {
	$view = new \Slim\Views\Twig(__DIR__ . '/../templates', ['cache' => false ]);
	$basePath = rtrim(str_ireplace('index.php','', $container['request']->getUri()->getBasePath()), '/');
	$view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
	return $view;
};