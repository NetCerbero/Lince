@extends('adm')

@section('style')
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/cdn_datatable/responsive.bootstrap4.min.css') }}">
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
	.video-edit{
		height: 150px;
		width: 250px;
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
	<div class="content-body mt-3">
		<table id="multimedia" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Media</th>
							<th>Temporada</th>
							<th>Capítulo</th>
							<th>Idioma</th>
							<th>Título</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($content->episodes as $item)
							<tr>
								<td class="d-flex justify-content-center">
									<video class="video-edit" controls preload="none">
										<source src="{{ Storage::url($item->other->path) }}" type="video/{{ $item->other->extension }}">
				  						Tú navegador no soporta esta etiqueta.
									</video>
								</td>
								<td>
									Temporada {{ $item->season }}
								</td>
								<td>
									Capítulo {{ $item->episode }}
								</td>
								<td>
									{{ $item->other->language['language'] }}
								</td>
								<td>
									{{ $item->name_episode }}
								</td>
							</tr>
						@endforeach
					</tbody>
		</table>
	</div>
@else
	<div class="alert alert-info d-flex justify-content-center" role="alert">
		No existe el archivo multimedia
	</div>
@endif
@endsection

@section('script')
<script src="{{ asset('vendors/cdn_datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/cdn_datatable/dataTables.responsive.min.js') }}"></script>
<script>
	$(document).ready(function() {
		$('#multimedia').DataTable();
	});
</script>
@endsection