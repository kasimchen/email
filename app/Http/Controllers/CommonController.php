<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{

    public function upload(Request $request){

        $file = $request->file('file');
        $ret = $file->storeAs(public_path('upload/sql'),$file->getClientOriginalName());
        dd($ret);
    }


}
