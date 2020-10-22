<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials._meta')
    @include('layouts.partials._title')
    @include('layouts.partials._style')
</head>
<body class="hold-transition text-sm layout-fixed layout-navbar-fixed accent-info">
    <div class="wrapper">
        @include('layouts.partials.components._nav')

        @include('layouts.partials.components._sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-light">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active text-light">@yield('title')</li>
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
