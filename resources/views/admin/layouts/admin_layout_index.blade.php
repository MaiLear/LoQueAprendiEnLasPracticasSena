<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index-@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin/principal-page.css')}}">
    @yield('css')

    @include('admin.layouts.partials.header')
</head>

<body>
    @include('admin.layouts.partials.lateral_menu')
    <main class="container-principal">
        @yield('body')
    </main>


    <script src="{{asset('js/main.js')}}"></script>

    @yield('scripts')
</body>

</html>