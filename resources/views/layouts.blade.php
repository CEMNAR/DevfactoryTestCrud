<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<header>
    <div class="p-5 text-center bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.jpg'); height: 250px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Dashboard</h1>
                    <h4 class="mb-3">@yield('dashboard-title')</h4>
                </div>
            </div>
        </div>
    </div>
</header>

<body>
<div class="container p-5">
    @yield('main-content')
</div>
</body>

<footer class="bg-dark text-center text-white">
    <div class="container p-4 pb-0">
        <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/cem-nar-776456132/" role="button"><i class="fab fa-linkedin-in"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/CEMNAR" role="button"><i class="fab fa-github"></i></a>
        </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright: <a class="text-white" href="#">Cem Nar -> Test DevFactory</a>
    </div>
</footer>
</html>
