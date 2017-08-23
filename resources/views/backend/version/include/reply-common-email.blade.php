@extends ('backend.layouts.app')

@section ('title','邮件列表')

@section('after-styles')
    <style>
       #sendEmail{
           margin-top:10px;
       }
    </style>
@stop

@section('page-header')

@endsection

@section('content')

    <fieldset class="layui-elem-field layui-field-title">
        <legend>版本更新信息</legend>
        <div class="layui-field-box">
            <textarea id="editor" style="display: none;height:500px;"></textarea>
        </div>
    </fieldset>

    <fieldset class="layui-elem-field layui-field-title">
        <legend>数据库配置</legend>
        <div class="layui-field-box">
            <textarea id="database-editor" style="display: none;height:500px;"></textarea>
        </div>
    </fieldset>

    <fieldset class="layui-elem-field layui-field-title">
        <legend>env配置</legend>
        <div class="layui-field-box">
            <textarea id="env-editor" style="display: none;height:500px;"></textarea>
        </div>
    </fieldset>

    <button id="save" class="layui-btn" data-type="content">保存</button>
@stop

@section('after-scripts')

    <script>

        var layedit,index;
        var layedit_db,index_db;
        var layedit_env,index_env;

        layui.use('layedit', function(){
             layedit = layui.layedit;

            index = layedit.build('editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink","face"]
                ,height: 280
            });

            layedit_db = layedit.build('database-editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink"]
                ,height: 200
            });

            layedit_env = layedit.build('env-editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink"]
                ,height: 100
            });

        });


        $('#save').click(function(){
            alert(layedit.getContent(index));
        })

    </script>


@stop
