@extends('inicio')

@section('contenido')	
	@include('tipos')
	@foreach($pokemons as $po)
		<div class="contenedor" >
            <div class="col-md-3 pokefondo" data-toggle="modal" data-target="#{{$po->id}}">
                <img  class="displayed" src="{{asset('img')}}/{{$po->id}}.png">
                <img  class="bot-fix" src="{{asset('img/1_m.png')}}">
                <?php
                  $capname =ucfirst("$po->nombre");
                  $idzero = $value = sprintf( '%03d', $po->id);
                ?>  
                <li class="textfixnum">#{{$idzero}}</li>
                <li class="textfixname">{{$capname}}</li>
                 @foreach($po->tipos as $tipo)                   
                  <span class="color{{$tipo->nombre}} label sizelabel">{{$tipo->nombre}}</span>
                 @endforeach
            </div>  
          </div>  
          <div class="modal fade " id="{{$po->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-g" role="document">
              <div class="modal-content">
                <div class="modal-header modal-h">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                
                  <h5 class="textbold"><span class="badge">#{{$idzero}}</span> {{$capname}} </h5>
                </div>
                <div class="modal-body modal-b">
                  <div >
                    <img class="displayed" src="{{asset('img')}}/{{$po->id}}.png" alt="" />
                  </div>
                </div>
                 
                  <table class="table table-hover">
                      <thead>
                        <tr  class="active">
                          <th class="centertext">Tipo:
                              @foreach($po->tipos as $tipo)                   
                                <span class="color{{$tipo->nombre}} label">{{$tipo->nombre}}</span>
                              @endforeach     
                          </th>

                        </tr>
                      </thead>                      
                  </table> 
                  <?php
                      $att =$po->ataque_base/16;
                      $def =$po->defensa_base/16;
                      $sta =$po->stamina_base/16;
                  ?>
                 <table class="table table-hover bor cellspacing="0" cellpadding="0"">
                  <tbody>
                    <tr>
                      <td class="table-nom noBorder">Ataque</td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar progress-bar-warning" style="width: {{$att}}%"></div>
                        </div>                                              
                      </td>
                    </tr>
                    <tr>
                      <td class="table-nom noBorder">Defensa</td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar progress-bar-warning" style="width: {{$def}}%"></div>
                        </div>                                              
                      </td>
                    </tr>
                    <tr>
                      <td class="table-nom noBorder">Stamina</td>
                      <td>
                        <div class="progress">
                          <div class="progress-bar progress-bar-warning" style="width: {{$sta}}%"></div>
                        </div>                                              
                      </td>
                    </tr>
                  </tbody>
                </table>                  
                                      
                <div class="modal-footer modal-f">
                   <a href="/pokemon-go/public/pdf/{{$po->id}}" class="btn  btn-default ">PDF</a>
                </div>
              </div>
            </div>
          </div>    



	@endforeach


@stop