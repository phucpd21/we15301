<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/sidebar/sidebar.css') }}">

</head>

<body>

    <div class="row">
        {{-- HEADER --}}
        <div class="col-12 text-center bg-primary">
            HEADER
        </div>
        {{-- /E-HEADER --}}

        <div class="col-12 row">
            {{-- SIDEBAR --}}
            <div class="col-2">
                @include('partials.sidebar')
            </div>
            {{-- /E-SIDEBAR --}}

            {{-- CONTENT --}}
            <div class="col-10">
                @yield('contents')
            </div>
            {{-- /E-CONTENT --}}
        </div>

        {{-- FOOTER --}}
        <div class="col-12 text-white text-center bg-secondary">Phucpdph10868</div>
        {{-- /E-FOOTER --}}
    </div>



    {{-- <script src="{{ asset('bootstrap-5.0.2/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('bootstrap-5.0.2/sidebar/sidebar.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
</body>

</html>
