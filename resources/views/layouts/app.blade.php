<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body class="bg-light">
    <div class="container">
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>
</html>