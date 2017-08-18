

@if(\Illuminate\Support\Facades\Auth::check()===true)

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">

            <ul class="layui-nav layui-nav-tree site-demo-nav">


                <li class="layui-nav-item layui-nav-itemed">
                    <a class="javascript:;" href="javascript:;">用户管理<span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd class="layui-this">
                            <a href="/demo/button.html">用户列表</a>
                        </dd>
                        <dd class="">
                            <a href="/demo/form.html">表单集合</a>
                        </dd>
                        <dd >
                            <a href="/demo/nav.html">导航与面包屑</a>
                        </dd>

                    </dl>
                </li>


            </ul>

        </div>
    </div>

@endif