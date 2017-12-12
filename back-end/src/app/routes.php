<?php

$app->get('/client/{cli_id}', 'ClientController:show');
$app->get('/client', 'ClientController:index');
$app->post('/client', 'ClientController:create');
$app->put('/client/{cli_id}', 'ClientController:update');
$app->delete('/client/{cli_id}', 'ClientController:delete');

$app->get('/email/{ema_id}', 'EmailController:show');
$app->get('/email', 'EmailController:index');
$app->post('/email', 'EmailController:create');
$app->put('/email/{ema_id}', 'EmailController:update');
$app->delete('/email/{ema_id}', 'EmailController:delete');
