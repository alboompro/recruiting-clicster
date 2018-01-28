<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/24/18
 * Time: 12:10 AM
 */

namespace App\Authentication\Models;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';

    /**
     * Make a query that returns all data including relationship between tables
     *
     * @param $user_id
     */
    public function eagerGetUsersById($user_id)
    {
        $user_data = [];

        if (!empty($user_id)) {
            $user_data['user']['data'] = DB::table('users')
                       ->join('companies', 'companies.company_id', '=', 'users.company_id')
                       ->where('users.user_id', $user_id)
                       ->get()[0];

            $phones = DB::table('phones')
                          ->where('user_id', $user_id)
                          ->get();

            $emails = DB::table('emails')
                         ->where('user_id', $user_id)
                         ->get();

            if( !empty($phones) )
                $user_data['user']['phones'] = $phones;

            if( !empty($phones) )
                $user_data['user']['emails'] = $emails;

            return $user_data;
        }
    }
}