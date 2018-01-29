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
                       ->where('users.user_id', $user_id)
                       ->get()[0];

            $contacts = DB::table('contacts')
                          ->where('user_id', $user_id)
                          ->get();

            if( !empty($contacts) )
                $user_data['user']['contacts'] = $contacts;


            return $user_data;
        }
    }

    /**
     * Insert a new User and then insert him contacts if exists
     *
     * @param $data
     * @return mixed
     *
     */
    public function createUser($data)
    {
        if (!is_null($data)) {
            $this->company_name = $data['companyName'];
            $this->first_name   = $data['firstName'];
            $this->last_name    = $data['lastName'];
            $this->address      = $data['address'];
            $this->save();

            $contact = new Contact();
            $contact->createContacts($data['contacts'], $this->user_id);

            return $this->user_id;
        }
    }

    /**
     * @param $user_id
     */
    public function remove($user_id)
    {
        $contact = new Contact();

        if($contact->remove($user_id))
            User::where('user_id' , '=', $user_id)->delete();

    }

    /**
     * @param array $user_id
     * @param array $new_data
     * @return bool|void
     */
    public function update($user_id, $new_data)
    {
        print_r($new_data);
        User::where('user_id', $user_id)
            ->update([
                'company_name' => $new_data['company_name'],
                'first_name'   => $new_data['first_name'],
                'last_name'    => $new_data['last_name'],
                'address'      => $new_data['address']
            ]);
    }

}