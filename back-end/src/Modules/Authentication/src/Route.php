<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/24/18
 * Time: 1:25 AM
 */

namespace App\Authentication;

use App\Authentication\Controllers\DefaultController;
use App\Authentication\Controllers\UserController;
use App\Core\AbstractRoute;

class Route extends AbstractRoute
{
    public function create()
    {
        /** Solve problems with CORS */
        $this->app->add(function ($req, $res, $next) {
            $response = $next($req, $res);
            return $response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        });

        /** GET ROUTES */
        //1 - Default route to get all users
        $this->app->get('/', DefaultController::class . ':index');

        //2 - Get all users
        $this->app->get('/api/users', UserController::class . ':getAll');

        //3 - Get all data from a single user
        $this->app->get('/api/user[/{id}]', UserController::class . ':getUsersById');


        /** POST ROUTES */
        $this->app->post('/api/create/user', UserController::class . ':createUser');

        /** DELETE ROUTES */
        $this->app->delete('/api/delete[/{id}]', UserController::class . ':deleteUser');
    }
}