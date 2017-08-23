<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 2017/8/21
 * Time: 下午4:25
 */

namespace App\Model\Traits;

trait VersionTraits{



    public function showAction(){

        return '<a class="layui-btn" href="'.route('version.show',$this).'">查看</a>';

    }

    public function editAction(){

        return '<a class="layui-btn" href="'.route('version.edit',$this).'">编辑</a>';

    }

    public function delAction(){

        return '<button class="layui-btn delete" data-url="'.route('version.del',$this).'">删除</a>';

    }

    public function tableActions(){

        return $this->showAction().
            $this->editAction().
            $this->delAction();


    }








}
use Illuminate\Database\Eloquent\Model;