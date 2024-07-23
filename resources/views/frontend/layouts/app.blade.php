<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    @vite('resources/assets/frontend/css/app.css')
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
@yield('content')

@vite('resources/assets/frontend/js/app.js')
</body>
</html>
