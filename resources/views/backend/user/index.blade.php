@extends ('backend.layouts.app')

@section ('title','用户列表')

@section('after-styles')

@stop

@section('page-header')

@endsection

@section('content')

    <div class="layui-form">
        <table class="layui-table">
            <colgroup>
                <col width="20">
                <col width="100">
                <col width="100">
                <col width="100">
                <col width="200">
            </colgroup>
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>邮箱</th>
                <th>注册时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            @if(!empty($data))
                @foreach($data as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td></td>
                    </tr>
                @endforeach
            @else
                <tr>没有更多内容了</tr>
            @endif

            </tbody>
        </table>

        {{$link}}

    </div>



@stop

@section('after-scripts')

    <script>
        layui.use('form', function(){
            var $ = layui.jquery, form = layui.form();

            //全选
            form.on('checkbox(allChoose)', function(data){
                var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
                child.each(function(index, item){
                    item.checked = data.elem.checked;
                });
                form.render('checkbox');
            });

        });
    </script>

@stop
