<?php

/**
 * Created by PhpStorm.
 * User: om
 * Date: 2017/8/17
 * Time: 下午2:29
 */
namespace App\Repositories;

use App\Model\Email;
use App\Model\User;
use Illuminate\Pagination\Paginator;

class EmailRepositories
{




    public function getEmailList($userId,$limit){

        return  Email::where('user_id','=',$userId)->orderBy('date','desc')->paginate($limit);

    }

    public function getEmailById($id){

        Email::whereId($id)->first();

    }



}