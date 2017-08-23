<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function link($data){

        return  $data->render('vendor.pagination.default');

    }

    protected function success($msg,$data=null){
        return response()->json(['msg'=>$msg,'code'=>200,'data'=>$data]);
    }

    protected function error($msg){
        return response()->json(['msg'=>$msg,'code'=>-1]);
    }
}

