@extends('plantilla.plantilla')

@section('contenido')

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <center><h1 class="card-title">Usuarios</h1></center>
                                <div class="table-responsive">


									<table style="margin-top:1rem;" id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr
											style="
                                            background:#ffb880;
											aling-text:center;
                                            color:white;
											"
											>
                                                <th ">Nombre</th>
                                                <th>Apellido</th>
                                                <th>Genero</th>
                                                <th>Email-Sena</th>
                                                <th>Estado</th>
                                                <th>Rol</th>
                                                <th>Ver</th>
                                                <th>Editar</th>
												<th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $usuario)
                                                <tr>

                                                    <td style="padding-right:20px;">
                                                       {{$usuario->Nombre}}
                                                    </td>
                                                    <td>
                                                        {{$usuario->Apellido}}
                                                    </td>

                                                    <td>

                                                        @switch($usuario->Genero)
                                                            @case('M')
                                                                <img width="18px"  src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNDIzLjE4NCA0MjMuMTg0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0MjMuMTg0IDQyMy4xODQ7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxwYXRoIHN0eWxlPSJmaWxsOiMwMEJCRDM7IiBkPSJNNDA3LjUxLDBIMjY2Ljk3MWMtOC44ODIsMC0xNS42NzMsNi43OTItMTUuNjczLDE1LjY3M3M2Ljc5MiwxNS42NzMsMTUuNjczLDE1LjY3M2gxMDIuOTIyDQoJTDI2NC44ODIsMTM2LjM1OWMtMjguMjEyLTIyLjk4OC02My43MzktMzcuMDk0LTEwMi45MjItMzcuMDk0QzcyLjYyLDk5LjI2NSwwLDE3MS44ODYsMCwyNjEuMjI0czcyLjYyLDE2MS45NTksMTYxLjk1OSwxNjEuOTU5DQoJczE2MS45NTktNzIuNjIsMTYxLjk1OS0xNjEuOTU5YzAtMzkuMTg0LTE0LjEwNi03NC43MS0zNy4wOTQtMTAyLjkyMkwzOTEuODM3LDUzLjI5djEwMi45MjJjMCw4Ljg4Miw2Ljc5MiwxNS42NzMsMTUuNjczLDE1LjY3Mw0KCXMxNS42NzMtNi43OTIsMTUuNjczLTE1LjY3M1YxNS42NzNDNDIzLjE4NCw2Ljc5Miw0MTYuMzkyLDAsNDA3LjUxLDB6IE0xNjEuOTU5LDM5MS44MzdjLTcyLjA5OCwwLTEzMC42MTItNTguNTE0LTEzMC42MTItMTMwLjYxMg0KCXM1OC41MTQtMTMwLjYxMiwxMzAuNjEyLTEzMC42MTJzMTMwLjYxMiw1OC41MTQsMTMwLjYxMiwxMzAuNjEyUzIzNC4wNTcsMzkxLjgzNywxNjEuOTU5LDM5MS44Mzd6Ii8+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" />                            @break
                                                            @case('F')
                                                                <img width="20px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHBhdGggc3R5bGU9ImZpbGw6I0Q2M0Q3NjsiIGQ9Ik0zMTguODQxLDQwMi44MDFoLTMwLjkwNXY0Ni4zNThoMzAuOTA1YzEyLjgwMSwwLDIzLjE3OS0xMC4zNzgsMjMuMTc5LTIzLjE3OQ0KCVMzMzEuNjQyLDQwMi44MDEsMzE4Ljg0MSw0MDIuODAxeiIvPg0KPHBhdGggc3R5bGU9ImZpbGw6I0ZGNDE4MTsiIGQ9Ik00MjUuOTgsMTY5Ljk4QzQyNS45OCw3Ni4xMDMsMzQ5Ljg3NywwLDI1NiwwUzg2LjAyLDc2LjEwMyw4Ni4wMiwxNjkuOTgNCgljMCw4Ni4wMTQsNjMuODkxLDE1Ny4wOTMsMTQ2LjgwMSwxNjguNDAxdjY0LjQyaC0zOS42NjJjLTEyLjgwMSwwLTIzLjE3OSwxMC4zNzgtMjMuMTc5LDIzLjE3OXMxMC4zNzgsMjMuMTc5LDIzLjE3OSwyMy4xNzloMzkuNjYyDQoJdjM5LjY2MkMyMzIuODIxLDUwMS42MjIsMjQzLjE5OSw1MTIsMjU2LDUxMmMxMi44MDEsMCwyMy4xNzktMTAuMzc4LDIzLjE3OS0yMy4xNzl2LTM5LjY2Mmg4Ljc1Nw0KCWMxMi44MDEsMCwyMy4xNzktMTAuMzc4LDIzLjE3OS0yMy4xNzlzLTEwLjM3OC0yMy4xNzktMjMuMTc5LTIzLjE3OWgtOC43NTd2LTY0LjQyQzM2Mi4wODksMzI3LjA3Myw0MjUuOTgsMjU1Ljk5NCw0MjUuOTgsMTY5Ljk4eg0KCSBNMjU2LDI5My42MDJjLTY4LjI3NCwwLTEyMy42MjItNTUuMzQ4LTEyMy42MjItMTIzLjYyMlMxODcuNzI2LDQ2LjM1OCwyNTYsNDYuMzU4czEyMy42MjIsNTUuMzQ4LDEyMy42MjIsMTIzLjYyMg0KCVMzMjQuMjc0LDI5My42MDIsMjU2LDI5My42MDJ6Ii8+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" />                            @break
                                                            @default

                                                        @endswitch
                                                    </td>

                                                    <td>
                                                        {{$usuario->EmailSena}}
                                                    </td>

                                                    <td>

                                                        @switch($usuario->Estado)
                                                            @case('Activo')
                                                                <a href="{{    url('usuarios/habilitar/'.$usuario->IdUsuario)    }}" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Activo</a>
                                                                @break
                                                            @case('Inactivo')
                                                                <a href="{{    url('usuarios/habilitar/'.$usuario->IdUsuario)    }}" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Inactivo</a>
                                                                @break
                                                            @default
                                                                <a href="{{    url('usuarios/habilitar/'.$usuario->IdUsuario)    }}" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-question-sign"></span> Sin estado</a>
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        @foreach ($usuario->rol()->get() as $rol)
                                                            {{$rol->tipoRol}}
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        <form action="{{url('usuarios/'.$usuario->IdUsuario)}}">
                                                        <button style="border: none;"><i style="color: orange;" class="fas fa-eye"></i></button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="{{url('usuarios/'.$usuario->IdUsuario.'/edit')}}">
                                                        <button style="border: none;"><i style="color: orange;" class="fas fa-edit"></i></button>
                                                         </form>
                                                    </td>
													<td>
													<form method="post" action="{{url('usuarios/'.$usuario->IdUsuario)}}">
														@method('DELETE')
														@csrf
														<button style="border:none;"><i style="color:orange;" class="far fa-trash-alt"></i></button>
													</form>
													</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr
											style="
                                            background:#ffb880;
											aling-text:center;
                                            color:white;
											"
											>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Genero</th>
                                                <th>Email-Sena</th>
                                                <th>Estado</th>
                                                <th>Rol</th>
                                                <th>Ver</th>
                                                <th>Editar</th>
												<th>Eliminar</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <button type="button" class="btn btn-primary"><a style=" color: white; margin:6rem;"  href="{{url('usuarios/create')}}">+ Usuario</a></button>
                                    <button type="button" class="btn btn-primary"><a style=" color: white; margin:6rem;" href="{{url('aprendices/create')}}">+ Aprendiz</a></button>
                                </div>
                                {{$usuarios->links()}}
                               @if (session('msg') != null)
                                {{session("msg")}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
@endsection
