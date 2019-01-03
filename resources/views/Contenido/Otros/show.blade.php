@extends('adm')

@section('style')
<style>
	.img-cover{
		display: block;
		height: 450px;
	    width: 350px;
	    overflow: hidden;
	}
	.img-cover img{
		height: 100%;
		width: 100%;
	}
	.info-movie{
		color: #73818f;
		list-style: none;
		text-align: justify;
	}
	.info-movie li{
		margin-bottom: 3px;
	}
</style>
@endsection

@section('title')
<h5 class="text-muted font-weight-normal mb-0">Visualización de contenido multimedia</h5>
@endsection

@section('content')
@if ($content)
	<div class="content-body">
		<div class="row">
			<div class="col-12 col-xl-3 d-flex justify-content-center align-items-center pr-lg-0">
				<div class="img-cover">
					@if($content->cover)
						<img src="{{ Storage::url($content->cover) }}" alt="">
					@else
						<img src="{{ Storage::url($content->defaultVariable()['cover']) }}" alt="">
					@endif
				</div>
			</div>
			<div class="col-12 col-xl-9 mt-4 mt-xl-0">
				<ul class="info-movie px-0">
					<li>Sinopsis: {{ $content->description }}</li>
					<li>Título: {{ $content->name }}</li>
					@if ($content->type == 1)
						<li>Tipo: Película</li>
					@elseif($content->type == 2)
						<li>Tipo: Documental</li>
					@else
						<li>Tipo: Música</li>
					@endif
					<li>Fecha de estreno: {{ $content->redate }}</li>
					<li>Visto: {{ $content->view }}</li>
					<li>Género:
						@foreach ($content->genres as $genre)
	                    	<span class="badge badge-info">{{  $genre->name }}</span> 
	                    @endforeach
					</li>
				</ul>
			</div>
		</div>
	</div>
	<nav class="mt-2">
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		  	@php
		  		$active = 'active';
		  		$language = '';
		  	@endphp
		  	@foreach ($content->others as $item)
		  		<a class="nav-item nav-link {{ $active }}" id="movie-{{ $item->id }}-tab" data-toggle="tab" href="#movie-{{ $item->id }}" role="tab" aria-controls="movie-{{ $item->id }}" aria-selected="true">{{ $item->language->language }}</a>
		  		@php
		  			$active = '';
		  			$language = $language."<span class='badge badge-info'>".$item->language->language."</span> ";
		  		@endphp
		  	@endforeach
		    {{-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a> --}}
		  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
		@php
			$active = 'show active';
		@endphp
		@foreach ($content->others as $item)
			<div class="tab-pane fade {{ $active }}" id="movie-{{ $item->id }}" role="tabpanel" aria-labelledby="movie-{{ $item->id }}-tab">
		  		<video {{-- poster={{ Storage::url($item->content->cover) }} --}} height="100%" width="100%" controls>
				  <source src="{{ Storage::url($item->path) }}" type="video/{{ $item->extension }}">
				  Tú navegador no soporta esta etiqueta.
				</video>
			</div>
			@php
				$active = '';
			@endphp
		@endforeach
	 {{--  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
	  	2
	  </div> --}}
	</div>
@else
	<div class="alert alert-info d-flex justify-content-center" role="alert">
		No existe el archivo multimedia
	</div>
@endif
@endsection

@section('script')

@endsection