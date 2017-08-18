@extends ('backend.layouts.app')

@section ('title','用户详情')

@section('after-styles')

@stop

@section('page-header')

@endsection

@section('content')

    <div class="container">

        {{Form::open(['url'=>route('user.updateProfile',['id'=>auth_user()->id]),'methord'=>'post','class'=>'layui-form'])}}

            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" name="name" value="{{auth_user()->name}}" required  lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formUpdateName">更新</button>
                </div>
            </div>

        {{Form::close()}}


        <div class="site-title">
            <fieldset><legend><a name="use">绑定邮箱</a></legend></fieldset>
        </div>


        {{Form::open(['url'=>route('user.updateProfile',['id'=>auth_user()->id]),'methord'=>'post','class'=>'layui-form'])}}

            <div class="layui-form-item">
                <label class="layui-form-label">onemena邮箱账号</label>
                <div class="layui-input-block">
                    <input type="text" name="company_email"  value="{{auth_user()->company_email}}" required  lay-verify="required" placeholder="请输入onemena邮箱账号" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">onemena邮箱密码</label>
                <div class="layui-input-block">
                    <input type="password" name="company_password" value="{{decrypt(auth_user()->company_password)}}" required lay-verify="required" placeholder="请输入onemena邮箱密码" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formUpdateCompany">{{auth_user()->company_email==''?'绑定账号':'更新'}}</button>
                </div>
            </div>
        {{Form::close()}}

    </div>



@stop

@section('after-scripts')

    <script>
        //Demo
        layui.use('form', function(){
            var form = layui.form();

            //监听提交
            form.on('submit(formUpdateName)', function(data){

                var url =  data.form.action;

                $.ajax({

                    url:url,
                    dataType:'json',
                    type:'post',
                    data:data.field,
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


            form.on('submit(formUpdateCompany)', function(data){
                var url =  data.form.action;

                $.ajax({

                    url:url,
                    dataType:'json',
                    type:'post',
                    data:data.field,
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


@stop
