<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  @yield('title')  </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com')}}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/Backend/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Backend/vendors/base/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/Backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/Backend/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('assets/Backend/images/favicon.png')}}" />

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireStyles

</head>

<body>
    <div class="container-scroller">
        @include('partial.Backend.nav')
        <div class="container-fluid page-body-wrapper">
            @include('partial.Backend.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">

               @if(session('message'))
            <h2 class="alert alert-success">{{session('message')}}</h2>

               @endif
                @yield('content')

                </div>
            </div>

        </div>
    </div>
    @include('partial.Backend.script')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('scripts')

    @livewireScripts
   
</body>

</html>