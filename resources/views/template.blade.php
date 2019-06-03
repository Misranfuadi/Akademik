<!DOCTYPE html>
<html lang="en">
<head>
    <title>Akademik</title>
    <link rel="stylesheet" href="{{ asset('bootstrap_4_3_1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
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
