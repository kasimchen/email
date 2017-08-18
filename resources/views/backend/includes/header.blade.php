
<div class="header-contians">
    <div class="logo">anawin后台管理</div>
    <ul class="layui-nav nav-top">
        @if(\Illuminate\Support\Facades\Auth::guest()===false)
        <li class="layui-nav-item layui-this">
            <a href="javascript:;">{{Auth::user()->name}}</a>
            <dl class="layui-nav-child">
                <dd><a href="{{route('user.profile',['id'=>auth_user()->id])}}">个人中心</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="">大数据</a></li>
        <li class="layui-nav-item">
            <a href="javascript:;">解决方案</a>
            <dl class="layui-nav-child">
                <dd><a href="">移动模块</a></dd>
                <dd><a href="">后台模版</a></dd>
                <dd class="layui-this"><a href="">选中项</a></dd>
                <dd><a href="">电商平台</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item"><a href="">社区</a></li>
        @endif
    </ul>
</div>
