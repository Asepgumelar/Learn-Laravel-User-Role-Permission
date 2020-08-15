<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Laravel</title>
    @include('partials.backend._style')
</head>
<body class="hold-transition sidebar-mini text-sm layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('partials.backend._nav')

        @include('partials.backend._sidebar')

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

        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="http://adminlte.io">{{ 'app.name', 'Laravel'}}</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 
            </div>
        </footer>
    </div>

   @include('partials.backend._script')
</body>

</html>
