<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/24/18
 * Time: 1:20 AM
 */

namespace App\Core;


use Slim\App;

abstract class AbstractRoute
{
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    abstract public function create();
}