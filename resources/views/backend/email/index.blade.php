@extends ('backend.layouts.app')

@section ('title','邮件列表')

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
                <th>主题</th>
                <th>来源</th>
                <th>发送时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>

            @if(!empty($data))
                @foreach($data as $user)
                    <tr>
                        <td>{{$user->subject}}</td>
                        <td>{{$user->fromName}}</td>
                        <td>{{$user->date}}</td>
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
