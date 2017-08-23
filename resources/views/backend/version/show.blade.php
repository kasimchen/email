@extends ('backend.layouts.app')

@section ('title','版本详情')

@section('after-styles')

@stop

@section('page-header')

@endsection

@section('content')

    <div class="container">

        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td>App</td>
                <td>{{$data->app}}</td>
            </tr>
            <tr>
                <td>项目</td>
                <td>{{$data->project}}</td>
            </tr>
            <tr>
                <td>更新描述</td>
                <td>
                    {{$data->content}}
                </td>
            </tr>
            <tr>
                <td>数据库配置</td>
                <td>
                    {{$data->db_content or '无'}}
                </td>
            </tr>
            <tr>
                <td>env文件配置</td>
                <td>{{$data->env_content or '无'}}</td>
            </tr>
            <tr>
                <td>是否关联邮件</td>
                <td>{{$data->e_id or '无'}}</td>
            </tr>
            <tr>
                <td>创建者</td>
                <td>{{$data->author->name}}</td>
            </tr>
            <tr>
                <td>创建时间</td>
                <td>{{$data->created_at}}</td>
            </tr>

            </tbody>
        </table>




    </div>
@stop

@section('after-scripts')



@stop
