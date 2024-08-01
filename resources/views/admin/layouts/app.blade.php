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
@auth
    <main class="d-flex flex-nowrap" id="top">
        @include('admin.layouts.sidebar')
        <div class="content w-100">
            @include('admin.layouts.top-navbar')

            <div class="my-3">
                <x-admin::toast/>
            </div>

            <section class="my-3">
                @yield('content')
            </section>
        </div>
    </main>
@endauth
@guest
    <main>
        <div class="content w-100">
            <div class="">
                <x-admin::toast/>
            </div>
            <section>
                @yield('content')
            </section>
        </div>
    </main>
@endguest

@vite('resources/assets/admin/js/app.js')
</body>
</html>
