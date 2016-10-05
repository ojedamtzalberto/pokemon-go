function showModal(pokemon, tipos) 
{
	var pokejson = JSON.parse(pokemon);
	var tipojson = JSON.parse(tipos);
	
	$("#myModal .modal-title").html(pokejson.nombre);
	$("#myModal img").attr('src', pokejson.imagen)
	$("#myModal .pok-id").html('No. Pokedex: ' + pokejson.id);
	$("#myModal .ataque").html('Ataque: ' + pokejson.ataque_base);
	$("#myModal .defensa").html('Defensa: ' + pokejson.defensa_base);
	$("#myModal .stamina").html('Stamina: ' + pokejson.stamina_base);
	$("#myModal .caramelos").html('Caramelos: ' + pokejson.caramelos_evolucion);
	$("#myModal .tipos").html('Tipo: '); 

	for (i = 0; i < tipojson.length; ++i) 
	{
		$("#myModal .tipos").append(tipojson[i].nombre);
		if(i < tipojson.length -1)
			$("#myModal .tipos").append(', ');
	}		
	
	$("#myModal").modal();
}