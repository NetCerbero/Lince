@extends('layout')
@section('style')
<style>
	.last-movie{
		height: 15em;
		width: 100%;
		overflow: hidden;
        border-radius: 10px;
	}
	.last-movie img{
		height: 100%;
		width: 100%;
	}
	.movie-efecto{
		position: absolute;
		top: 0px;
	    width: 100%;
	    height: 100%;
	    z-index: 1;
	   
	}
	.movie-efecto a{
		width: 100%;
		height: 100%;
	}
	.movie-efecto i{
		font-size: 2em;
		color: #fff;
	}
	.movie-efecto:hover{
		background-color: rgba(0,0,0,0.5);
        border-radius: 10px;
	}
	.title-movie{
		text-align: center;
	    position: absolute;
	    width: 100%;
	    height: 3.2em;
	    color: white;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    padding: 5px;
	    /*background: #ff5b5b;*/
	    /*background-color: #ff4e4e;*/
	    background-color: rgba(0,0,0,0.78);
	    z-index: 10;
	    overflow: hidden;
        border-radius: 10px 10px 0 0;
	}
	.container-movie{
		border: 1px solid #dac9c9;
        border-radius: 10px;
	}
	/*Small devices (landscape phones, 576px and up)*/
	@media (min-width: 576px) {
		.last-movie{
			height: 19em;
		}
	}

	/*medium devices (tablets, 768px and up)*/
	@media (min-width: 768px) { 
		.last-movie{
			height: 20em;
		}
	 }

	/*Large devices (desktops, 992px and up)*/
	@media (min-width: 992px) {
		.last-movie{
			height: 22em;
		}
	}

	/*Extra large devices (large desktops, 1200px and up)*/
	@media (min-width: 1200px){
		.last-movie{
			height: 24em;
		}
	}
</style>
@endsection
@section('carusel')
<div class="hero-area">
        <!-- Hero Slides Area -->
    <div class="hero-slides owl-carousel">
    	@foreach ($movie as $item)
            @if ($item->cover)
                <div class="single-hero-slide bg-img" style="background-image: url({{ Storage::url($item->cover)}});">
            @else
                <div class="single-hero-slide bg-img" style="background-image: url({{ Storage::url($default)}});">
            @endif
	            <div class="container h-100">
	                <div class="row h-100 align-items-center">
	                    <div class="col-12">
	                        <div class="slide-content text-center">
	                            <div class="post-tag">
	                                <a href="{{ route('playcontent',['id'=>$item->id,'name'=>$item->name]) }}" data-animation="fadeInUp">Disfruta tu viaje con el mejor entretenimiento</a>
	                            </div>
	                            {{-- <h2 data-animation="fadeInUp" data-delay="250ms"><a href="#!">con el mejor entretenimiento</a></h2> --}}
                                <h2 data-animation="fadeInUp" data-delay="250ms"><a href="{{ route('playcontent',['id'=>$item->id,'name'=>$item->name]) }}">{{ $item->name }}</a></h2>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
        @endforeach
    </div>
</div>
@endsection
@section('content')
<div class="container px-0">
	<div class="d-flex justify-content-center">
		<p class="mb-2" style="font-size: 1.2em;">Últimas películas publicadas</p>
	</div>
    <div class="row mx-0">
        <!-- Single Blog Area -->
        @foreach ($lastMovies as $item)
        	<div class="col-6 col-md-4 col-xl-3 p-0 container-movie">
        		<p class="title-movie m-0">
        			{{ $item->name }}
        		</p>
        		<div class="last-movie">
                    @if ($item->cover)
                        <img src="{{ Storage::url($item->cover) }}" alt=""> 
                    @else
                        <img src="{{ Storage::url($default) }}" alt="">
                    @endif
        		</div>
        		<div class="movie-efecto">
        			<a href="{{ route('playcontent',['id'=>$item->id,'name'=>$item->name]) }}" class="d-flex align-items-center justify-content-center">
        				<i class="fa fa-play d-none"></i>
        			</a>
        		</div>
	        </div>
        @endforeach
        
        
        {{-- <div class="col-6 col-md-4 col-xl-3">
            <div class="single-catagory-area clearfix mb-100">
                <img src="img/blog-img/comedia.jpg" alt="">
                <!-- Catagory Title -->
                <div class="catagory-title">
                    <a href="comedia.html" data-toggle="tooltip" data-placement="bottom" title="Mostrar peliculas"><i class="fa fa-play" aria-hidden="true"> Comedia</i></a>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection

@section('script')
<script>
	$(".movie-efecto").hover(function() {
		// e = $(this);
		$(this).parent().children()[1].firstElementChild.style.transform = "scale(1.2)";
		$(this).children().children().removeClass('d-none');
	}, function() {
		$(this).children().children().addClass('d-none');
		$(this).parent().children()[1].firstElementChild.style.transform = "scale(1)";
	});
</script>
@endsection