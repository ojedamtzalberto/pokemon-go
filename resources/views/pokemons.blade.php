@extends('inicio')
  @section('contenido')     
    @include('tipos_owned_pokemon')
      @foreach($pokemons as $po)
        <div class="col-md-3 pokefondo" data-toggle="modal" data-target="#{{$po->owned_id}}">
            <img  class="displayed" src="{{asset('img')}}/{{$po->pokemanz->id}}.png">
            <img  class="bot-fix" src="{{asset('img/1_m.png')}}">
            <?php              
              $idzero = $value = sprintf( '%03d', $po->pokemanz->id);
            ?>  
            <li class="textfixnum">#{{$idzero}}</li>
            <li class="textfixname">{{$po->pokemanz->nombre}}</li>
             @foreach($po->pokemanz->tipos as $tipo)                   
              <span class="color{{$tipo->nombre}} label sizelabel">{{$tipo->nombre}}</span>
             @endforeach
        </div>  
          <div class="modal fade " id="{{$po->owned_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-g" role="document">
              <div class="modal-content">
                <div class="modal-header modal-h">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                
                  <h5 class="textbold"><span class="badge">#{{$idzero}}</span><span> {{$po->pokemanz->nombre}}</span> nivel {{$po->nivel}}</h5>
                  <h5 class="textcp"><span>CP</span></h5>
                  <h5 class="numcp"><span>{{$po->cp}}</span></h5>
                </div>
                <div class="modal-body modal-b">
                  <div >
                    <img class="displayed" src="{{asset('img')}}/{{$po->pokemanz->id}}.png" alt="" />
                  </div>
                </div>
                 
                  <table class="table table-hover">
                      <thead>
                        <tr  class="active">
                          <th class="centertext">Tipo:
                              @foreach($po->pokemanz->tipos as $tipo)                   
                                <span class="color{{$tipo->nombre}} label">{{$tipo->nombre}}</span>
                              @endforeach     
                          </th>

                        </tr>
                      </thead>                      
                  </table> 
                  <?php
                      $att_actual = ($po->pokemanz->ataque_base + $po->ataque_individual) * $po->cp_mult; 
                      $att_max = ($po->pokemanz->ataque_base + 15) * 0.79030001; 
                      $att = ($att_actual / $att_max) * 100;                      

                      $def_actual = ($po->pokemanz->defensa_base + $po->defensa_individual) * $po->cp_mult; 
                      $def_max = ($po->pokemanz->defensa_base + 15) * 0.79030001; 
                      $def = ($def_actual / $def_max) * 100;

                      $sta_actual = ($po->pokemanz->stamina_base + $po->stamina_individual) * $po->cp_mult; 
                      $sta_max = ($po->pokemanz->stamina_base + 15) * 0.79030001; 
                      $sta = ($sta_actual / $sta_max) * 100;
                  ?>
                 <table class="table table-hover bor cellspacing="0" cellpadding="0"">
                  <tbody>
                    <tr>
                      <td class="table-nom noBorder">Ataque</td>
                      <td>
                      <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$att}}%;">
                          <span class="show">{{(int)$att_actual}} / {{(int)$att_max}}</span>
                        </div>
                      </div>                                                           
                      </td>
                    </tr>
                    <tr>
                      <td class="table-nom noBorder">Defensa</td>
                      <td>
                      <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$def}}%;">
                          <span class="show">{{(int)$def_actual}} / {{(int)$def_max}}</span>
                        </div>
                      </div>                                               
                      </td>
                    </tr>
                    <tr>
                      <td class="table-nom noBorder">Stamina</td>
                      <td>
                      <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$sta}}%;">
                          <span class="show">{{(int)$sta_actual}} / {{(int)$sta_max}}</span>
                        </div>
                      </div>                                             
                      </td>
                    </tr>
                  </tbody>
                </table>           

                <table class="table table-hover bor cellspacing="0" cellpadding="0"">
                  <tbody>
                    <tr class="starcar">
                      <td class="stardust">
                        <img class="stardustimg" src="{{asset('img/candy')}}/sd.png" alt="" />                                        
                      </td>
                      <td class="table-nom noBorder numstar">{{$trainer->polvos}}</td>
                      <td>
                      <td class="stardust">
                        <img class="stardustimg" src="{{asset('img/candy')}}/{{$po->pokemon_id}}.png" alt="" />                                        
                      </td>                                                                        
                      </td>
                      <td class="table-nom noBorder numstar">{{$po->caramelos_modelo['cantidad']}}</td>
                    </tr>    
                                                      
                  </tbody>
                </table> 

                <div class="powerup">                                    
                  <form action="{{url('/pokemon/powerup')}}" method="POST">
                  {{ csrf_field() }}
                    <input type="hidden" name="owned_id" value="{{$po->owned_id}}">
                    <input type="hidden" name="pokemon_id" value="{{$po->pokemon_id}}">
                    <input class="btn btn-default powerb" type="submit" value="PowerUp" onclick="return confirm('Estas seguro?')">
                    <img class="stardustimgb" src="{{asset('img/candy')}}/sd.png" alt="" />
                    {{$po->polvos}}
                    <img class="stardustimgb" src="{{asset('img/candy')}}/{{$po->pokemon_id}}.png" alt="" />
                    {{$po->caramelos}}
                  </form>                  
                </div>        
                                      
                <div class="modal-footer modal-f">
                  <a href="/pokemon-go/public/pdf_owned/{{$po->owned_id}}" class="btn btn-default" target="_blank">PDF</a>                  
                </div>
              </div>
            </div>
          </div>    

  @endforeach

@stop

@section('scripts')
  @if(!empty(Session::get('id')))
    <script>        
        $(document).ready(function(){
            $('#{{Session::get('id')}}').modal('show');
        });
    </script>
  @endif
  @if(!empty(Session::get('error')))
    <script>        
        $(document).ready(function(){
            $('#{{Session::get('id')}}').modal('show'); 
            setTimeout(function(){
                alert("No tienes suficientes {{Session::get('error')}}");
            }, 200);
        });
    </script>
  @endif
@stop