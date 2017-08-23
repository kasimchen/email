@extends ('backend.layouts.app')

@section ('title','修改版本')

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



    <div class="container">

        {{Form::open(['url'=>route('version.update',$data),'methord'=>'post','class'=>'layui-form'])}}


            <div class="layui-form-item">
                <label class="layui-form-label">标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" value="{{$data->title}}" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">app名称</label>
                <div class="layui-input-block">
                    <select id="app" name="app" lay-verify="required">
                        <option value=""></option>
                        @foreach(config('common.common.app') as $key=>$item)
                            <option @if($key==$data->app) selected @endif value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">项目名称</label>
                <div class="layui-input-block">
                    <select id="project" name="project" lay-verify="required">
                        <option value=""></option>
                        @foreach(config('common.common.project') as $key=>$item)
                            <option @if($key==$data->project) selected @endif value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">版本更新信息</label>
                <div class="layui-input-block">
                    <textarea id="editor" style="display: none;height:500px;">{{$data->content}}</textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">数据库配置</label>
                    <div class="layui-input-block">
                        <textarea id="database-editor" style="display: none;height:500px;">{{$data->db_content}}</textarea>
                    </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">env配置</label>
                    <div class="layui-input-block">
                        <textarea id="env-editor" style="display: none;height:500px;">{{$data->env_content}}</textarea>
                    </div>
            </div>

        <div class="layui-form-item">
        <button class="layui-btn" lay-submit lay-filter="formUpdateVersion">更新</button>
        </div>

        {{Form::close()}}
    </div>
@stop

@section('after-scripts')

    <script>

        var layedit,index;
        var layedit_db,index_db;
        var layedit_env,index_env;
        var data_content = {};

        layui.use('layedit', function(){
            layedit = layui.layedit;
            layedit_db = layui.layedit;
            layedit_env = layui.layedit;


            index = layedit.build('editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink","face"]
                ,height: 280
            });

            index_db = layedit_db.build('database-editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink"]
                ,height: 200
            });

            index_env = layedit_env.build('env-editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink"]
                ,height: 100
            });



        });



        layui.use('form', function(){
            var form = layui.form();

            //监听提交
            form.on('submit(formUpdateVersion)', function(data){

                var url =  data.form.action;

                data_content.content = layedit.getContent(index);
                data_content.db_content = layedit_db.getContent(index_db);
                data_content.env_content = layedit_env.getContent(index_env);
                data_content.title = $('input[name="title"]').val();
                data_content.app = $('#app').val();
                data_content.project = $('#project').val();
                data_content._token = data.field._token;


                if( data_content.content==''){
                    layer.msg("更新描述不能为空");
                }

                $.ajax({

                    url:url,
                    dataType:'json',
                    type:'post',
                    data:data_content,
                    success:function(data){

                        if(data.code==200){
                            layer.msg(data.msg);
                        }else{
                            layer.msg(data.msg);
                        }

                    }

                });

                return false;

            });

        });
    </script>

    <script>

        /*
        var layedit,index;
        var layedit_db,index_db;
        var layedit_env,index_env;

        layui.use('layedit', function(){
             layedit = layui.layedit;

            index = layedit.build('editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink","face"]
                ,height: 280
            });

            index_db = layedit.build('database-editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink"]
                ,height: 200
            });

            index_env = layedit.build('env-editor', {
                tool: ["strong","italic","underline","del","|","left","center","right","|","link","unlink"]
                ,height: 100
            });

        });*/



        //layui.use('form', function(){
           // var form = layui.form;

            //监听提交
            /*
            form.on('submit(formUpdateName)', function(data){

                layer.msg(JSON.stringify(data.field));

                var content = layedit.getContent(index);
                var db_content = layedit_db.getContent(index_db);
                var env_content = layedit_env.getContent(index_env);

                if(content==''){
                    layer.msg("更新描述不能为空");
                }

                return false;
            });*/
       // });



    </script>


@stop
