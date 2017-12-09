<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../config/config.php';


$app = new \Slim\App(['settings' => $config]);
$app->get('/teste', function (Request $request, Response $response) {

    $response->getBody()->write("Hello alboom!");

    return $response->withHeader('Access-Control-Allow-Origin', '*');
});

$app->run();
