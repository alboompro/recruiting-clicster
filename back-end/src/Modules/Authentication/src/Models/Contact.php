<?php
/**
 * Created by PhpStorm.
 * User: pedroguimaraes
 * Date: 1/28/18
 * Time: 9:42 PM
 */

namespace App\Authentication\Models;


use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact_id';

    public function createContacts($data, $user_id)
    {


        foreach ($data as $d) {
            $contact = new Contact();
            $contact->user_id = $user_id;
            $contact->type = $d['type'];
            $contact->contact = $d['contact'];
            $contact->save();
        }
    }

    public function remove($user_id)
    {
        return Contact::where('user_id', '=', $user_id)->delete();
    }
}