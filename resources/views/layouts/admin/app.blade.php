<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ITFun Admin Examples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/vendor/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/vendor/assets/css/admin.css">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>

@include('layouts.admin.shared._header')
<div class="am-cf admin-main">
    <!-- sidebar start -->
    @include('layouts.admin.shared._sidebar')
    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">
        @yield('content')

        @include('layouts.admin.shared._footer')
    </div>
    <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<script src="/vendor/assets/js/jquery.min.js"></script>
<script src="/vendor/assets/js/amazeui.min.js"></script>
<script src="/vendor/assets/js/app.js"></script>
<script src="/js/common.js"></script>
<script src="/js/destroy.js"></script>
@yield('js')
</body>
</html>
