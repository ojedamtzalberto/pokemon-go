function animar(pokemon_actual, pokemon_anterior, asset) {
	$('<img class="displayed bot" src="'+asset+ '/' + pokemon_anterior +'.png" />').insertAfter('#top-'+pokemon_actual);
	//Oculta valores
	$('.evo-hid').css('display', 'none');	
	$('.bot').css('filter', 'brightness(0)');
	$('.top').css('filter', 'brightness(0) invert(1)');
	$('.top').css('opacity', '0');
	setTimeout(function(){        
        $('.bot').css('filter', 'brightness(0) invert(1)');
    }, 500);
    setTimeout(function(){        
        $('.bot').css('filter', 'brightness(0)');
    }, 1000);
    setTimeout(function(){        
        $('.bot').css('filter', 'brightness(0) invert(1)');
    }, 1500);
    setTimeout(function(){        
        $('.bot').css('filter', 'brightness(0)');
    }, 2000);
    setTimeout(function(){        
        $('.bot').css('filter', 'brightness(0) invert(1)');
    }, 2500);    
	setTimeout(function(){        
        $('.bot').css('opacity', 1);
    }, 3000);
	setTimeout(function(){
        $('.top').css('opacity', 1);
        $('.bot').css('opacity', 0);
    }, 3500);
	setTimeout(function(){
        $('.top').css('opacity', 0);
        $('.bot').css('opacity', 1);
    }, 4000);
	setTimeout(function(){
        $('.top').css('opacity', 1);
        $('.bot').css('opacity', 0);
    }, 4500);
    setTimeout(function(){
    	$('.evo-hid').css('display', 'inline-block');
        $('.top').css('opacity', 1);
        $('.top').css('filter', 'brightness(100%)');
        $('.bot').css('opacity', 0);
        $('.bot').css('filter', 'brightness(100%)');
    }, 5000);
    setTimeout(function(){    	
        $('.top').css('opacity', 1);
        $('.bot').css('opacity', 0);
    }, 5500);
    setTimeout(function(){        
        $('.top').css('opacity', 1);
        $('.bot').css('opacity', 0);
    }, 6000);
    setTimeout(function(){
        $('.bot').remove();        
    }, 6200);
}