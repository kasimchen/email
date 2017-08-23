@if(session()->get('flash_success'))
    <script>

        layer.alert("{{session()->get('flash_success')}}", {
            skin: 'layui-layer-molv'
            ,closeBtn: 0
        });

    </script>
@elseif (session()->get('flash_danger'))

    <script>

        layer.alert("{{session()->get('flash_success')}}", {
            skin: 'layui-layer-lan'
            ,closeBtn: 0
        });
    </script>

@endif