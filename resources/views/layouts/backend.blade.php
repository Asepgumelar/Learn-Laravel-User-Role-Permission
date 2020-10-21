<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>
    @include('layouts.partials._style')
</head>
<body class="hold-transition sidebar-mini text-sm layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('layouts.partials.components._nav')

        @include('layouts.partials.components._sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">

                    @yield('content')
                </div>
            </div>

        </div>

        <aside class="control-sidebar control-sidebar-dark"> </aside>

   @include('layouts.partials.components._footer')
     
    </div>

   @include('layouts.partials._script')
</body>

</html>
