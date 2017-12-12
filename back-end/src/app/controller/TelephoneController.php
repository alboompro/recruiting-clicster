<?php

use Interop\Container\ContainerInterface;

class TelephoneController extends BaseController
{
    public function __construct(ContainerInterface $ci)
    {
        Parent::__construct($ci);
    }

    public function index($request, $response, $args)
    {
        $telephoneModel = new TelephoneModel($this->db);

        $telephoneList = $telephoneModel->get();

        return $this->getPreparedResponse($response, $telephoneList);
    }

    public function show($request, $response, $args)
    {
        $telephoneModel = new TelephoneModel($this->db);

        $telephone = $telephoneModel->find($args['tel_id']);

        return $this->getPreparedResponse($response, $telephone);
    }

    public function create($request, $response, $args)
    {
        $telephoneModel = new TelephoneModel($this->db);

        $telephoneInsertionReturn = $telephoneModel->insert($request->getParsedBody());

        return $this->getPreparedResponse($response, $telephoneInsertionReturn);
    }

    public function update($request, $response, $args)
    {
        $telephoneModel = new TelephoneModel($this->db);

        $telephoneUpdateReturn = $telephoneModel->update($args['tel_id'], $request->getParsedBody());

        return $this->getPreparedResponse($response, $telephoneUpdateReturn);
    }

    public function delete($request, $response, $args)
    {
        $telephoneModel = new TelephoneModel($this->db);

        $telephone = $telephoneModel->delete($args['tel_id']);

        return $this->getPreparedResponse($response, $telephone);
    }

}
