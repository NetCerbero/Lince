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
		background-color: #050505c2;
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
	    background-color: #000000e6;
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
@section('content')

<div class="container px-0">
	<div class="d-flex justify-content-center">
		<h4 class="text-muted">{{ $title }}</h4>
	</div>
	@if (count($movies))
	    <div class="row mx-0">
	        <!-- Single Blog Area -->
	        @foreach ($movies as $item)
	        	<div class="col-6 col-md-4 col-xl-3 p-0 container-movie">
	        		<p class="title-movie m-0">
	        			{{ $item->name }}
	        		</p>
	        		<div class="last-movie">
	                    @if ($item->cover)
	                        <img src="{{ Storage::url($item->cover) }}" alt=""> 
	                    @else
	                        <img src="{{ Storage::url($item->defaultVariable()['cover']) }}" alt="">
	                    @endif
	        		</div>
	        		<div class="movie-efecto">
	        			<a href="{{ route('playcontent',['id'=>$item->id,'name'=>$item->name]) }}" class="d-flex align-items-center justify-content-center">
	        				<i class="fa fa-play d-none"></i>
	        			</a>
	        		</div>
		        </div>
	        @endforeach
	    </div>
		<div class="mt-2">
			{{ $movies->onEachSide(10)->links() }}
		</div>
	@else
		<div class="alert alert-info d-flex justify-content-center" role="alert">
			Aún no tenemos contenidos en esta sección.
		</div>
	@endif
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