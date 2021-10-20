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


<div class="container p-3 my-3 bg-white text-white">

<center><h1>Lista Programa</h1></center>


<button type="button" class="btn btn-primary"><a style=" color: white;"  href="{{url('programas/create')}}">+</a></button>



<table class="table table-striped">
    <thead>
        <th>Nombres</th>
        <th>Nivel</th>
    </thead>
    <tbody>
        @foreach ($programas as $programa)
            <tr>

                <td style="padding-right:20px;">
                   {{$programa->Nombre}}
                </td>
                <td>
                    {{$programa->Nivel}}
                </td>
                <td>
                    @switch($programa->Estado)
                        @case('Activo')
                            <a href="{{    url('programas/habilitar/'.$programa->IdPrograma)    }}" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Activo</a>
                            @break
                        @case('Inactivo')
                            <a href="{{    url('programas/habilitar/'.$programa->IdPrograma)    }}" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Inactivo</a>
                            @break
                        @default
                            <a href="{{    url('programas/habilitar/'.$programa->IdPrograma)    }}" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-question-sign"></span> Sin estado</a>
                    @endswitch
                </td>
                <td>
                    <form action="{{url('programas/'.$programa->IdPrograma)}}">
                        <button class="btn btn-inverse"><img width="20px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik01MDguMTc3LDI0NS45OTVDNTAzLjYwNywyNDAuODk3LDM5My42ODIsMTIxLDI1NiwxMjFTOC4zOTQsMjQwLjg5NywzLjgyMywyNDUuOTk1Yy01LjA5OCw1LjY5OC01LjA5OCwxNC4zMTIsMCwyMC4wMQ0KCQkJQzguMzk0LDI3MS4xMDMsMTE4LjMyLDM5MSwyNTYsMzkxczI0Ny42MDYtMTE5Ljg5NywyNTIuMTc3LTEyNC45OTVDNTEzLjI3NCwyNjAuMzA3LDUxMy4yNzQsMjUxLjY5Myw1MDguMTc3LDI0NS45OTV6IE0yNTYsMzYxDQoJCQljLTU3Ljg5MSwwLTEwNS00Ny4xMDktMTA1LTEwNXM0Ny4xMDktMTA1LDEwNS0xMDVzMTA1LDQ3LjEwOSwxMDUsMTA1UzMxMy44OTEsMzYxLDI1NiwzNjF6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0yNzEsMjI2YzAtMTUuMDksNy40OTEtMjguMzY1LDE4Ljg4Ny0zNi41M0MyNzkuNjYxLDE4NC4yMzUsMjY4LjI1NSwxODEsMjU2LDE4MWMtNDEuMzUzLDAtNzUsMzMuNjQ3LTc1LDc1DQoJCQljMCw0MS4zNTMsMzMuNjQ3LDc1LDc1LDc1YzM3LjAyNCwwLDY3LjY2OC0yNy4wMzQsNzMuNzIyLTYyLjM1OEMyOTkuNTE2LDI3OC4zNjcsMjcxLDI1NS41MjIsMjcxLDIyNnoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" /></button>
                    </form>
                </td>
                <td>
                    <form action="{{url('programas/'.$programa->IdPrograma.'/edit')}}">
                        <button class="btn btn-inverse"><img width="20px" src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMnB0IiB2aWV3Qm94PSIwIDAgNTEyIDUxMSIgd2lkdGg9IjUxMnB0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im00MDUuMzMyMDMxIDI1Ni40ODQzNzVjLTExLjc5Njg3NSAwLTIxLjMzMjAzMSA5LjU1ODU5NC0yMS4zMzIwMzEgMjEuMzMyMDMxdjE3MC42Njc5NjljMCAxMS43NTM5MDYtOS41NTg1OTQgMjEuMzMyMDMxLTIxLjMzMjAzMSAyMS4zMzIwMzFoLTI5OC42Njc5NjljLTExLjc3NzM0NCAwLTIxLjMzMjAzMS05LjU3ODEyNS0yMS4zMzIwMzEtMjEuMzMyMDMxdi0yOTguNjY3OTY5YzAtMTEuNzUzOTA2IDkuNTU0Njg3LTIxLjMzMjAzMSAyMS4zMzIwMzEtMjEuMzMyMDMxaDE3MC42Njc5NjljMTEuNzk2ODc1IDAgMjEuMzMyMDMxLTkuNTU4NTk0IDIxLjMzMjAzMS0yMS4zMzIwMzEgMC0xMS43NzczNDQtOS41MzUxNTYtMjEuMzM1OTM4LTIxLjMzMjAzMS0yMS4zMzU5MzhoLTE3MC42Njc5NjljLTM1LjI4NTE1NiAwLTY0IDI4LjcxNDg0NC02NCA2NHYyOTguNjY3OTY5YzAgMzUuMjg1MTU2IDI4LjcxNDg0NCA2NCA2NCA2NGgyOTguNjY3OTY5YzM1LjI4NTE1NiAwIDY0LTI4LjcxNDg0NCA2NC02NHYtMTcwLjY2Nzk2OWMwLTExLjc5Njg3NS05LjUzOTA2My0yMS4zMzIwMzEtMjEuMzM1OTM4LTIxLjMzMjAzMXptMCAwIi8+PHBhdGggZD0ibTIwMC4wMTk1MzEgMjM3LjA1MDc4MWMtMS40OTIxODcgMS40OTIxODgtMi40OTYwOTMgMy4zOTA2MjUtMi45MjE4NzUgNS40Mzc1bC0xNS4wODIwMzEgNzUuNDM3NWMtLjcwMzEyNSAzLjQ5NjA5NC40MDYyNSA3LjEwMTU2MyAyLjkyMTg3NSA5LjY0MDYyNSAyLjAyNzM0NCAyLjAyNzM0NCA0Ljc1NzgxMiAzLjExMzI4MiA3LjU1NDY4OCAzLjExMzI4Mi42Nzk2ODcgMCAxLjM4NjcxOC0uMDYyNSAyLjA4OTg0My0uMjEwOTM4bDc1LjQxNDA2My0xNS4wODIwMzFjMi4wODk4NDQtLjQyOTY4OCAzLjk4ODI4MS0xLjQyOTY4OCA1LjQ2MDkzNy0yLjkyNTc4MWwxNjguNzg5MDYzLTE2OC43ODkwNjMtNzUuNDE0MDYzLTc1LjQxMDE1NnptMCAwIi8+PHBhdGggZD0ibTQ5Ni4zODI4MTIgMTYuMTAxNTYyYy0yMC43OTY4NzQtMjAuODAwNzgxLTU0LjYzMjgxMi0yMC44MDA3ODEtNzUuNDE0MDYyIDBsLTI5LjUyMzQzOCAyOS41MjM0MzggNzUuNDE0MDYzIDc1LjQxNDA2MiAyOS41MjM0MzctMjkuNTI3MzQzYzEwLjA3MDMxMy0xMC4wNDY4NzUgMTUuNjE3MTg4LTIzLjQ0NTMxMyAxNS42MTcxODgtMzcuNjk1MzEzcy01LjU0Njg3NS0yNy42NDg0MzctMTUuNjE3MTg4LTM3LjcxNDg0NHptMCAwIi8+PC9zdmc+" /></button>
                     </form>
                </td>
                <td>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!--{{$programas->links()}}-->
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
			<a href="{{ url('instructor') }}">instructores</a>
            <a href="{{ url('programas') }}">programas</a>
            <a href="{{ url('reunionAprendiz') }}">Reuniones</a>
            <a href="{{ url('Landing') }}">Landing</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>


</body>
</html>




