<?php

use Interop\Container\ContainerInterface;

class ClientController extends BaseController
{
    public function __construct(ContainerInterface $ci)
    {
        Parent::__construct($ci);
    }

    public function index($request, $response, $args)
    {
        $clientModel = new ClientModel($this->db);
        return $response->withJson($clientModel->get());
    }

}
