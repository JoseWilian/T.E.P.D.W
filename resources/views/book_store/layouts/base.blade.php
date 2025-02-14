<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('base-title-name')</title>
    @vite('resources/css/app.css')
    @yield('base-head-expand')
  </head>
    @yield('base-body')
</html>
