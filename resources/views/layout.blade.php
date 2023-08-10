<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('partials.header')

        <title>MaroCareer</title>

    </head>
    <body>
        @yield('content')
        @include('partials.script')
    </body>
</html>
