<title>
    @hasSection ('title')
        {{ env('APP_NAME') }} | @yield('title')
    @else
        {{ env('APP_NAME') }}
    @endif
</title>
