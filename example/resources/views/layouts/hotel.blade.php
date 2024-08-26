<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('hotels.f1')}}">1F</a>                   
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('hotels.f2')}}">2F</a>                   
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('hotels.f3')}}">3F</a>                   
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-3">
        @yield('content')
        {{-- h3 f1 --}}
    </div>


</body>

</html>

