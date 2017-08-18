<?php

namespace App\Http\Controllers\Backend\Email;

use App\Http\Controllers\Controller;
use App\Repositories\EmailRepositories;

class EmailController extends Controller
{

    public function index(EmailRepositories $emailRepositories){

        $data = $emailRepositories->getEmailList(auth_user()->id,15);
        $link = $this->link($data);
        return view('backend.email.index',['data'=>$data,'link'=>$link]);

    }

    public function show($id,EmailRepositories $emailRepositories){

        $data = $emailRepositories->getEmailById($id);
        return view('backend.email.show',['data'=>$data]);


    }


}
