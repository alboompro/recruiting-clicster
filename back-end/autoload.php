<?php
/**
 * Here we load all the vendor(packgist) modules and
 * load our app modules using psr4 autoload.
 */
$composer = require __DIR__ . '/vendor/autoload.php';

$modules = path_modules('/src');

foreach($modules as &$module) {
    $namespace = explode("/", $module);
    $namespace = $namespace[count($namespace) - 2];
    $composer->setPsr4('App\\'.$namespace.'\\', $module);
}

return $composer;