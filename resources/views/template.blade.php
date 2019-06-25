<!DOCTYPE html>
<html lang="en">
<head>
    <title>Akademik</title>
    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('bootstrap_4_3_1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome_5_9_0/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome_5_9_0/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome_5_9_0/css/solid.css') }}">
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>


</head>
<body>

    @include('navbar')
    <div class="container-fluid">
        @yield('main')
    </div>
    @yield('footer')

    <script src="{{ asset('bootstrap_4_3_1/js/bootstrap.min.js') }}"></script>
</body>

</body>
</html>
