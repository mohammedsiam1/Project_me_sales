<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>         
           @yield('title')
</title>
<meta name="keywords" content=" @yield('meta_keyword')">
<meta name="description" content=" @yield('meta_description')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireStyles
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <x-livewire-alert::scripts />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{asset('assets/css.css')}}" rel="stylesheet">
    <link href="{{asset('assets/Frontend/navbar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/Frontend/footer.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/Frontend/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Frontend/owl.theme.default.css')}}">
        <!-- ex-zoom -->
    <link href="{{asset('assets/exzoom/jquery.exzoom.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">

        @include('partial.Frontend.navbar')
        <main class="py-4">
            @yield('content')
        </main>

        @include('partial.Frontend.footer')

    </div>
   
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('assets/Frontend/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/exzoom/jquery.exzoom.js')}}"></script>
    @yield('scripts')
    @livewireScripts
    @stack('scripts')
</body>
</html>
