<div class="tipos-no-oculto">	
	<div id="tipo-lista">
		<ul>			
			@foreach($tipos as $tipo)				
				<a href="{{url('/pokedex/tipo')}}/{{$tipo->id}}"><li class="tipo-lista">{{$tipo->nombre}}</li></a>
			@endforeach
		</ul>
	</div>
	<div id="tipo-icono">
		<img src="{{ asset('img/pokedex.png')}}" alt="">					
	</div>								
</div>