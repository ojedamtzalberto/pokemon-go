@extends('inicio')

@section('contenido')	

	@include('tipos')

	@foreach($pokemons as $pokemon)
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">			
			<div class="pokemon-info">
				<a href='javascript:;' onclick="showModal('{{$pokemon}}', '{{$pokemon->tipos}}')">			
					<img src="{{asset('img')}}/{{$pokemon->id}}.png">					
				</a>
				<p class="nombre">{{ $pokemon->nombre }}</p>
				<div class="tipos-container">
					@foreach($pokemon->tipos as $tipo)
						<a href="{{url('/pokedex/tipo')}}/{{strtolower($tipo->id)}}"><span class="tipo {{strtolower($tipo->nombre)}}">{{ $tipo->nombre }}</span></a>
					@endforeach	
				</div>				
			</div>			
		</div>
	@endforeach

	<div class="col-md-4 col-md-offset-4 paginator">
		{!! $pokemons->render() !!}
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
						   
		<div class="modal-dialog">
			<div class="modal-content">
			        
			    <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel"></h4>
			    </div>
				         
			    <div class="modal-body">
			    	<img src="">
			    	<p class="pok-id"></p>
			    	<p class="ataque"></p>		            
			    	<p class="defensa"></p>		            
			    	<p class="stamina"></p>		            
			    	<p class="caramelos"></p>
			    	<p class="tipos"></p>					    	         
			    </div>
				         
			    <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Dar poder</button>
				            
			        <a href="" class="btn btn-primary">PDF</a>
				</div>
				         
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
						  
	</div><!-- /.modal -->
@stop