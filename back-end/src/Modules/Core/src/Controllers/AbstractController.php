<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/24/18
 * Time: 1:22 AM
 */

namespace App\Core\Controllers;

use Slim\Container;

abstract class AbstractController
{

    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

}