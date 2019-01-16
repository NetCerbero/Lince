@extends('adm')
@section('style')
<style>
	.container-fluid{
		padding: 0 25px !important;
	}
	.content-body{
		background: white;
		padding: 20px 20px;
		margin-bottom: 25px;
	}
	.card{
		margin-bottom: 0 !important;
	}
	.question-show-title:hover{
		text-decoration: none;
	}
	.grafico-question{
		width: 100% !important;
	}
</style>
@endsection

@section('title')
	<h5 class="text-muted font-weight-normal mb-0">Visualizacion de graficos</h5>
@endsection

@section('content')
<div class="d-flex justify-content-end mb-3">
	<a href="{{ route('encuesta.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Atras</a>
</div>
<div class="content-body">
	<div id="accordion">
		@forelse ($inputs as $item)
		    <div class="card">
				<div class="card-header" id="headingOne">
					<a href="#!" class="question-show-title" data-toggle="collapse" data-target="#question-{{ $item->id }}" aria-expanded="true" aria-controls="question-{{ $item->id }}">
						<p class="mb-0"> {{ $item->question }} </p>
					</a>
				</div>

				<div id="question-{{ $item->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body">
						@forelse ($item->responseClient as $rsp)
							<div class="alert alert-secondary mb-1" role="alert">
							  {{ $rsp->response }}
							</div>
						@empty
						    <div class="alert alert-info mb-0" role="alert">
							  Pregunta aún no respondidas
							</div>
						@endforelse
					</div>
				</div>
	  		</div>
		@empty
		    <div class="alert alert-info" role="alert">
			  No hay preguntas para esta encuesta
			</div>
		@endforelse
  	</div>
</div>
@for ($i = 0; $i < count($selects); $i++)
	<div class="content-body">
		<canvas id="myChart{{ $i }}" class="grafico-question"></canvas>
	</div>
@endfor
@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> --}}
<script src="{{ asset('vendors/chart-js/Chart-2.7.3.min.js') }}"></script>
<script>
@for ($j = 0; $j < $i; $j++)
	var ctx{{ $j }} = document.getElementById("myChart{{ $j }}").getContext('2d');
	var myChart = new Chart(ctx{{ $j }}, {
	    type: 'horizontalBar',
	    data: {
	        labels: [@foreach ($selects[$j]->responses as $rsp)
	        			@json($rsp->slideArray($rsp->response)),
	        		@endforeach],
	        datasets: [{
	            label: '{{ $selects[$j]->question }}',
	            data: [@foreach ($selects[$j]->responses as $rsp)
	        			{{ count($rsp->rspClient) }},
	        		@endforeach],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.7)',
	                'rgba(54, 162, 235, 0.7)',
	                'rgba(255, 206, 86, 0.7)',
	                'rgba(75, 192, 192, 0.7)',
	                'rgba(153, 102, 255, 0.7)',
	                'rgba(255, 159, 64, 0.7)',

	                'rgba(140, 19, 6, 0.7)',
	                'rgba(200, 159, 50, 0.7)',
	                'rgba(100, 80, 20, 0.7)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1.3)',
	                'rgba(54, 162, 235, 1.3)',
	                'rgba(255, 206, 86, 1.3)',
	                'rgba(75, 192, 192, 1.3)',
	                'rgba(153, 102, 255, 1.3)',
	                'rgba(255, 159, 64, 1.3)',

	                'rgba(140, 19, 6, 1.3)',
	                'rgba(200, 159, 50, 1.3)',
	                'rgba(100, 80, 20, 1.3)'
	            ],
	            borderWidth: 2
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        },
	        title:{
	        	display: true,
	        	text : "{{ $encuesta->title }}"
	        }
	    }
	});
@endfor
</script>
@endsection
