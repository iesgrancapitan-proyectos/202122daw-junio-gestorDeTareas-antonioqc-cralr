<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>WorkFine</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset ('css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href={{ asset('css/pages.css') }}>
        <link rel="stylesheet" href={{ asset('css/pluton.css') }}>
        <link rel="stylesheet" href={{ asset('css/style.css') }}>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    </head>
    <body>   
    <div class="section primary-section" id="service">
    <!-- <nav class="navbar navbar-light bg-light static-top"> -->
            <div class="container" id="navegacion">
                <div>
                    <img src="assets/img/logo.png" alt="" srcset="">
                    <a id="titulo" href="#!">WORKFINE</a>
                </div>
                @if (Route::has('login'))
                    <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Inicio Sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        <!-- </nav> -->
        <div class="container">
            <!-- Start title section -->
            <div class="title">
                <h1>¡Organizate con WorkFine!</h1>
                <!-- Section's title goes here -->
                <p>Tu gestor de tareas más sencillo. Concentrate y organizate con WorkFine</p>
                <img src="assets/img/imagentareasinicio.png" width="100%">
                <br></br>
                <div><a href="{{ route('register') }}" class="btn btn-primary btn-lg">¡Regístrate ya!</a></div>
                <br></br>
            </div>
        </div>
    </div>
    <!-- Service section end -->
    <!-- Portfolio section start -->
    <div class="section secondary-section ">
        <!-- Start details for portfolio project 1 -->
        <div class="infotareaproyecto">
            <h1>Añade, organiza tus tareas y aumenta tu productividad</h1>
            <p>Tus listas de tareas se organizarán en las vista principal donde se encuentran todas y en la vista de Hoy. Todas ellas se ordenan por orden de vencimiento.</p>
        </div>
        <!-- End details for portfolio project 1 -->
        <!-- Start details for portfolio project 2 -->
        <div class="infotareaproyecto">
            <img src="assets/img/visualizaciontarea.png" alt="" srcset="">
        </div>
        <div class="infotareaproyecto">
            <h1>Añade nuevos proyectos y trabaja en grupo</h1>
            <p>Te permitirá compartir tu proyecto con varios usuarios y poder chatear con ellos.</p>
        </div>
        <div class="infotareaproyecto">
            <img src="assets/img/visualizacionproyecto.png" alt="" srcset="">
        </div>
        <!-- End details for portfolio project 1 -->
        <!-- Start details for portfolio project 2 -->
    </div>
    <!-- Portfolio section end -->
    <!-- About us section start -->
    <div class="section primary-section" id="about">
        <div class="container">
            <div class="title">
                <h1>Contáctanos</h1>
                <p></p>
            </div>
            <div class="row-fluid team">
                <div class="span4" id="first-person">
                    <div class="thumbnail">
                        <h3>Antonio Quesada Cuadrado</h3>
                        <br>
                        <ul class="social">
                        <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-linkedin fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-telegram fs-3"></i></a>
                            </li>
                        </ul>
                        <div class="mask">
                        </div>
                    </div>
                </div>
                <br>
                <div class="span4" id="second-person">
                    <div class="thumbnail">
                        <h3>Rafael Miguel Cruz Álvarez</h3>
                        <br>
                        <ul class="social">
                        <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-linkedin fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-telegram fs-3"></i></a>
                            </li>
                        </ul>
                        <div class="mask">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price section end -->
    <!-- Newsletter section start -->
    <script type="text/javascript" src="js/app.js"></script>
    <script>
    function inIframe () {
        try {
            return window.self !== window.top;
        } catch (e) {
            return true;
        }
    }

    if(!inIframe()){
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-54039406-1', 'auto');
        ga('send', 'pageview');
    }
    </script>
</body>
</html>
