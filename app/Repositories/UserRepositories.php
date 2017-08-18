<?php

/**
 * Created by PhpStorm.
 * User: om
 * Date: 2017/8/17
 * Time: 下午2:29
 */
namespace App\Repositories;

use App\Model\User;
use Illuminate\Pagination\Paginator;

class UserRepositories
{


    public function isExitsByEmail($email){

        return User::where('email','=',$email)->count(['id'])==0?false:true;

    }

    public function getUserByEmail($email){


    }

    public function getUserList($limit){

        return  User::paginate($limit);

    }

   public function updateProfile($id,$data){

       if(isset($data['company_password'])){
           $data['company_password'] =  encrypt($data['company_password']);
       }

       if(isset($data['password'])){
           $data['password'] =  bcrypt($data['password']);
       }

      return  User::whereId($id)->update($data);

   }

   public function getLastEmail($userId){

       return \DB::table('email')->where('user_id','=',$userId)
           ->orderBy('e_id','desc')
           ->first();

   }

}