<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} - {{$page ?? ''}}</title>
    @yield('extra-styles')
</head>
<body>
    @yield('nav')
    @yield('aside')
    @yield('content')
    @yield('extra-scripts')
</body>
</html>
