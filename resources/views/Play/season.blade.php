@extends('layout')

@section('style')
<style>
	.content-movie{
		/*background-color: red;*/

	}
	.lince-logo{
		position: absolute;
	    height: 50px;
	    width: 80px;
	    margin: 5px;
	    overflow: hidden;
	}
	.badge{
		font-size: 14px;
	}
	.play-cover{
    	width: 100%;
    	height: 100%
	}
    .control-cap{
      text-decoration: none;
      display: inline-block;
      padding: 8px 16px;
    }

    .control-cap:hover {
      background-color: #ddd;
      color: black;
    }

    .previous {
      background-color: #f1f1f1;
      color: black;
    }

    .next {
      background-color: #17a2b8;
      color: white;
    }
    .episode-container{
        /*border-radius: 20px;*/
    }
    .episode-season{
        width: 100%;
        height: 170px;
        overflow: hidden;
        border-radius: 20px;
    }
    .episode-season img{
        border-radius: 20px;
        width: 100%;
        height: 100%;
    }
    .episode-season img:hover{
        /*border-radius: 20px;*/
        transform: scale(1.1);
    }
    .episode-title{
        position: absolute;
        background: #251a1ab0;
        color:white;
    }
</style>
@endsection

@section('content')
<div class="container content-movie mb-4">
	<nav>
	  <div class="nav nav-tabs" id="nav-tab" role="tablist">
	  	@php
	  		$active = 'active';
	  		$language = '';
	  	@endphp
	  	@foreach ($capitulo as $item)
	  		<a class="nav-item nav-link {{ $active }}" id="movie-{{ $item->id }}-tab" data-toggle="tab" href="#movie-{{ $item->id }}" role="tab" aria-controls="movie-{{ $item->id }}" aria-selected="true">{{ $item->other->language->language }}</a>
	  		@php
	  			$active = '';
	  			$language = $language."<span class='badge badge-info'>".$item->other->language->language."</span> ";
	  		@endphp
	  	@endforeach
	    @if (!count($capitulo))
	    	<a class="nav-item nav-link {{ $active }}" id="movie-default" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Default</a>
	    @endif
	    {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a> --}}
	  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
		@php
			$active = 'show active';
		@endphp
		@foreach ($capitulo as $item)
			<div class="tab-pane fade {{ $active }}" id="movie-{{ $item->id }}" role="tabpanel" aria-labelledby="movie-{{ $item->id }}-tab">
				<div class="lince-logo">
					<img src="{{ asset('images/logo.svg') }}" alt="">
				</div>
		  		<video {{-- poster={{ Storage::url($item->content->cover) }} --}} controls preload="none">
				  <source src="{{ Storage::url($item->other->path) }}" type="video/{{ $item->other->extension }}">
				  Tú navegador no soporta esta etiqueta.
				</video>
			  	
				{{-- <div class="alert alert-info" role="alert">
				  This is a info alert—check it out!
				</div> --}}
			</div>
			@php
				$active = '';
			@endphp
		@endforeach
		@if (!count($capitulo))
			<div class="tab-pane fade {{ $active }}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<div class="lince-logo">
					<img src="{{ asset('images/logo.svg') }}" alt="">
				</div>
				<video controls>
				  <source src="{{ Storage::url($default['movie']) }}">
				  Tú navegador no soporta esta etiqueta.
				</video>
				<div class="alert alert-info" role="alert">
				  El contenido aún no está disponible
				</div>
	 		</div>
		@endif
	 {{--  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
	  	2
	  </div> --}}
	</div>
    <p>Capítulo {{ $cap }}</p>
    <div class="d-flex justify content-center">
        <div>
            @if (count($pnCap))
                @if (count($pnCap)>1)
                    <a href="{{ route('playSerie',['id'=> $content->id,'nSeason'=>$pnCap[0]['season'],'cap'=> $pnCap[0]['episode'],'name'=>$content->name]) }}" class="control-cap previous">&laquo; Anterior</a>
                    <a href="{{ route('seasonSerie',['id'=>$content->id,'name'=>$content->name]) }}" class="control-cap"><i class="fa fa-bars"></i></a>
                    <a href="{{ route('playSerie',['id'=> $content->id,'nSeason'=>$pnCap[1]['season'],'cap'=> $pnCap[1]['episode'],'name'=>$content->name]) }}" class="control-cap next">Siguiente &raquo;</a>
                @else
                    @if ($pnCap[0]['episode'] > $cap)
                        <a href="{{ route('seasonSerie',['id'=>$content->id,'name'=>$content->name]) }}" class="control-cap"><i class="fa fa-bars"></i></a>
                        <a href="{{ route('playSerie',['id'=> $content->id,'nSeason'=>$pnCap[0]['season'],'cap'=> $pnCap[0]['episode'],'name'=>$content->name]) }}" class="control-cap next">Siguiente &raquo;</a>
                    @else
                        <a href="{{ route('playSerie',['id'=> $content->id,'nSeason'=>$pnCap[0]['season'],'cap'=> $pnCap[0]['episode'],'name'=>$content->name]) }}" class="control-cap previous">&laquo; Anterior</a>
                        <a href="{{ route('seasonSerie',['id'=>$content->id,'name'=>$content->name]) }}" class="control-cap"><i class="fa fa-bars"></i></a>
                    @endif
                @endif
            @else
                <a href="{{ route('seasonSerie',['id'=>$content->id,'name'=>$content->name]) }}" class="control-cap"><i class="fa fa-bars"></i></a>
            @endif
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    	<div class="col-12 d-none d-lg-block col-lg-3">
            @if($content->cover)
                <img class="play-cover" src="{{ Storage::url($content->cover) }}" alt="">
            @else
                <img class="play-cover" src="{{ Storage::url($content->defaultVariable()['cover']) }}" alt="">
            @endif
    	</div>
        <!-- ##### Post Content Area ##### -->
        <div class="col-12 col-md-6 col-lg-6">
            <!-- Single Blog Area  -->
            <div class="single-blog-area blog-style-2 mb-50">
                <!-- Blog Content -->
                <div class="single-blog-content">
                    <div class="line"></div>
                        <a href="#" class="post-tag">SINOPSIS</a>
                        <h4><a href="#" class="post-headline mb-0">{{ $content->name }}</a></h4>
                        
                        <p>{{ $content->description }}
                        	<br>
                            Título: {{ $content->name }}<br>
                            Visto: {{ $content->view }}<br>
                            Idioma: {!! $language !!}<br>
                            País: {{ $content->country->country }}<br>
                            Estreno: {{ $content->redate }}<br>
                            Género:
                            @foreach ($content->genres as $genre)
                            	<span class="badge badge-info">{{  $genre->name }}</span> 
                            @endforeach
                        </p>
					</div>
                </div>
            <!-- About Author -->

            <!-- Comment Area Start -->
            </div>
        <!-- ##### Sidebar Area ##### -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="post-sidebar-area mt-md-0">

                <!-- Widget Area -->
                <div class="sidebar-widget-area">
                    <form action="#" class="search-form">
                        <input type="search" name="search" id="searchForm" placeholder="Buscar">
                        <input type="submit" value="submit">
                    </form>
                </div>

                <!-- Widget Area -->
                <div class="sidebar-widget-area">
                    <h5 class="title subscribe-title">Suscribete en LAB Lince </h5>
                    <div class="widget-content">
                        <form action="#" class="newsletterForm">
                            <input type="email" name="email" id="subscribesForm" placeholder="Tu correo o nro de telefono">
                            <button type="submit" class="btn original-btn">Suscribete</button>
                        </form>
                    </div>
                </div>

                <!-- Widget Area -->
                <div class="sidebar-widget-area">
                    <h5 class="title">Promociones</h5>
                    {{-- <a href="#"><img src="img/bg-img/promo.jpg" alt=""></a> --}}
                </div>

                <!-- Widget Area -->
                

                <!-- Widget Area -->
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="d-flex justify-content-center mt-3">
        <p class="text-muted">Todos los capítulos disponibles</p>
    </div>
    <div class="row">
        @foreach ($allCap as $item)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 episode-container px-2">
                <a href="{{ route('playSerie',['id'=> $content->id,'nSeason'=>$item['season'],'cap'=> $item['episode'],'name'=>$content->name]) }}">
                    <div class="episode-season d-flex justify-content-center align-items-center">
                        <img src="{{ Storage::url($content->cover) }}" alt="">
                        @if ($item['episode'] == $cap)
                            <div class="episode-title">
                                <p class="text-center text-white mb-1">Estas aquí</p>
                                <p class="text-center text-white mb-0">pasa al siguente capítulo</p>
                            </div>
                        @endif
                    </div>
                    <p class="text-center">Capítulo {{ $item['episode'] }}</p>                 
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
@endsection