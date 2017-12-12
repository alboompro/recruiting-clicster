<?php

$app->get('/client/{cli_id}', 'ClientController:show');
$app->get('/client', 'ClientController:index');
$app->post('/client', 'ClientController:create');
$app->put('/client/{cli_id}', 'ClientController:update');
$app->delete('/client/{cli_id}', 'ClientController:delete');
