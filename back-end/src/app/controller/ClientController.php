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

        $clientList = $clientModel->get();

        return $this->getPreparedResponse($response, $clientList);
    }

    public function create($request, $response, $args)
    {
        $clientModel = new ClientModel($this->db);

        $clientInsertionReturn = $clientModel->insert($request->getParsedBody());

        return $this->getPreparedResponse($response, $clientInsertionReturn);
    }

}
