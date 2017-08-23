<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Repositories\UserRepositories;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index(Request $request,UserRepositories $userRepositories){


        $data = $userRepositories->getUserList(15);
        $link = $this->link($data);
        return view('backend.user.index',['data'=>$data,'link'=>$link]);

    }

    public function profile(UserRepositories $userRepositories){

        return view('backend.user.profile');

    }
    public function updateProfile($id,Request $request,UserRepositories $userRepositories){

        $ret = $userRepositories->updateProfile($id,$request->except('_token'));

        return $ret?$this->success('更新成功'):$this->error('更新失败');


    }
}
