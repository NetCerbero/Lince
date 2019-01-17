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
    .season{
        font-size: 20px;
         margin-bottom: 5px;
    }
    .season-container{
        text-align: center;
    }
    .season-container a:hover{
        font-size: 20px !important;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-12 col-md-6 col-lg-4">
            @if($movie->cover)
                <img class="play-cover" src="{{ Storage::url($movie->cover) }}" alt="">
            @else
                <img class="play-cover" src="{{ Storage::url($movie->defaultVariable()['cover']) }}" alt="">
            @endif
    	</div>
        <!-- ##### Post Content Area ##### -->
        <div class="col-12 col-md-6 col-lg-8">
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
    </div>
    
        @if (count($temporadas))
            <div class="season-container mt-3">
                @foreach ($temporadas as $tem)
                    <a href="{{ route('playSerie',['id'=>$movie->id,'nSeason'=> $tem->season,'cap'=> $tem->cap,'name'=>$movie->name]) }}" class="badge badge-dark season mr-1">Temporada {{ $tem->season }}</a>
                @endforeach
            </div>
        @else
        <div class="d-flex justify-content-center mt-3">
            <div class="alert alert-info" role="alert">
              Aún no hay temporadas disponibles
            </div>
         </div>
        @endif
   
</div>
@endsection

@section('script')
@endsection