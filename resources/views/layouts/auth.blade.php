<!DOCTYPE html>
<html>

<head>
    @include('layouts.partials._meta')
    @include('layouts.partials._title')
    @include('layouts.partials._style')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>{{ env('APP_NAME') }}</b></a>
        </div>

        @yield('content')
    </div>

    @include('layouts.partials._script')

</body>

</html>
