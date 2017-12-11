<?php

use Interop\Container\ContainerInterface;

abstract class BaseController
{
    protected $db;

    public function __construct(ContainerInterface $ci)
    {
        $this->db = $ci->get('db');
    }

    public function __invoke($request, $response, $args)
    {

    }

}
