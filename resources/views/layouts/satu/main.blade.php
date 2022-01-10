<!DOCTYPE html>
    <head>
        <title>{{ $title }}</title>
        <!-- Font Awesome icons (free version)-->
        <script src="/fontawesome/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="/css/montserrat.css" rel="stylesheet" type="text/css" />
        <link href="/css/lato.css" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/pages.css" rel="stylesheet" />
    </head>
    <body id="page-top" style="background-color: #1abc9c;">

        @include('layouts.satu.partial.navbar')
        <div class="container">
            @yield('content')
        </div>

<!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-2 mb-5 mb-lg-0">
                    <i class="fa fa-question float-start fa-7x text-danger"></i>
                </div>
                <div class="col-lg-2 mb-5 mb-lg-0">
                    <p class="lead mb-0 fs-1">Tidak<br>Tahu?</p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-2">
                    <p class="lead mb-0 fs-1">Menjadi<br>Tahu!</p>
                </div>
                <div class="col-lg-2">
                    <i class="fa fa-exclamation fa-7x text-warning"></i>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>QUIZ</small></div>
    </div>        
    <!-- Bootstrap core JS-->
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core theme JS-->
    <script src="/js/pages.js"></script>
    </body>
</html>