<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/24/18
 * Time: 1:25 AM
 */

namespace App\Authentication;

use App\Core\AbstractRoute;

class Route extends AbstractRoute
{
    public function create()
    {
        $this->app->get('/login', function() {
            return 'Login';
        });
    }
}