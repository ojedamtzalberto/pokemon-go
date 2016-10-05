<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">   
    <title>Pokemon Go</title>
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/pokemon-go/public/">Pokédex</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form method="GET" action="{{url('/pokedex/pokemon')}}" class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input list="search-pokemon" class="form-control" placeholder="Pikachu" type="text" name="pokemon" autocomplete="off">
              <datalist id="search-pokemon">                              
                </option><option value="bulbasaur">
                </option><option value="ivysaur">
                </option><option value="venusaur">
                </option><option value="charmander">
                </option><option value="charmeleon">
                </option><option value="charizard">
                </option><option value="squirtle">
                </option><option value="wartortle">
                </option><option value="blastoise">
                </option><option value="caterpie">
                </option><option value="metapod">
                </option><option value="butterfree">
                </option><option value="weedle">
                </option><option value="kakuna">
                </option><option value="beedrill">
                </option><option value="pidgey">
                </option><option value="pidgeotto">
                </option><option value="pidgeot">
                </option><option value="rattata">
                </option><option value="raticate">
                </option><option value="spearow">
                </option><option value="fearow">
                </option><option value="ekans">
                </option><option value="arbok">
                </option><option value="pikachu">
                </option><option value="raichu">
                </option><option value="sandshrew">
                </option><option value="sandslash">
                </option><option value="nidoran-1">
                </option><option value="nidorina">
                </option><option value="nidoqueen">
                </option><option value="nidoran">
                </option><option value="nidorino">
                </option><option value="nidoking">
                </option><option value="clefairy">
                </option><option value="clefable">
                </option><option value="vulpix">
                </option><option value="ninetales">
                </option><option value="jigglypuff">
                </option><option value="wigglytuff">
                </option><option value="zubat">
                </option><option value="golbat">
                </option><option value="oddish">
                </option><option value="gloom">
                </option><option value="vileplume">
                </option><option value="paras">
                </option><option value="parasect">
                </option><option value="venonat">
                </option><option value="venomoth">
                </option><option value="diglett">
                </option><option value="dugtrio">
                </option><option value="meowth">
                </option><option value="persian">
                </option><option value="psyduck">
                </option><option value="golduck">
                </option><option value="mankey">
                </option><option value="primeape">
                </option><option value="growlithe">
                </option><option value="arcanine">
                </option><option value="poliwag">
                </option><option value="poliwhirl">
                </option><option value="poliwrath">
                </option><option value="abra">
                </option><option value="kadabra">
                </option><option value="alakazam">
                </option><option value="machop">
                </option><option value="machoke">
                </option><option value="machamp">
                </option><option value="bellsprout">
                </option><option value="weepinbell">
                </option><option value="victreebel">
                </option><option value="tentacool">
                </option><option value="tentacruel">
                </option><option value="geodude">
                </option><option value="graveler">
                </option><option value="golem">
                </option><option value="ponyta">
                </option><option value="rapidash">
                </option><option value="slowpoke">
                </option><option value="slowbro">
                </option><option value="magnemite">
                </option><option value="magneton">
                </option><option value="farfetchd">
                </option><option value="doduo">
                </option><option value="dodrio">
                </option><option value="seel">
                </option><option value="dewgong">
                </option><option value="grimer">
                </option><option value="muk">
                </option><option value="shellder">
                </option><option value="cloyster">
                </option><option value="gastly">
                </option><option value="haunter">
                </option><option value="gengar">
                </option><option value="onix">
                </option><option value="drowzee">
                </option><option value="hypno">
                </option><option value="krabby">
                </option><option value="kingler">
                </option><option value="voltorb">
                </option><option value="electrode">
                </option><option value="exeggcute">
                </option><option value="exeggutor">
                </option><option value="cubone">
                </option><option value="marowak">
                </option><option value="hitmonlee">
                </option><option value="hitmonchan">
                </option><option value="lickitung">
                </option><option value="koffing">
                </option><option value="weezing">
                </option><option value="rhyhorn">
                </option><option value="rhydon">
                </option><option value="chansey">
                </option><option value="tangela">
                </option><option value="kangaskhan">
                </option><option value="horsea">
                </option><option value="seadra">
                </option><option value="goldeen">
                </option><option value="seaking">
                </option><option value="staryu">
                </option><option value="starmie">
                </option><option value="mr-mime">
                </option><option value="scyther">
                </option><option value="jynx">
                </option><option value="electabuzz">
                </option><option value="magmar">
                </option><option value="pinsir">
                </option><option value="tauros">
                </option><option value="magikarp">
                </option><option value="gyarados">
                </option><option value="lapras">
                </option><option value="ditto">
                </option><option value="eevee">
                </option><option value="vaporeon">
                </option><option value="jolteon">
                </option><option value="flareon">
                </option><option value="porygon">
                </option><option value="omanyte">
                </option><option value="omastar">
                </option><option value="kabuto">
                </option><option value="kabutops">
                </option><option value="aerodactyl">
                </option><option value="snorlax">
                </option><option value="articuno">
                </option><option value="zapdos">
                </option><option value="moltres">
                </option><option value="dratini">
                </option><option value="dragonair">
                </option><option value="dragonite">
                </option><option value="mewtwo">
                </option><option value="mew">                              
              </datalist>
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
        @yield('contenido')
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/eventos.js')}}"></script>
</body>
</html>