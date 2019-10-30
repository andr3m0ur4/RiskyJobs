<?php  

require_once 'vendor/autoload.php';

$app = new \Slim\Slim ( );

$app -> get ( '/', function ( ) {
	header ( "Location: search.html" );
});

$app->run();
