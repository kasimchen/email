@extends ('backend.layouts.app')

@section ('title','邮件列表')

@section('after-styles')

    <style>
        .action-btn{
            width: 500px;
            float: right;
            top: -29px;
            position: relative;
        }
    </style>

@stop

@section('page-header')

@endsection

@section('content')

    <blockquote class="layui-elem-quote">
        {{$data->subject}}
        @if(!empty($version))
        <div class="action-btn">
            <form class="layui-form" action="">
                <div class="layui-form-item">
                    <div class="layui-block">
                        <select id="select-version" name="select-version" lay-filter="selectVersion" data-url="{{route('email.send',['id'=>$data->id])}}" >
                            <option value="">发布版本邮件</option>
                            @foreach($version as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </form>
        </div>
        @endif
    </blockquote>

    <fieldset class="layui-elem-field">
        <div class="layui-field-box">
             @php $to = json_decode($data->cc);  @endphp
            {{$data->from}}发送给
            @foreach($to as $key=>$item)
                <a href="javascript:;">{{$item}}</a>
            @endforeach

        </div>
    </fieldset>

    <blockquote class="layui-elem-quote layui-quote-nm attachments">

        附件 :

        @php $attachments = json_decode($data->attachment);  @endphp
        @if(!empty($attachments))
            @foreach($attachments as $key=>$attachment)
                <a class="layui-btn layui-btn-primary" target="_blank" href="{{$attachment}}">附件{{$key+1}}</a>
            @endforeach
        @endif


    </blockquote>



    <div class="email-content">
    {!! $data->textHtml !!}
    </div>

@stop

@section('after-scripts')

    <script>

        layui.use('form', function(){
            var form = layui.form();


            //监听指定开关
            form.on('select(selectVersion)', function(data){

               var id = data.value;

                layer.confirm('确定发布这项版本更新任务？', {
                    btn: ['是','再等等'] //按钮
                }, function(index){


                    var url =  $('#select-version').data('url');

                    $.ajax({

                        url:url,
                        dataType:'json',
                        type:'post',
                        data:{version:id},
                        headers: { 'X-CSRF-TOKEN' : window.Laravel.csrfToken },
                        success:function(data){

                            if(data.code==200){
                                layer.msg(data.msg);
                            }else{
                                layer.msg(data.msg);
                            }

                        }

                    });



                    $('#select-version').attr('disabled','disabled');
                    form.render('select');
                    layer.close(index);
                    layer.msg('发布成功', {icon: 1});

                }, function(index){

                    layer.close(index);

                });


            });



        });

    </script>


@stop
