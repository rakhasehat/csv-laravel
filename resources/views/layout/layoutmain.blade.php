<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layout.partials.head')
</head>
<body>
    @yield('content')

    @include('layout.partials.footer-scripts')
</body>
</html>
