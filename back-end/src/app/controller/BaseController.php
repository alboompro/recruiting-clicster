<?php
// The base controller will be responsible for manage all others controllers
use Interop\Container\ContainerInterface;

abstract class BaseController
{
    protected $db;

    public function __construct(ContainerInterface $ci)
    {
        // Setting the db configuration to the db attribute
        $this->db = $ci->get('db');
    }

    public function __invoke($request, $response, $args)
    {

    }

    // With this method, won't be necessary to format all responses
    public function getPreparedResponse($response, $data)
    {
      return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withJson($data);
    }

}
