<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="{!! asset('css/global.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet" media="screen">
    <link href="{!! asset('css/font-awesome.css') !!}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{!! asset('css/meanmenu.css') !!}" media="all" />
    <link rel="stylesheet" href="{!! asset('css/animate.css') !!}">

    <!-- HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <header>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="logo wow slideInLeft animated" data-wow-duration="1s">
                            <a href="/"><img src="{!! asset('images/logo.png') !!}" alt="Retrun Karo"></a>
                        </div>
                    </div>
                    <div class="col-md-6 search col-sm-6 wow bounceInUp animated">
                        <form action="">
                            <input type="text" placeholder="Search here...">
                            <input type="button" class="searchBtn sprite">
                        </form>
                    </div>
                    <div class="col-md-3 col-sm-3 login-signup wow slideInRight animated" data-wow-duration="1s">
                        <a href="{!! url('signup') !!}">Sign Up</a>
                        <a href="{!! url('login') !!}">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li>
                                <a href="#">e-Filing</a>
                                <ul>
                                    <li><a href="#">Submenu 1</a></li>
                                    <li><a href="#">Submenu 2</a></li>
                                    <li><a href="#">Submenu 3</a></li>
                                    <li><a href="#">Submenu 4</a></li>
                                    <li><a href="#">Submenu 5</a></li>
                                    <li><a href="#">Submenu 6</a></li>
                                </ul>
                            </li>
                            <li><a href="#">e-TDS</a></li>
                            <li><a href="#">Form 26AS</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div id="contentCntr">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <h4>Return Karo</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <h4>Other Links</h4>
                    <div class="row">
                        <ul class="col-md-6 col-sm-6 col-xs-6">
                            <li><a href="#">Link small</a></li>
                            <li><a href="#">Link long long link</a></li>
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                            <li><a href="#">Link long long link</a></li>
                            <li><a href="#">Link 3</a></li>
                        </ul>
                        <ul class="col-md-6  col-sm-6 col-xs-6">
                            <li><a href="#">Link small</a></li>
                            <li><a href="#">Link long long link</a></li>
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                            <li><a href="#">Link long long link</a></li>
                            <li><a href="#">Link 3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4  ol-sm-4 col-xs-12">
                    <h4>Other Heading</h4>
                    <div class="row">
                        <ul class="col-md-6 col-sm-6 col-xs-6">
                            <li><a href="#">Link small</a></li>
                            <li><a href="#">Link long long link</a></li>
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                            <li><a href="#">Link long long link</a></li>
                            <li><a href="#">Link 3</a></li>
                        </ul>
                        <ul class="col-md-6  col-sm-6 col-xs-6">
                            <li><a href="#">Link small</a></li>
                            <li><a href="#">Link long long link</a></li>
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                            <li><a href="#">Link long long link</a></li>
                            <li><a href="#">Link 3</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 connect">
                    <h4>Connect With Us</h4>
                    <a href="#" class="fb"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="mail"><i class="fa fa-envelope"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="bot">
                        <p class="remmarginB">Copyright 2015 returnkaro.com. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.meanmenu.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('header nav').meanmenu();
            $(".videoBox video").click(function(){
                $(".videoBox .videoOverlay").show();
            });
        });
    </script>

    <script type="text/javascript" src="js/jquery.devrama.slider.js"></script>
    <script type="text/javascript">
        $('#my-slide').DrSlider({
            width: undefined,
            height: undefined,
            userCSS: false,
            transitionSpeed: 1000,
            duration: 6000,
            showNavigation: true,
            classNavigation: undefined,
            navigationColor: '#9F1F22',
            navigationHoverColor: '#D52B2F',
            navigationHighlightColor: '#DFDFDF',
            navigationNumberColor: '#000000',
            positionNavigation: 'in-center-bottom',
            navigationType: 'circle',
            showControl: true,
            classButtonNext: undefined,
            classButtonPrevious: undefined,
            controlColor: '#FFFFFF',
            controlBackgroundColor: '#000000',
            positionControl: 'left-right',
            transition: 'slide-left',
            showProgress: true,
            progressColor: '#797979',
            pauseOnHover: true,
            onReady: undefined
        });
    </script>

    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

</body>

</html>