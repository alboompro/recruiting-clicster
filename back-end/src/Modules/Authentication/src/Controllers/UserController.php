<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/24/18
 * Time: 3:53 AM
 */

namespace App\Authentication\Controllers;

use App\Authentication\Models\User;
use App\Core\Controllers\AbstractController;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends AbstractController
{

    /**
     * Default method, that aims to get all users.
     *
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function getAll(Request $request, Response $response, $args)
    {
        $data = User::all();
        return $response->withHeader('Content-type', 'application/json')
                        ->withHeader('Access-Control-Allow-Origin', '*')
                        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                        ->withStatus(200)
                        ->withJson($data);

    }


    /**
     * Get a single user information
     *
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function getUsersById(Request $request, Response $response, $args)
    {
        if (is_null($args) || empty($args)) {
            $data = [
                "code" => '400',
                "message" => "Invalid request",
                "detail" => "'Args are needed: http://url/args"
            ];

            return $response->withHeader('Content-type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', '*')
                            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                            ->withStatus(400)
                            ->withJson($data);
        }

        $data = User::eagerGetUsersById($args['id']);

        if (!empty($data) && !is_null($data)) {

            return $response->withHeader('Content-type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', '*')
                            ->withStatus(200)
                            ->withJson($data);
        }
    }


    /**
     * Receive post data from api.
     *
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function createUser(Request $request, Response $response, $args)
    {
        $data  = $request->getParsedBody();

        return $response->withHeader('Content-type', 'application/json')
                        ->withHeader('Access-Control-Allow-Origin', '*')
                        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                        ->withStatus(200)
                        ->withJson($data);

    }
}