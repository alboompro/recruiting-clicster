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
     */
    public function getAll(Request $request, Response $response, $args)
    {
        $json = json_encode(User::all());
        return $response->withHeader('Content-type', 'application/json')
                        ->withStatus(200)
                        ->withJson($json);

    }


    /**
     * Get a single user informations
     *
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return json
     */
    public function getUsersById(Request $request, Response $response, $args)
    {
        if (is_null($args) || empty($args)) {
            $data = [
                "code" => '400',
                "message" => "Invalid request",
                "detail" => "'Args are needed: http://url/args"
            ];
            ;
            return $response->withHeader('Content-type', 'application/json')
                            ->withStatus(400)
                            ->withJson($data);
        }

        $data = User::eagerGetUsersById($args['id']);

        if (!empty($data) && !is_null($data)) {

            $json = json_encode($data);
            return $response->withHeader('Content-type', 'application/json')
                            ->withStatus(200)
                            ->withJson($data);
        }
    }
}