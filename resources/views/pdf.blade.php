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
  </style>   
  <?php
    $capname =ucfirst("$pokemon->nombre");
    $idzero = $value = sprintf( '%03d', $pokemon->id);
   ?>  
      <title>{{$capname}}</title>
     
    </head>
      <body>   
        <div>
          <img class="displayed abfix pokefix" src="{{$pokemon->imagen}}" alt="" />
        </div>
              
        <table class="table table-hover abfix textfix">
          <thead>
            <tr>
              <td align="left" >#{{$idzero}}</td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td>{{$capname}}</td>
            </tr>
            <tr>
              <td align="left" >Tipo:</td>
              <td>
                @foreach($pokemon->tipos as $tipo)                   
                  <span class="color{{$tipo->nombre}} label">{{$tipo->nombre}}</span>
                @endforeach                                                        
              </td>
            </tr>
            <tr>
              <td align="left" >Ataque:</td>
              <td>{{$pokemon->ataque_base}}</td>
             </tr>
             <tr> 
              <td>Defensa:</td>
              <td>{{$pokemon->defensa_base}}</td>
            </tr>
            <tr>
            <td>Stamina:</td>
               <td>{{$pokemon->stamina_base}}</td>
            </tr>                      
          </thead>                  
        </table> 
        <img class="imgfix abfix" src="{{asset('img/fondo_pdf.jpg')}}"/>
      </body>
</html>