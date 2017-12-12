<?php

use Interop\Container\ContainerInterface;

class CompanyController extends BaseController
{
    public function __construct(ContainerInterface $ci)
    {
        Parent::__construct($ci);
    }

    public function index($request, $response, $args)
    {
        $companyModel = new CompanyModel($this->db);

        $companyList = $companyModel->get();

        return $this->getPreparedResponse($response, $companyList);
    }

    public function show($request, $response, $args)
    {
        $companyModel = new CompanyModel($this->db);

        $company = $companyModel->find($args['com_id']);

        return $this->getPreparedResponse($response, $company);
    }

    public function create($request, $response, $args)
    {
        $companyModel = new CompanyModel($this->db);

        $companyInsertionReturn = $companyModel->insert($request->getParsedBody());

        return $this->getPreparedResponse($response, $companyInsertionReturn);
    }

    public function update($request, $response, $args)
    {
        $companyModel = new CompanyModel($this->db);

        $companyUpdateReturn = $companyModel->update($args['com_id'], $request->getParsedBody());

        return $this->getPreparedResponse($response, $companyUpdateReturn);
    }

    public function delete($request, $response, $args)
    {
        $companyModel = new CompanyModel($this->db);

        $company = $companyModel->delete($args['com_id']);

        return $this->getPreparedResponse($response, $company);
    }

}
