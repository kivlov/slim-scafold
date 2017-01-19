<?php

$app = new \Slim\App([
	'settings' => [
		'displayErrorDetails'=> false
	]
]);

require __DIR__.'/container.php';
require __DIR__.'/../routes/web.php';