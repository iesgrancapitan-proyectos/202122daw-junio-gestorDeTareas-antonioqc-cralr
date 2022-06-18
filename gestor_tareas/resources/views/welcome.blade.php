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
    <body>    <!-- Service section start -->
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
    <div class="section secondary-section " id="portfolio">
        <div class="container">
            <div class=" title">
                <h1>Have You Seen our Works?</h1>
                <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
            </div>
            <!-- Start details for portfolio project 1 -->
            <div id="single-project">
                <div id="slidingDiv" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio01.png" alt="project 1" />
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close"><i class="icon-cancel"></i></span>
                            </div>
                            <div class="project-info">
                                <div><span>Client</span>Some Client Name</div>
                                <div><span>Date</span>July 2013</div>
                                <div><span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div><span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 1 -->
                <!-- Start details for portfolio project 2 -->
                <div id="slidingDiv1" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio02.png" alt="project 2">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close"><i class="icon-cancel"></i></span>
                            </div>
                            <div class="project-info">
                                <div><span>Client</span>Some Client Name</div>
                                <div><span>Date</span>July 2013</div>
                                <div><span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div><span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>Life is a song - sing it. Life is a game - play it. Life is a challenge - meet it. Life is a dream - realize it. Life is a sacrifice - offer it. Life is love - enjoy it.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            <h2>Copywriter</h2>
                            <p>When you stop expecting people to be perfect, you can like them for who they are.</p>
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
                            <h2>Designer</h2>
                            <p>When you stop expecting people to be perfect, you can like them for who they are.</p>
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
