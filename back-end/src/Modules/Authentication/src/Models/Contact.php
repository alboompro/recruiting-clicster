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

    /**
     * @param $data
     * @param $user_id
     */
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

    /**
     * @param $user_id
     * @return mixed
     */
    public function remove($user_id)
    {
        return Contact::where('user_id', '=', $user_id)->delete();
    }

    /**
     * @param array $user_id
     * @param array $data
     * @return bool|void
     */
    public function update($user_id, $data)
    {
        foreach($data as $d) {
            if(isset($d['contact_id'])){
                Contact::where('user_id', $user_id)
                    ->where('contact_id', $d['contact_id'])
                    ->update([
                        'type' => $d['type'],
                        'contact' => $d['contact']
                    ]);
            }else{
                $contact = new Contact();
                $contact->user_id = $user_id;
                $contact->type = $d['type'];
                $contact->contact = $d['contact'];
                $contact->save();
            }
        }
    }
}