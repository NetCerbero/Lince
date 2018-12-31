<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
  	<link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('classy-nav.css') }}">
  	<link rel="stylesheet" href="{{ asset('animate.css') }}">
  	<link rel="stylesheet" href="{{ asset('owl.carousel.css') }}">
  	<link rel="stylesheet" href="{{ asset('font-awesome.min.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Lince</title>
    <style>
    	/*header{
    		position: fixed;
		    width: 100%;
		    z-index: 100;
    	}*/

    	.menu-item{
    		font-size: 1.3em;
    	}
    	.navbar-brand{
    		height: 60px;
    	}
    	.nav-item:hover{

    		border-bottom: 2px #f4645f solid;
    	}
    	.nav-link:hover{
    		color:#f4645f !important;
    	}
    	.navbar-brand-full{
    		position: relative;
    		top: -20px
    	}
    	.seccion-publicidad{
    		/*position: relative;
    		top: 75px;*/
    		/*overflow: hidden;*/
		    background-size: cover;
		    height: 90vh
    	}
    	.seccion-publicidad img{
    		height: 100%;
    		width: 100%;
    	}

    	.publicidad{
    		position: relative;
    		top: -560px;
		    display: block;
		    height: 250px;
		    width: 85%;
		    /*background-size: cover;
		    overflow: hidden;*/
		    background-color: white;
    	}
    	.publicidad img{
    		height: 100%;
    		width: 100%;
    	}
    	.container-main{
    		width: 85%;
    	}
    	.last-movie{
    		overflow: hidden;
    		position: relative;
    		top: -280px;
    		background-color: white;
    		border-radius: 10px;
    		border: 1px solid #c3c6ca;
    	}
    	.last-movie .row{
    		overflow: hidden;
    	}
    	.title-movie{
    		position: absolute;
		    bottom: 6px;
		    width: 100%;
		    height: 50px;
		    color: white;
		    background: #171515ab;
    	}
    </style>
</head>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-white">
	  <a class="navbar-brand py-0" href="#">
	  	<img class="navbar-brand-full" src="{{ asset('images/logo.svg') }}" width="150px" height="100px" alt="Logo lince">
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto menu-item">
	      <li class="nav-item">
	        <a class="nav-link" href="#">Películas <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Documentales <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Música <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Series</a>
	      </li>
	      {{-- <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Películas
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Acción</a>
	          <a class="dropdown-item" href="#">Drama</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Romance</a>
	        </div>
	      </li> --}}
	      {{-- <li class="nav-item">
	        <a class="nav-link disabled" href="#">Disabled</a>
	      </li> --}}
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
	      <button class="btn btn-info my-2 my-sm-0 text-white" type="submit"><i class="fa fa-search"></i></button>
	    </form>
	  </div>
	</nav>
</header>
<div class="container-fluid p-0">
	{{-- SE LA DEBE MOVER A LA VISTA PRINCIPAL --}}
	<section class="seccion-publicidad">
		<img src="{{ asset('images/flota.jpg') }}" alt="">
		<picture class="publicidad mx-auto">
			<img src="{{ asset('images/logo.svg') }}" alt="">
		</picture>
	</section>
	<section class="mx-auto container-main last-movie p-3">
		<div>
			Ultimas películas y episodios publicados
		</div>
		<div class="row">
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/1.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/2.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/3.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/4.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/5.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/6.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/7.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/8.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/9.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/10.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/11.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
			<div class="col-6 col-sm-4 col-md-3 col-xl-2"><img src="{{ asset('images/movie/2.jpg') }}" alt=""><div class="title-movie d-flex justify-content-center">titulo de la pelicula</div></div>
		</div>
	</section>
	<section class="mx-auto container-main">
		<h2>Seguirmos aqui</h2>
	</section>
	{{-- FIN DE LA VISTA --}}
</div>
<script src="{{ asset('vendors/cdn_datatable/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>