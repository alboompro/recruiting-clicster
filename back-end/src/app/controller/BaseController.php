<?php

use Interop\Container\ContainerInterface;

abstract class BaseController
{
    public function __construct(ContainerInterface $ci)
    {

    }

    public function __invoke($request, $response, $args)
    {

    }



}
