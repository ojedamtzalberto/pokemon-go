<!DOCTYPE html>
  <html>
    <head>
    <style type="text/css">
    @font-face {
      font-family: 'Munro';
      font-style: normal;
        font-weight: 400;
      src: url('{{asset('fonts/Munro.ttf')}}') format('truetype');      
    }

    body,th,td {
      font-family: 'Munro';
      font-size: 20px;
    }
      .imgfix{
      top:-45px;
      left:-45px;
      max-height: 1060px;
      z-index: -2;

    }
    .abfix{
      position: absolute;
    }
    .pokefix{
      top:275px;
      left:450px;
    }
    .textfix{
      color:white;
      top:100px;
      left: 150px;
    }
    .capitalize {
      text-transform: capitalize;
    }
  </style>   
  <?php    
    $idzero = $value = sprintf( '%03d', $pokemon->pokemon_id);
   ?>  
      <title>{{$pokemon->pokemanz->nombre}}</title>
     
    </head>
      <body>   
        <div>
          <img class="displayed abfix pokefix" src="{{$pokemon->pokemanz->imagen}}" alt="" />
        </div>
              
        <table class="table table-hover abfix textfix">
          <thead>
            <tr>
              <td align="left" >#{{$idzero}}</td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td class="capitalize">{{$pokemon->pokemanz->nombre}}</td>
            </tr>
            <tr>
              <td align="left" >Tipo:</td>
              <td>
                @foreach($pokemon->pokemanz->tipos as $tipo)                   
                  <span class="color{{$tipo->nombre}} label">{{$tipo->nombre}}</span>
                @endforeach                                                        
              </td>
            </tr>
            <tr>
              <td align="left" >CP:</td>
              <td>{{$pokemon->cp}}</td>
            </tr>
            <tr>
              <td align="left" >Ataque:</td>
              <td>{{ (int)(($pokemon->pokemanz->ataque_base + $pokemon->ataque_individual) * $pokemon->cp_mult) }}</td>
            </tr>
            <tr> 
              <td>Defensa:</td>
              <td>{{ (int)(($pokemon->pokemanz->defensa_base + $pokemon->defensa_individual) * $pokemon->cp_mult) }}</td>
            </tr>
            <tr>
            <td>Stamina:</td>
               <td>{{ (int)(($pokemon->pokemanz->stamina_base + $pokemon->stamina_individual) * $pokemon->cp_mult) }}</td>
            </tr>                      
          </thead>                  
        </table> 
        <img class="imgfix abfix" src="{{asset('img/fondo_pdf.jpg')}}"/>
      </body>
</html>