@extends('inicio')

@section('contenido')
	<div class="col-md-6 col-md-offset-3">
		<form method="POST" action="{{url('/login-success')}}" class="form-horizontal">
		{{ csrf_field() }}
		  <fieldset>
		    <legend>Inicia Sesión</legend>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputEmail" name="email" placeholder="Email" type="text">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputPassword" name="pwd" placeholder="Password" type="password">
		        <div class="checkbox">
		          <label>
		            <input type="checkbox"> Checkbox
		          </label>
		        </div>
		      </div>
		    </div>		    
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="submit" class="btn btn-primary">Submit</button>
		        <button type="reset" class="btn btn-default">Cancel</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
	</div>
@stop