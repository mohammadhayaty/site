<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ url()->asset("/assets/css/custom.css") }}">
        <title>Data Center Store</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @yield("css")
        @vite('resources/css/app.css')
        
    </head>
    <body >
    @yield("main")
    <script src="{{ url()->asset("/assets/js/bootstrap.bundle.min.js") }}"></script>
    @yield("js")

            <div id="app"></div>
            @vite('resources/js/app.js')
               
    </body>
</html>
