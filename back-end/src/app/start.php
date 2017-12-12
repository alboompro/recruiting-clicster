<?php
// This file will provide the project configuration, like, file registering,
// database connection (in this case Eloquent + Mysql).
require '../vendor/autoload.php';

spl_autoload_register(function ($classname) {
    $currentDirectory = __DIR__.'/..';

    if( file_exists( $currentDirectory . "/app/controller/" . $classname . ".php" ) )
        require ( $currentDirectory . "/app/controller/" . $classname . ".php" );

    if( file_exists( $currentDirectory . "/app/model/" . $classname . ".php" ) )
        require ( $currentDirectory . "/app/model/" . $classname . ".php" );
});

$config['determineRouteBeforeAppMiddleware'] = false;
$config['displayErrorDetails'] = true;

$config['db']['driver']     = 'mysql';
$config['db']['host']       = 'localhost';
$config['db']['database']   = 'alboom';
$config['db']['username']   = 'geovane';
$config['db']['password']   = '';
$config['db']['charset']    = 'utf8';
$config['db']['collation']  = 'utf8_general_ci';
$config['db']['prefix']     = '';

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

require 'routes.php';

$app->run();
