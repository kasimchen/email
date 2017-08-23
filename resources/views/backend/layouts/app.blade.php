<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <link rel="stylesheet" href="{{asset('plugins/layui/css/layui.css')}}"  media="all">
        <link rel="stylesheet" href="{{asset('backend/css/common.css')}}"  media="all">


        <!-- Styles -->
        @yield('before-styles')


        @yield('after-styles')

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body >

    @include('backend.includes.header')
    @include('backend.includes.sidebar')


    <div class="layui-body content">
        @yield('content')
    </div>


    @include('backend.includes.footer')

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('plugins/layui/layui.all.js')}}"></script>
        <!-- JavaScripts -->
        @yield('before-scripts')

        @yield('after-scripts')

    @include('backend.includes.message')

    </body>
</html>




