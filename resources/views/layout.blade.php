<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Lince PLAY</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/classy-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="{{ asset('css/style_main.css') }}" rel="stylesheet">
    <style>
        .logo-lince{
            height: 100%;
            width: 100%;
            transform: scale(1.5);
        }
        .container-logo{
            height: 100%;
            overflow: hidden;
            width: 200px;
        }
        .menu-main:hover{
            border-bottom: 3px solid #f4645f;
        }
        .footer-info{
            background-color: #181818;
            height: 155px;
        }
        .size-text{
            font-size: 13px;
        }
        .empresa-info{
            color: white;
        }
        .empresa-info li{
            display: flex;
            margin-bottom: 5px;
        }

        .empresa-info li span:nth-child(1){
            align-self: center;
            /*background-color: red;
            border-radius: 50%;*/
        }
        .top-social-area a{
            font-size: 20px;
            margin: 8.5px !important;
        }
        .about-company{
            height: 7em;
            overflow: hidden;
        }
        
        .owl-carousel .owl-item img {
            display: block;
            width: 100%;
            height: 270px;
            -webkit-transform-style: preserve-3d;
        }
        .header-area .original-nav-area .classy-nav-container{
            /*overflow: hidden !important;*/
        }
        @media (min-width: 576px) {
            .top-social-area a{
                font-size: 48px;
            }
            .footer-info{
                height: 170px;
            }
            .size-text{
                font-size: 18px;
            }
            .owl-carousel .owl-item img {
                height: 270px;
            }
        }

        /*medium devices (tablets, 768px and up)*/
        @media (min-width: 768px) { 
            .top-social-area a{
                font-size: 30px;
            }
            .footer-info{
                height: 210px
            }
            .size-text{
                font-size: 19px;
            }
            .about-company {
                height: 100px;
                font-size: 15px;
                margin: 0 0 10px 0;
            }
            .owl-carousel .owl-item img {
                height: 350px;
            }
         }

        /*Large devices (desktops, 992px and up)*/
        @media (min-width: 992px) {
            .top-social-area a{
                font-size: 36px;
            }
            .footer-info{
                height: 240px;
            }
            .size-text{
                font-size: 20px;
            }
            .about-company {
                height: 110px;
                font-size: 16px;
            }
            .owl-carousel .owl-item img {
                height: 300px;
            }
        }

        /*Extra large devices (large desktops, 1200px and up)*/
        @media (min-width: 1200px){
            .top-social-area a{
                font-size: 45px;
            }
            .footer-info {
                height: 255px;
            }
            .size-text{
                font-size: 22px;
            }
            .about-company {
                height: 120px;
                font-size: 18px;
                margin: 0 0 10px 0;
            }
            .owl-carousel .owl-item img {
                height: 370px;
            }
        }
    </style>
    @yield('style')
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>

    <!-- Subscribe Modal -->
    <div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                        <h5 class="title">Suscribete a LAB Lince</h5>
                        <form action="#" class="newsletterForm" method="post">
                            <input type="email" name="email" id="subscribesForm2" placeholder="Your e-mail here">
                            <button type="submit" class="btn original-btn">LAB Lince</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-12 col-sm-8">
                        <div class="breaking-news-area">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#">Vive viajando!</a></li>
                                    <li><a href="#">Vive TU viaje</a></li>
                                    <li><a href="#">Disfruta TU viaje</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Social Area -->
                    <div class="col-12 col-sm-4">
                        <div class="top-social-area">
                            
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Area -->
        <div class="logo-area text-center">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <a href="index.html" class="original-logo"><img src="img/core-img/logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Area -->
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between">
                        <!-- Subscribe btn -->
                        <a href="{{ route('home') }}" class="subscribe-btn container-logo">
                                <img class="logo-lince" src="{{ asset('images/logo.svg') }}" alt="">
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="menu-main"><a href="{{ route('home') }}">Inicio</a></li>
                                    <li class="menu-main"><a href="#">Peliculas</a>
                                        <ul class="dropdown">
                                            @php
                                                $genres = App\Genre::all()->where('type',1);
                                            @endphp
                                            @foreach ($genres as $item)
                                                <li><a href="{{ route('movieGenre',['id'=>$item->id,'name'=>$item->name]) }}">{{ $item->name }}</a></li>
                                            @endforeach
                                            <li><a href="{{ route('allmovie') }}">Todos</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="menu-main"><a href="#!">Series</a></li>
                                    <li class="menu-main"><a href="{{ route('alldocumentary') }}">Documentales</a></li>
                                    <li class="menu-main"><a href="#!">Musica</a></li>
                                </ul>

                                <!-- Search Form  -->
                                <div id="search-wrapper">
                                    <form action="#">
                                        <input type="text" id="search" placeholder="Buscar...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    @yield('carusel')
    
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper py-4 clearfix">
        @yield('content')        
    </div>
    <!-- ##### Blog Wrapper End ##### -->

    <!-- ##### Instagram Feed Area Start ##### -->
    <div class="instagram-feed-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="insta-title">
                        <h5>Contenidos más vistos en Lince</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instagram Slides -->
        <div class="instagram-slides owl-carousel">
            @php
                $lastMovie = App\Content::all()->whereIn('type',[1,2,3])->sortByDesc('view')->take(12);
            @endphp
            @foreach ($lastMovie as $item)
                <div class="single-insta-feed">
                    @if ($item->cover)
                        <img src="{{ Storage::url($item->cover) }}" alt="">
                    @else
                        <img src="{{ Storage::url($item->defaultVariable()['cover']) }}" alt="">
                    @endif
                    <!-- Hover Effects -->
                    <div class="hover-effects">
                        <a href="{{ route('playcontent',['id'=>$item->id,'name'=>$item->name]) }}" class="d-flex align-items-center justify-content-center"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- ##### Instagram Feed Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area pb-0">
        <div class="container-fluid px-0">
            <div class="row mx-0">
                <div class="col-8 col-md-6 px-0">
                    <div class="footer-info d-flex align-items-center">
                        <ul class="empresa-info size-text">
                            <li><span class="mr-2"><i class="fa fa-map-marker px-2 px-sm-3"></i></span> <span class="pr-2 pr-md-4 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis unde dicta necessitatibus.</span></li>
                            <li><span class="mr-2"><i class="fa fa-phone px-2 px-sm-3"></i></span> <span class="pr-2">(+591) 69554986</span></li>
                            <li><span class="mr-2"><i class="fa fa-envelope-open px-2 px-sm-3"></i></span> <span class="pr-2" style="color: #01ceff;">empresa@lince.com</span></li>
                        </ul> 
                    </div>
                </div>
                <div class="col-4 col-md-6 px-0">
                    <div class="footer-info d-flex d-md-block align-items-center justify-content-center p-md-2 px-lg-3">
                        <p class="pt-3 mb-1 text-white size-text d-none d-md-block">Sobre la compañia</p>
                        <p class="text-justify about-company d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi similique voluptatem assumenda rerum architecto tempore laboriosam labore at repudiandae, ipsum itaque vitae officiis, hic, accusamus, aliquid distinctio enim aperiam asperiores. Ea quaerat quasi tenetur, vero recusandae, reiciendis itaque sed accusamus nostrum commodi tempore doloribus placeat vel facilis asperiores atque minus ut amet a temporibus? Odit consequuntur voluptates voluptate culpa itaque dicta reiciendis quas similique hic. Fugiat voluptate quasi aut cupiditate quia natus, dolores in temporibus obcaecati minus, tempora, ullam esse impedit. Minus distinctio necessitatibus officiis cupiditate doloribus facilis saepe cum voluptatibus fuga illum assumenda odio numquam, quaerat explicabo aliquam porro?</p>
                        <div class="top-social-area">
                            <a href="#" class="m-0" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            
                            <a href="#" class="m-0" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" class="m-0" data-toggle="tooltip" data-placement="bottom" title="Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="row">
                <div class="col-12">
                   
                    <!-- Footer Nav Area -->
                    <div class="classy-nav-container breakpoint-off">
                        <!-- Classy Menu -->
                        <nav class="classy-navbar justify-content-center">

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>

                            <!-- Menu -->
                            <div class="classy-menu">

                                <!-- close btn -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>

                                <!-- Nav Start -->
                                <div class="classynav">
                                    <ul>
                                        <li><a href="index.html">Inicio</a></li>
                                        <li><a href="#">Peliculas</a></li>
                                        <li><a href="documental.html">Documental</a></li><li><a href="#">Acerca de LINCE</a></li>
                                        <li><a href="#">Contactos</a></li>
                                        
                                    </ul>
                                </div>
                                <!-- Nav End -->
                            </div>
                        </nav>
                    </div>
                    
                    <!-- Footer Social Area -->
                    <div class="footer-social-area mt-30">
                        
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        
                    </div>
                </div>
            </div>
        </div> --}}

   <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
   {{--  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <a href="https://colorlib.com" target="_blank">@lx</a> --}}
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>
    @yield('script')
</body>

</html>