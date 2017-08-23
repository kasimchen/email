<?php

namespace App\Http\Controllers\Backend\Version;

use App\Http\Controllers\Controller;
use App\Repositories\EmailRepositories;
use App\Repositories\VersionRepositories;
use Illuminate\Http\Request;

class VersionController extends Controller
{

    public function index(Request $request,VersionRepositories $versionRepositories){

        $data = $versionRepositories->getVersionList(auth_user()->id,15);
        $link = $this->link($data);
        return view('backend.version.index',['data'=>$data,'link'=>$link]);

    }

    public function show($id,VersionRepositories $versionRepositories){

        $data = $versionRepositories->getVersionById($id);
        return view('backend.version.show',['data'=>$data]);

    }

    public function create(){

        return view('backend.version.create');

    }

    public function edit($id,VersionRepositories $versionRepositories){

        $data = $versionRepositories->getVersionById($id);

        return view('backend.version.edit',compact('data'));



    }

    public function update($id,Request $request,VersionRepositories $versionRepositories){


        $version = $versionRepositories->getVersionById($id);

        if(!empty($version->e_id)){
            return $this->error('此配置已经生效，不可更改');
        }

        $ret = $versionRepositories->update($id,$request->except('_token'));
        return $ret? $this->success('更新成功'):$this->error('更新失败');



    }

    public function store(Request $request,VersionRepositories $versionRepositories){

        $ret = $versionRepositories->create(auth_user()->id,$request->except('_token'));

        if($ret){
            return $this->success('创建成功',['redirect_url'=>route('version.index')]);
        }else{
            return $this->error('创建失败');

        }


    }


    public function del($id,VersionRepositories $versionRepositories){

        $version = $versionRepositories->getVersionById($id);

        if(!empty($version->e_id)){
            return $this->error('此配置已经生效，不可删除');
        }

        $ret = $versionRepositories->delete($id);

        if($ret){
            return $this->success('删除成功',['redirect_url'=>route('version.index')]);
        }else{
            return $this->error('删除失败');

        }

    }


}
