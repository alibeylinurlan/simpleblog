<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/all.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link href='{{ asset('css/loader.css') }}' rel='stylesheet'>
        @livewireStyles
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="{{ asset('js/search.js') }}"></script>
        <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    </head>
    <body>
        <div class="loader">
            <img src="https://www.truckaccentsinc.com/images/icons/loading.gif">
        </div>
        <div id="searchcomponent" style="width:100%;height: 100vh;background: #fff; position: fixed;z-index: 5;padding: 10px;display: none;">
            @livewire('search')
        </div>
        <livewire:topbar />
        <livewire:menu />

        @yield('index')
        @yield('edit')
        @yield('info')
        @yield('dashboard')
        @yield('category')

        <script src="{{ asset('js/loader.js') }}"></script>
        <livewire:toastr />
        @livewireScripts
    </body>
</html>