<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/24/18
 * Time: 1:25 AM
 */

namespace App\Authentication;

use App\Authentication\Controllers\UserController;
use App\Core\AbstractRoute;

class Route extends AbstractRoute
{
    public function create()
    {
        //1 - Default route to get all users
        $this->app->get('/', UserController::class . ':getAll');

        //2 - Get all data from a single user
        $this->app->get('/users[/{id}]', UserController::class . ':getUsersById');
    }
}