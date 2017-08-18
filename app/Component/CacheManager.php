<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 2017/8/18
 * Time: 下午4:27
 */

namespace App\Component;


class CacheManager
{

    public function getAllEmail(){

         $key = config('common.cachelist.emails.name');
         $emails =  \Cache::get($key);
         if(empty($emails)){

             $emails_model = \DB::table('email_users')->get()->toArray();
             if(!empty($emails_model)){

                 foreach ($emails_model as $item){
                     $emails[$item->email] =$item->name;
                 }

                 \Cache::forever($key,$emails);
             }
         }

        return $emails;
    }

    public function deleteEmail(){
        $key = config('common.cachelist.emails.name');
        \Cache::forget($key);
    }

}