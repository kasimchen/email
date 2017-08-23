<?php

/**
 * Created by PhpStorm.
 * User: om
 * Date: 2017/8/17
 * Time: 下午2:29
 */
namespace App\Repositories;

use App\Model\Version;
use Illuminate\Pagination\Paginator;

class VersionRepositories
{



    public function getVersionList($userId,$limit){

        return  Version::where('user_id','=',$userId)
            ->orderBy('created_at','desc')
            ->paginate($limit);

    }

    public function getVersionById($id){

      return   Version::with('author')->where('id','=',$id)->first();

    }

    public function getVersionNotEmail(){

        return Version::whereNull('e_id')->get();

    }

    public function create($userId,$data){

          $data['user_id'] = $userId;
          return   Version::create($data);

    }

    public function update($id,$data){

        return   Version::where('id','=',$id)->update($data);

    }

    public function delete($id){

       return Version::where('id','=',$id)->delete();
    }


}