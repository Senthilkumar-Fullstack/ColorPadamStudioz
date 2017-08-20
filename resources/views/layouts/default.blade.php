<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

    <div id="header">
        @include('includes.header')
    </div>

    <div class="container page-container theme-default" role="main">
        @yield('content')
    </div>

    <div id="footer">
        @include('includes.footer')
    </div>

    @include('includes.scripts')

</body>
</html>