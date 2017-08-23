

@if(\Illuminate\Support\Facades\Auth::check()===true)

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">

            <ul class="layui-nav layui-nav-tree site-demo-nav">



                <li class="layui-nav-item {{ active_class(if_route_pattern('email*'), 'layui-nav-itemed','') }}">
                    <a class="javascript:;" href="javascript:;">邮件管理<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd class="{{ active_class(if_route('email.index'),'layui-this','')}}" >
                            <a href="{{route('email.index')}}">我的邮件</a>
                        </dd>
                    </dl>
                </li>


                <li class="layui-nav-item {{ active_class(if_route_pattern('version*'), 'layui-nav-itemed','') }}">
                    <a class="javascript:;" href="javascript:;">版本管理<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd class="{{ active_class(if_route('version.index'),'layui-this','')}}" >
                            <a href="{{route('version.index')}}">版本列表</a>
                        </dd>
                    </dl>
                </li>


                <li class="layui-nav-item {{ active_class(if_route_pattern('user*'), 'layui-nav-itemed','') }}">
                    <a class="javascript:;" href="javascript:;">用户管理<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd class="{{ active_class(if_route('user.index'),'layui-this','')}}" >
                            <a href="{{route('user.index')}}">用户列表</a>
                        </dd>
                    </dl>
                </li>

            </ul>


        </div>
    </div>

@endif