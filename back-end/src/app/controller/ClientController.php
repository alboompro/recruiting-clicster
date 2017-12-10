<?php

use Interop\Container\ContainerInterface;

class ClientController extends BaseController
{
    public function __construct(ContainerInterface $ci)
    {

    }

    public function index($request, $response, $args)
    {
        return $response;
    }
    
}
