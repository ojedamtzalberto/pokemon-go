<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		@font-face {
		  font-family: 'Munro';
		  font-style: normal;
  		  font-weight: 400;
		  src: url('{{asset('fonts/Munro.ttf')}}') format('truetype');		  
		}

		h1 {
			font-family: 'Munro';
		}

		body {
			font-family: 'Munro';
			font-size: 20px;
		}
	</style>
</head>
<body>
	<h1>{{$pokemon->nombre}}</h1>
	<img src="{{asset('img')}}/{{$pokemon->id}}.png" alt="">
	<p>PELAS</p>
</body>
</html>