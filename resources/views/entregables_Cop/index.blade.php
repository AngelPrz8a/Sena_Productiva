<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat|Montserrat+Alternates|Poppins&display=swap');
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Montserrat Alternates', sans-serif;
	}
	body{
		background: url(https://www.xtrafondos.com/wallpapers/montanas-con-nieve-en-el-bosque-3934.jpg);
		background-size: 100vw 100vh;
		background-repeat: no-repeat;
	}
	.capa{
		position: fixed;
		width: 100%;
		height: 100vh;
		background: rgba(0,0,0,0.6);
		z-index: -1;
		top: 0;left: 0;
	}
	/*Estilos para el encabezado*/
	.header{
		width: 100%;
		height: 100px;
		position: fixed;
		top: 0;left: 0;
	}
	.container{
		width: 90%;
		max-width: 1200px;
		margin: auto;
	}
	.container .btn-menu, .logo{
		float: left;
		line-height:100px;
	}
	.container .btn-menu label{
		color: #fff;
		font-size: 25px;
		cursor: pointer;
	}
	 h1{
		color: black;
		font-weight: 400;
		font-size: 40px;
		margin-left: 10px;
	}
	.container .menu{
		float: right;
		line-height: 100px;
	}
	.container .menu a{
		display: inline-block;
		padding: 15px;
		line-height: normal;
		text-decoration: none;
		color: #fff;
		transition: all 0.3s ease;
		border-bottom: 2px solid transparent;
		font-size: 15px;
		margin-right: 5px;
	}
	.container .menu a:hover{
		border-bottom: 2px solid #c7c7c7;
		padding-bottom: 5px;
	}
	/*Fin de Estilos para el encabezado*/

	/*Menù lateral*/
	#btn-menu{
		display: none;
	}
	.container-menu{
		position: absolute;
		background: rgba(0,0,0,0.5);
		width: 100%;
		height: 100vh;
		top: 0;left: 0;
		transition: all 500ms ease;
		opacity: 0;
		visibility: hidden;
	}
	#btn-menu:checked ~ .container-menu{
		opacity: 1;
		visibility: visible;
	}
	.cont-menu{
		width: 100%;
		max-width: 250px;
		background: #1c1c1c;
		height: 100vh;
		position: relative;
		transition: all 500ms ease;
		transform: translateX(-100%);
	}
	#btn-menu:checked ~ .container-menu .cont-menu{
		transform: translateX(0%);
	}
	.cont-menu nav{
		transform: translateY(15%);
	}
	.cont-menu nav a{
		display: block;
		text-decoration: none;
		padding: 20px;
		color: #c7c7c7;
		border-left: 5px solid transparent;
		transition: all 400ms ease;
	}
	.cont-menu nav a:hover{
		border-left: 5px solid #c7c7c7;
		background: #1f1f1f;
	}
	.cont-menu label{
		position: absolute;
		right: 5px;
		top: 10px;
		color: #fff;
		cursor: pointer;
		font-size: 18px;
	}
</style>
    <title>Usuarios</title>
</head>
<body>


<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>

<!-- ///////////////////////////////////// -->


<div class ="container p-3 my-3 bg-white text-white">

<center><h1>Lista de Entregables</h1></center>

@if(Session::has('mensaje'))
 <div class="alert alert-warning alert-dismissible" role="alert">
{{ session::get('msg')}}

 <button type="button" class="close" data-dismiss="alert" aria-label="close">
     <span aria-hidden="true">&times;</span>
 </button>
</div>
@endif


<a type="submit" class=" btn btn-success" href="{{url('entregables/create')}}" >Nuevo Entregable</a>


<table class="table table-striped">
    <thead>
        <th>Titulo</th>
        <th>Descripción</th>
        <th>Fecha Inicial</th>
        <th>Fecha Final</th>
        <th>Hora Inicial</th>
        <th>Hora Entrega</th>
        <th>Acta</th>
        <th>Estado</th>
        <th>Instructor</th>
        <th>Ver</th>
        <th>Editar</th>
        <th>Estado</th>

    </thead>
    <tbody>
        @foreach ($entregables as $entregable)
            <tr>
                <td style="padding-right:20px;">
                    {{$entregable->Titulo}}
                </td>
                <td>
                    {{$entregable->Descripcion}}
                </td>
                <td>
                    {{$entregable->FechaInicial}}
                </td>
                <td>
                    {{$entregable->FechaFinal}}
                </td>
                <td>
                    {{$entregable->HoraInicial}}
                </td>
                <td>
                    {{$entregable->HoraEntrega}}
                </td>
                <td>
                    {{$entregable->Acta}}
                </td>
                <td>
                    {{$entregable->Estado}}
                </td>
                <td>
                    @foreach ($entregable->instructor()->get() as $instructor)
                        @foreach ($instructor->usuarios()->get() as $i)
                            {{$i->Nombre}} {{$i->Apellido}}
                        @endforeach
                    @endforeach
                </td>
                <td>
                    <a href="{{url('entregables/'.$entregable->IdEntregables)}}" >Show</a>
                </td>
                <td>
                    <a href="{{url('entregables/'.$entregable->IdEntregables.'/edit')}}" >Edit</a>
                </td>

                <td>

                    @switch($entregable->Estado)
                        @case('Activo')
                           <a type="submit" href="{{ url('entregables/habilitar/' .$entregable->IdEntregables ) }}" class="btn btn-primary btn-sm">Inhabilitar</a>

                            @break

                         @case('Inactivo')
                            <a type="submit" href="{{ url('entregables/habilitar/' .$entregable->IdEntregables ) }}" class="btn btn-success btn-sm">Habilitar</a>

                             @break


                        @default
                    <a href="{{ url('entregables/habilitar/' .$entregable->IdEntregables ) }}">Sin Estado</a>

                    @endswitch
                </td>



            </tr>
        @endforeach
    </tbody>
</table>
{{$entregables->links()}}

</div>




<!-- ///////////////////////////////////// -->



		</div>
	</header>
	<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="{{ url('usuarios') }}">Usuarios</a>
			<a href="{{ url('aprendices') }}">Aprendices</a>
			<a href="{{ url('fichas') }}">Fichas</a>
			<a href="{{ url('centros') }}">Centros</a>
			<a href="{{ url('entregables') }}">Entregables</a>
			<a href="{{ url('instruct') }}">instructores</a>
            <a href="{{ url('programas') }}">programas</a>
            <a href="{{ url('reunionAprendiz') }}">Reuniones</a>
            <a href="{{ url('Landing') }}">Landing</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>




</body>
</html>





