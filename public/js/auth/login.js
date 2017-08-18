/**
 * Created by om on 2017/8/16.
 */
layui.use('form', function(){
    var form = layui.form();

    //监听提交
    form.on('submit(loginForm)', function(data){
        layer.msg(JSON.stringify(data.field));


        //登录

        return false;
    });
});