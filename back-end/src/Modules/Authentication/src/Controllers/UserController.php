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

    public function getUsers(Request $request, Response $response, $args)
    {
      $response->withHeader('Content-type', 'application/json');
      return json_encode(User::all());
    }

    public function getUsersById()
    {

    }

}