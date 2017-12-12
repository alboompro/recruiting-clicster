<?php
// CLIENT ROUTES
$app->get('/client/{cli_id}', 'ClientController:show');
$app->get('/client', 'ClientController:index');
$app->post('/client', 'ClientController:create');
$app->put('/client/{cli_id}', 'ClientController:update');
$app->delete('/client/{cli_id}', 'ClientController:delete');

// COMPANY ROUTES
$app->get('/company/{com_id}', 'CompanyController:show');
$app->get('/company', 'CompanyController:index');
$app->post('/company', 'CompanyController:create');
$app->put('/company/{com_id}', 'CompanyController:update');
$app->delete('/company/{com_id}', 'CompanyController:delete');

// EMAIL ROUTES
$app->get('/email/{ema_id}', 'EmailController:show');
$app->get('/email', 'EmailController:index');
$app->post('/email', 'EmailController:create');
$app->put('/email/{ema_id}', 'EmailController:update');
$app->delete('/email/{ema_id}', 'EmailController:delete');

// TELEPHONE ROUTES
$app->get('/telephone/{tel_id}', 'TelephoneController:show');
$app->get('/telephone', 'TelephoneController:index');
$app->post('/telephone', 'TelephoneController:create');
$app->put('/telephone/{tel_id}', 'TelephoneController:update');
$app->delete('/telephone/{tel_id}', 'TelephoneController:delete');
