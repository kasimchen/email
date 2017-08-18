@extends ('backend.layouts.app')

@section('after-styles')

@stop

@section('page-header')

@endsection

@section('content')


    <div class="main layui-clear">
        <div class="fly-panel fly-panel-user" pad20="">
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <div class="layui-form layui-tab-content" id="LAY_ucm" style=" width: 400px; margin:0 auto;margin-top:100px;">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form layui-form-pane">

                            {{Form::open(['route'=>'auth.register','methord'=>'post','class'=>'layui-form'])}}


                                <div class="layui-form-item">
                                    <label for="L_email" class="layui-form-label">邮箱</label>
                                    <div class="layui-input-inline">
                                        <input type="text"  name="email" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <label for="L_email" class="layui-form-label">姓名</label>
                                    <div class="layui-input-inline">
                                        <input type="text"  name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <label for="L_pass" class="layui-form-label">密码</label>
                                    <div class="layui-input-inline">
                                        <input type="password"  name="password" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                </div>


                                <div class="layui-form-item">
                                    <label for="L_pass" class="layui-form-label">重复密码</label>
                                    <div class="layui-input-inline">
                                        <input type="password"  name="password_confirmation" required="" lay-verify="required" autocomplete="off" class="layui-input">
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <label for="L_vercode" class="layui-form-label">人类验证</label>
                                    <div class="layui-input-inline">
                                        <input type="text"  name="vercode" required="" lay-verify="required" placeholder="请回答下面的问题" autocomplete="off" class="layui-input">
                                    </div>
                                    <div class="layui-form-mid">
                                        <span style="color: #c00;">公司wifi密码是多少？</span>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <button class="layui-btn" lay-filter="registerForm" lay-submit=>注册</button>
                                    <span style="padding-left:20px;">
                                        <a href="#">去登录？</a>
                                    </span>
                                </div>

                                {{Form::close()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('after-scripts')
    <script>
        layui.use('form', function(){
            var form = layui.form();

            //监听提交
            form.on('submit(registerForm)', function(data){

                var url =  data.form.action;

                $.ajax({

                    url:url,
                    dataType:'json',
                    type:'post',
                    data:data.field,
                    success:function(data){

                        if(data.code==200){

                            layer.msg(data.msg);
                            setTimeout(function(){
                                location.href = data.data.redirect_url;
                            },300);

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
