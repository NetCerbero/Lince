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
        .encuesta-menu{
            width: 300px !important;
        }
        .carousel{
            height: 100%;
        }
        .carousel-inner{
            height: 100%;
        }
        .carousel-inner img{
            height: 100% !important;
            width: 100% !important;
        }

        .search-result{
            display: none;
            max-height: 500px;
            overflow: auto;
            position: absolute;
            width: 300px;
            border-radius: 10px;
            margin-top: 10px;
            border: 2px solid #151212;
            background-color: #fff;
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
        .query-item{
            width: 50%;
            float: left;
            height: 200px;
            overflow: hidden;
            padding: 2px;
        }
        .query-item img{
            height: 90% !important;
            width: 100% !important;
            border-radius: 10px;
        }
        .query-title{
            width: 100%;
            margin: 0px;
            text-align: center;
        }
        .search-result a{
            display: block !important;
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
                        @php
                            $setting = App\Setting::findOrFail(1);
                        @endphp
                        <div class="top-social-area">
                            
                            <a href="{{ $setting->facebook }}" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            
                            <a href="{{ $setting->instagram }}" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://api.whatsapp.com/send?phone={{ $setting->whatsapp }}" data-toggle="tooltip" data-placement="bottom" title="Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Area -->
        <div class="logo-area text-center">
            <div class="container h-100">
                {{-- <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <a href="index.html" class="original-logo"><img src="img/core-img/logo.png" alt=""></a>
                    </div>
                </div> --}}
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    @php
                        $ads = App\Advertising::all()->where('status','t');
                        $active = "active";
                    @endphp
                    <div class="carousel-inner">
                        @foreach ($ads as $img)
                            <div class="carousel-item {{ $active }}">
                              <img class="d-block w-100" src="{{ Storage::url($img->path) }}" alt="First slide">
                            </div>
                            @php
                                $active = "";
                            @endphp
                        @endforeach
                        {{-- <div class="carousel-item">
                          <img class="d-block w-100" src="..." alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="..." alt="Third slide">
                        </div> --}}
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
                                    
                                    <li class="menu-main"><a href="{{ route('allseries') }}">Series</a></li>
                                    <li class="menu-main"><a href="{{ route('alldocumentary') }}">Documentales</a></li>
                                    <li class="menu-main"><a href="#!">Musica</a></li>
                                    @php
                                        $encuesta = App\Poll::all()->where('status','t');
                                    @endphp
                                    @if (count($encuesta))
                                        <li class="menu-main"><a href="#!">Encuesta <span class="badge badge-primary">{{ count($encuesta) }}</span></a>
                                            <ul class="dropdown encuesta-menu">
                                                @foreach ($encuesta as $item)
                                                    <li><a href="{{ route('doPoll',$item->id) }}">{{ $item->title }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                </ul>

                                <!-- Search Form  -->
                                <div class="container-search">
                                    <div id="search-wrapper">
                                        <form action="#">
                                            <input type="text" id="search" placeholder="Buscar...">
                                            <div id="close-icon"></div>
                                            <input class="d-none" type="submit" value="">
                                        </form>
                                    </div>
                                    <div class="search-result" id="result-query">
                                        <a href="">
                                            <div class="query-item">
                                                <img src="{{ asset('images/movie/1.jpg') }}" alt="">
                                                <p class="query-title">Titulo</p>
                                            </div>
                                        </a>
                                        <div class="query-item">
                                            <img src="{{ asset('images/movie/1.jpg') }}" alt="">
                                            <p class="query-title">Titulo</p>
                                        </div>
                                        {{-- <div class="query-item">
                                            <img src="{{ asset('images/movie/10.jpg') }}" alt="">
                                            <p class="query-title">Titulo</p>
                                        </div>
                                        <div class="query-item">
                                            <img src="{{ asset('images/movie/11.jpg') }}" alt="">
                                            <p class="query-title">Titulo</p>
                                        </div>
                                        <div class="query-item">
                                            <img src="{{ asset('images/movie/12.jpg') }}" alt="">
                                            <p class="query-title">Titulo</p>
                                        </div>
                                        <div class="query-item">
                                            <img src="{{ asset('images/movie/2.jpg') }}" alt="">
                                            <p class="query-title">Titulo</p>
                                        </div>
                                        <div class="query-item">
                                            <img src="{{ asset('images/movie/3.jpg') }}" alt="">
                                            <p class="query-title">Titulo</p>
                                        </div>
                                        <div class="query-item">
                                            <img src="{{ asset('images/movie/7.jpg') }}" alt="">
                                            <p class="query-title">Titulo</p>
                                        </div>
                                        <div class="query-item">
                                            <img src="{{ asset('images/movie/1.jpg') }}" alt="">
                                            <p class="query-title">Titulo</p>
                                        </div> --}}
                                    </div>
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
                $lastMovie = App\Content::all()->whereIn('type',[1,2,4,5])->sortByDesc('view')->take(12);
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
                        @if ($item->type < 3)
                            <a href="{{ route('playcontent',['id'=>$item->id,'name'=>$item->name]) }}" class="d-flex align-items-center justify-content-center"><i class="fa fa-play"></i></a>
                        @else
                            <a href="{{ route('seasonSerie',['id'=>$item->id,'name'=>$item->name]) }}" class="d-flex align-items-center justify-content-center">
                                <i class="fa fa-play d-none"></i>
                            </a>
                        @endif
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
                            <li><span class="mr-2"><i class="fa fa-map-marker px-2 px-sm-3"></i></span> <span class="pr-2 pr-md-4 text-justify">{{ $setting->address }}</span></li>
                            <li><span class="mr-2"><i class="fa fa-phone px-2 px-sm-3"></i></span> <span class="pr-2">{{ $setting->phone }}</span></li>
                            <li><span class="mr-2"><i class="fa fa-envelope-open px-2 px-sm-3"></i></span> <span class="pr-2" style="color: #01ceff;">{{ $setting->email }}</span></li>
                        </ul> 
                    </div>
                </div>
                <div class="col-4 col-md-6 px-0">
                    <div class="footer-info d-flex d-md-block align-items-center justify-content-center p-md-2 px-lg-3">
                        <p class="pt-3 mb-1 text-white size-text d-none d-md-block">Sobre la compañia</p>
                        <p class="text-justify about-company d-none d-md-block">{{ $setting->about }}</p>
                        <div class="top-social-area">
                            <a href="{{ $setting->facebook }}" class="m-0" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            
                            <a href="{{ $setting->instagram }}" class="m-0" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://api.whatsapp.com/send?phone={{ $setting->whatsapp }}" class="m-0" data-toggle="tooltip" data-placement="bottom" title="Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
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
    <script>
        var mov = "{{ route('playcontent',['id'=>':ID','name'=>':TITLE']) }}";
        var ser = "{{ route('seasonSerie',['id'=>':ID','name'=>':TITLE']) }}";
        var item = '<a href=":DIR"><div class="query-item"><img src=":COVER" alt=""><p class="query-title">:TITLE</p></div></a>';
        function renderQuery(data){
            var resultado = $('#result-query');
            resultado.html('');
            var medias= "";
            for(var i = 0 ; i < data.length; i++){
                var dir = "";
                if( data[i].type > 3){
                    dir = ser.replace(':ID',data[i].id);
                    dir = dir.replace(':TITLE',data[i].name);
                }else{
                    dir = mov.replace(':ID',data[i].id);
                    dir = dir.replace(':TITLE',data[i].name);
                } 
                var contenido = item.replace(':DIR',dir);
                contenido = contenido.replace(':COVER','/storage'+data[i].cover.replace('public',''));
                contenido = contenido.replace(':TITLE',data[i].name);
                medias = medias + contenido;
            }
            resultado.append(medias);
            resultado.css("display","block");
        }
        var pattern = "";
        function buscarPattern(query){
            // $('#result-query');
            var url = "{{ route('searchContent',':QUERY') }}";
            url = url.replace(':QUERY',query);
            $.get(url,function(rsp, status){
                if(status == "success"){
                    console.log(rsp);
                    if(rsp.length){
                        renderQuery(rsp);
                    }
                }
            });
        }
        $(document).ready(function(){
            $('#search').on('input',function(e){
                var value = this.value.trim();
                if(value.length >= 2 && value != pattern){
                    pattern = value;
                    buscarPattern(this.value);
                }
            });

            $('#close-icon').click(function(){
                $("#search").val("");
                var clear = $('#result-query');
                clear.html('');
                clear.css("display","none");
            });
        });
    </script>
    @yield('script')
</body>

</html>