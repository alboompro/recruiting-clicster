<?php

$app->get('/client', 'ClientController:index');
$app->post('/client', 'ClientController:create');
