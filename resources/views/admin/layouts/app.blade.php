<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - {{ config('app.name', 'Laravel') }}</title>
    @vite('resources/assets/admin/sass/app.scss')
</head>
<body data-bs-theme="dark">
<div class="container-fluid">
    <div class="row">
        @auth
            <div class="col-md-2">
                {{-- Sidebar here --}}
            </div>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                {{-- Top navbar here --}}
                <div class="content">
                    @yield('content')
                </div>
            </main>
        @endauth
        @guest
            <div class="col-md-12">
                @yield('content')
            </div>
        @endguest
    </div>
</div>

@vite('resources/assets/admin/js/app.js')
</body>
</html>
