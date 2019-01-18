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
	  	@foreach ($movie->others as $item)
	  		<a class="nav-item nav-link {{ $active }}" id="movie-{{ $item->id }}-tab" data-toggle="tab" href="#movie-{{ $item->id }}" role="tab" aria-controls="movie-{{ $item->id }}" aria-selected="true">{{ $item->language->language }}</a>
	  		@php
	  			$active = '';
	  			$language = $language."<span class='badge badge-info'>".$item->language->language."</span> ";
	  		@endphp
	  	@endforeach
	    @if (!count($movie->others))
	    	<a class="nav-item nav-link {{ $active }}" id="movie-default" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Default</a>
	    @endif
	    {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a> --}}
	  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
		@php
			$active = 'show active';
		@endphp
		@foreach ($movie->others as $item)
			<div class="tab-pane fade {{ $active }}" id="movie-{{ $item->id }}" role="tabpanel" aria-labelledby="movie-{{ $item->id }}-tab">
				<div class="lince-logo">
					<img src="{{ asset('images/logo.svg') }}" alt="">
				</div>
		  		<video {{-- poster={{ Storage::url($item->content->cover) }} --}} controls>
				  <source src="{{ Storage::url($item->path) }}" type="video/{{ $item->extension }}">
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
		@if (!count($movie->others))
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
</div>
<div class="container">
    <div class="row">
    	<div class="col-12 d-none d-lg-block col-lg-3">
            @if($movie->cover)
                <img class="play-cover" src="{{ Storage::url($movie->cover) }}" alt="">
            @else
                <img class="play-cover" src="{{ Storage::url($movie->defaultVariable()['cover']) }}" alt="">
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
                        <h4><a href="#" class="post-headline mb-0">{{ $movie->name }}</a></h4>
                        
                        <p>{{ $movie->description }}
                        	<br>
                            Título: {{ $movie->name }}<br>
                            Visto: {{ $movie->view }}<br>
                            Idioma: {!! $language !!}<br>
                            País: {{ $movie->country->country }}<br>
                            Estreno: {{ $movie->redate }}<br>
                            Género:
                            @foreach ($movie->genres as $genre)
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
@endsection

@section('script')
@endsection