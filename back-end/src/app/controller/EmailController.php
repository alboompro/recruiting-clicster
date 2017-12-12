<?php

use Interop\Container\ContainerInterface;

class EmailController extends BaseController
{
    public function __construct(ContainerInterface $ci)
    {
        Parent::__construct($ci);
    }

    public function index($request, $response, $args)
    {
        $emailModel = new EmailModel($this->db);

        $emailList = $emailModel->get();

        return $this->getPreparedResponse($response, $emailList);
    }

    public function show($request, $response, $args)
    {
        $emailModel = new EmailModel($this->db);

        $email = $emailModel->find($args['ema_id']);

        return $this->getPreparedResponse($response, $email);
    }

    public function create($request, $response, $args)
    {
        $emailModel = new EmailModel($this->db);

        $emailInsertionReturn = $emailModel->insert($request->getParsedBody());

        return $this->getPreparedResponse($response, $emailInsertionReturn);
    }

    public function update($request, $response, $args)
    {
        $emailModel = new EmailModel($this->db);

        $emailUpdateReturn = $emailModel->update($args['ema_id'], $request->getParsedBody());

        return $this->getPreparedResponse($response, $emailUpdateReturn);
    }

    public function delete($request, $response, $args)
    {
        $emailModel = new EmailModel($this->db);

        $email = $emailModel->delete($args['ema_id']);

        return $this->getPreparedResponse($response, $email);
    }

}
