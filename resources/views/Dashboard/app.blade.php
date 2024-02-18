<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url()->asset("/dashboard_assets/css/custom.css") }}">
    <title>@yield("title")</title>
    @yield("css")
</head>
<body>
@include("Dashboard.Sections.header")
@yield("main")
@include("Dashboard.Sections.footer")
<script src="{{ url()->asset("/dashboard_assets/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ url()->asset("/dashboard_assets/js/jquery.min.js") }}"></script>
@yield("js")
</body>
</html>
