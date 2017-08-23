@extends ('backend.layouts.app')

@section ('title','邮件列表')

@section('after-styles')

@stop

@section('page-header')

@endsection

@section('content')

    <a href="{{route('email.synchro')}}" class="layui-btn">同步邮件</a>


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
                @foreach($data as $item)
                    <tr>
                        <td><a href="{{route('email.show',['id'=>$item->id])}}">{{$item->subject}}</a></td>
                        <td>{{$item->fromName}}</td>
                        <td>{{$item->date}}</td>
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
