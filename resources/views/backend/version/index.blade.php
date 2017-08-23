@extends ('backend.layouts.app')

@section ('title','版本列表')

@section('after-styles')

@stop

@section('page-header')

@endsection

@section('content')

    <a href="{{route('version.create')}}" class="layui-btn">版本更新</a>

    <div class="layui-form">
        <table class="layui-table">
            <colgroup>
                <col width="20">
                <col width="100">
                <col width="100">
                <col width="100">
                <col width="100">
                <col width="100">
                <col width="200">
            </colgroup>
            <thead>
            <tr>
                <th>应用名称</th>
                <th>App名称</th>
                <th>项目名称</th>
                <th>关联邮件</th>
                <th>创建者</th>
                <th>创建时间</th>
                <th>操作</th>

            </tr>
            </thead>
            <tbody>

            @if(!empty($data))
                @foreach($data as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->app}}</td>
                        <td>{{$item->project}}</td>
                        <td>{{$item->e_id or "未关联"}}</td>
                        <td>{{$item->user_id}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <div class="layui-btn-group">
                                {!! $item->tableActions() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr><td>没有更多内容了</td></tr>
            @endif

            </tbody>
        </table>

        {{$link}}

    </div>



@stop

@section('after-scripts')

    <script>

        $('.delete').click(function(){

            var url = $(this).data('url');

            var index =layer.confirm('一定要删除么？', {
                btn: ['是', '否']
            }, function(index, layero){

                $.ajax({
                    url:url,
                    headers: { 'X-CSRF-TOKEN' : window.Laravel.csrfToken },
                    dataType:'json',
                    type:'delete',
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



                })

            }, function(index){

                return false;

            });


        });


    </script>

@stop
