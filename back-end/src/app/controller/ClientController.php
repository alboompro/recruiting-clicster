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

    public function show($request, $response, $args)
    {
        $clientModel = new ClientModel($this->db);

        $client = $clientModel->find($args['cli_id']);

        return $this->getPreparedResponse($response, $client);
    }

    public function create($request, $response, $args)
    {
        $clientModel = new ClientModel($this->db);

        $clientInsertionReturn = $clientModel->insert($request->getParsedBody());

        return $this->getPreparedResponse($response, $clientInsertionReturn);
    }

    public function update($request, $response, $args)
    {
        $clientModel = new ClientModel($this->db);

        // var_dump($args['cli_id'], $request->getParsedBody());
        // die();

        // $clientUpdateReturn = $clientModel->find($args['cli_id'])->update($request->getParsedBody());
        $clientUpdateReturn = $clientModel->update($args['cli_id'], $request->getParsedBody());

        return $this->getPreparedResponse($response, $clientUpdateReturn);
    }

}
