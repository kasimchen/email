

<div style="padding:20px;">
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="200">
        </colgroup>
        <tbody>

        <tr>
            <td>更新来源</td>
            <td>{{$data->subject}}</td>
        </tr>
        <tr>
            <td>更新App名称</td>
            <td>{{$version->app}}</td>
        </tr>
        <tr>
            <td>项目</td>
            <td>{{$version->project}}</td>
        </tr>
        <tr>
            <td>更新描述</td>
            <td>
                {!! $version->content !!}
            </td>
        </tr>
        <tr>
            <td>数据库配置</td>
            <td>
                {!! $version->db_content or '无' !!}
            </td>
        </tr>
        <tr>
            <td>env文件配置</td>
            <td>{{$version->env_content or '无'}}</td>
        </tr>

        <tr>
            <td>提交者</td>
            <td>{{$version->author->name}}</td>
        </tr>
        <tr>
            <td>创建时间</td>
            <td>{{$version->created_at}}</td>
        </tr>

        </tbody>
    </table>

    @if(!empty(auth_user()->email_sign))
    <div style="margin-top:20px;margin-bottom:20px;">

        {!! auth_user()->email_sign !!}

    </div>
    @endif

    ------------------ Original ------------------

    <div style="margin-top:100px;">

        {!! $data->origin_textHtml !!}

    </div>
</div>



