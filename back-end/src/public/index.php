<?php

ini_set('display_errors', 'On');

error_reporting( E_ALL );

mb_internal_encoding("UTF-8");

$currentDirectory = __DIR__.'/..';

require $currentDirectory.'/app/start.php';
