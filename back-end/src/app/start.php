<?php

require '../vendor/autoload.php';

spl_autoload_register(function ($classname) {
    $currentDirectory = __DIR__.'/..';

    if( file_exists( $currentDirectory . "/app/controller/" . $classname . ".php" ) )
        require ( $currentDirectory . "/app/controller/" . $classname . ".php" );
});

$config['displayErrorDetails'] = true;

$app = new \Slim\App(['settings' => $config]);

require 'routes.php';

$app->run();
