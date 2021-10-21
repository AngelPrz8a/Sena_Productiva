<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>
<body>

<center><h1>Lista Reuniones</h1></center>

<button type="button" class="btn btn-primary">
    <a style=" color: white;" href="{{     url('reunionAprendiz/create')    }}">
        +
    </a>
</button>

<table class="table table-striped">
    <thead>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th>Fecha Citacion</th>
        <th>HoraCitacion</th>
        <th>Modalidad</th>
        <th>Fecha Creacion</th>
        <th>Mometo</th>
        <th>Instructor</th>
        <th>Estado</th>
        <th>Ver</th>
        <th>Editar</th>
    </thead>
    <tbody>
        @foreach ($reuniones as $reunion)
            <tr>
                <td style="padding-right:20px;">
                   {{$reunion->Titulo}}
                </td>
                <td>
                    {{$reunion->Descripcion}}
                </td>
                <td>
                    {{$reunion->FechaCitacion}}
                </td>
                <td>
                    {{$reunion->HoraCitacion}}
                </td>
                <td>
                    {{$reunion->Modalidad}}
                </td>
                <td>
                    {{$reunion->FechaCreacion}}
                </td>
                <td>
                    {{$reunion->MomentoEleccion}}
                </td>
                <td>
                    {{$reunion->IdInstructor}}
                </td>
                <td>
                    @switch($reunion->Estado)
                        @case('Activo')
                            <a href="{{    url('reunionAprendiz/habilitar/'.$reunion->IdReunionAprendices)    }}" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-ok"></span> Activo</a>
                            @break
                        @case('Inactivo')
                            <a href="{{    url('reunionAprendiz/habilitar/'.$reunion->IdReunionAprendices)    }}" class="btn btn-primary btn-danger"><span class="glyphicon glyphicon-remove"></span> Inactivo</a>
                            @break
                        @default
                            <a href="{{    url('reunionAprendiz/habilitar/'.$reunion->IdReunionAprendices)    }}" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-question-sign"></span> Sin estado</a>
                    @endswitch
                </td>
                <td>
                    <form action="{{url('reunionAprendiz/'.$reunion->IdReunionAprendices)}}">
                        <button class="btn btn-inverse"><img width="20px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik01MDguMTc3LDI0NS45OTVDNTAzLjYwNywyNDAuODk3LDM5My42ODIsMTIxLDI1NiwxMjFTOC4zOTQsMjQwLjg5NywzLjgyMywyNDUuOTk1Yy01LjA5OCw1LjY5OC01LjA5OCwxNC4zMTIsMCwyMC4wMQ0KCQkJQzguMzk0LDI3MS4xMDMsMTE4LjMyLDM5MSwyNTYsMzkxczI0Ny42MDYtMTE5Ljg5NywyNTIuMTc3LTEyNC45OTVDNTEzLjI3NCwyNjAuMzA3LDUxMy4yNzQsMjUxLjY5Myw1MDguMTc3LDI0NS45OTV6IE0yNTYsMzYxDQoJCQljLTU3Ljg5MSwwLTEwNS00Ny4xMDktMTA1LTEwNXM0Ny4xMDktMTA1LDEwNS0xMDVzMTA1LDQ3LjEwOSwxMDUsMTA1UzMxMy44OTEsMzYxLDI1NiwzNjF6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0yNzEsMjI2YzAtMTUuMDksNy40OTEtMjguMzY1LDE4Ljg4Ny0zNi41M0MyNzkuNjYxLDE4NC4yMzUsMjY4LjI1NSwxODEsMjU2LDE4MWMtNDEuMzUzLDAtNzUsMzMuNjQ3LTc1LDc1DQoJCQljMCw0MS4zNTMsMzMuNjQ3LDc1LDc1LDc1YzM3LjAyNCwwLDY3LjY2OC0yNy4wMzQsNzMuNzIyLTYyLjM1OEMyOTkuNTE2LDI3OC4zNjcsMjcxLDI1NS41MjIsMjcxLDIyNnoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" /></button>
                    </form>
                </td>
                <td>
                    <form action="{{url('reunionAprendiz/'.$reunion->IdReunionAprendices.'/edit')}}">
                        <button class="btn btn-inverse"><img width="20px" src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMnB0IiB2aWV3Qm94PSIwIDAgNTEyIDUxMSIgd2lkdGg9IjUxMnB0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im00MDUuMzMyMDMxIDI1Ni40ODQzNzVjLTExLjc5Njg3NSAwLTIxLjMzMjAzMSA5LjU1ODU5NC0yMS4zMzIwMzEgMjEuMzMyMDMxdjE3MC42Njc5NjljMCAxMS43NTM5MDYtOS41NTg1OTQgMjEuMzMyMDMxLTIxLjMzMjAzMSAyMS4zMzIwMzFoLTI5OC42Njc5NjljLTExLjc3NzM0NCAwLTIxLjMzMjAzMS05LjU3ODEyNS0yMS4zMzIwMzEtMjEuMzMyMDMxdi0yOTguNjY3OTY5YzAtMTEuNzUzOTA2IDkuNTU0Njg3LTIxLjMzMjAzMSAyMS4zMzIwMzEtMjEuMzMyMDMxaDE3MC42Njc5NjljMTEuNzk2ODc1IDAgMjEuMzMyMDMxLTkuNTU4NTk0IDIxLjMzMjAzMS0yMS4zMzIwMzEgMC0xMS43NzczNDQtOS41MzUxNTYtMjEuMzM1OTM4LTIxLjMzMjAzMS0yMS4zMzU5MzhoLTE3MC42Njc5NjljLTM1LjI4NTE1NiAwLTY0IDI4LjcxNDg0NC02NCA2NHYyOTguNjY3OTY5YzAgMzUuMjg1MTU2IDI4LjcxNDg0NCA2NCA2NCA2NGgyOTguNjY3OTY5YzM1LjI4NTE1NiAwIDY0LTI4LjcxNDg0NCA2NC02NHYtMTcwLjY2Nzk2OWMwLTExLjc5Njg3NS05LjUzOTA2My0yMS4zMzIwMzEtMjEuMzM1OTM4LTIxLjMzMjAzMXptMCAwIi8+PHBhdGggZD0ibTIwMC4wMTk1MzEgMjM3LjA1MDc4MWMtMS40OTIxODcgMS40OTIxODgtMi40OTYwOTMgMy4zOTA2MjUtMi45MjE4NzUgNS40Mzc1bC0xNS4wODIwMzEgNzUuNDM3NWMtLjcwMzEyNSAzLjQ5NjA5NC40MDYyNSA3LjEwMTU2MyAyLjkyMTg3NSA5LjY0MDYyNSAyLjAyNzM0NCAyLjAyNzM0NCA0Ljc1NzgxMiAzLjExMzI4MiA3LjU1NDY4OCAzLjExMzI4Mi42Nzk2ODcgMCAxLjM4NjcxOC0uMDYyNSAyLjA4OTg0My0uMjEwOTM4bDc1LjQxNDA2My0xNS4wODIwMzFjMi4wODk4NDQtLjQyOTY4OCAzLjk4ODI4MS0xLjQyOTY4OCA1LjQ2MDkzNy0yLjkyNTc4MWwxNjguNzg5MDYzLTE2OC43ODkwNjMtNzUuNDE0MDYzLTc1LjQxMDE1NnptMCAwIi8+PHBhdGggZD0ibTQ5Ni4zODI4MTIgMTYuMTAxNTYyYy0yMC43OTY4NzQtMjAuODAwNzgxLTU0LjYzMjgxMi0yMC44MDA3ODEtNzUuNDE0MDYyIDBsLTI5LjUyMzQzOCAyOS41MjM0MzggNzUuNDE0MDYzIDc1LjQxNDA2MiAyOS41MjM0MzctMjkuNTI3MzQzYzEwLjA3MDMxMy0xMC4wNDY4NzUgMTUuNjE3MTg4LTIzLjQ0NTMxMyAxNS42MTcxODgtMzcuNjk1MzEzcy01LjU0Njg3NS0yNy42NDg0MzctMTUuNjE3MTg4LTM3LjcxNDg0NHptMCAwIi8+PC9zdmc+" /></button>
                     </form>
                </td>
                <td>
                    <!--<form method="post" action="{{url('reunionAprendiz/'.$reunion->IdReunionAprendices)}}">
                        @method('DELETE')
                        @csrf

                        <button class="btn btn-dangel"><img width="20px" src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEyIDUxMiIgaGVpZ2h0PSI1MTIiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxnPjxwYXRoIGQ9Im00MjQgNjRoLTg4di0xNmMwLTI2LjUxLTIxLjQ5LTQ4LTQ4LTQ4aC02NGMtMjYuNTEgMC00OCAyMS40OS00OCA0OHYxNmgtODhjLTIyLjA5MSAwLTQwIDE3LjkwOS00MCA0MHYzMmMwIDguODM3IDcuMTYzIDE2IDE2IDE2aDM4NGM4LjgzNyAwIDE2LTcuMTYzIDE2LTE2di0zMmMwLTIyLjA5MS0xNy45MDktNDAtNDAtNDB6bS0yMTYtMTZjMC04LjgyIDcuMTgtMTYgMTYtMTZoNjRjOC44MiAwIDE2IDcuMTggMTYgMTZ2MTZoLTk2eiIvPjxwYXRoIGQ9Im03OC4zNjQgMTg0Yy0yLjg1NSAwLTUuMTMgMi4zODYtNC45OTQgNS4yMzhsMTMuMiAyNzcuMDQyYzEuMjIgMjUuNjQgMjIuMjggNDUuNzIgNDcuOTQgNDUuNzJoMjQyLjk4YzI1LjY2IDAgNDYuNzItMjAuMDggNDcuOTQtNDUuNzJsMTMuMi0yNzcuMDQyYy4xMzYtMi44NTItMi4xMzktNS4yMzgtNC45OTQtNS4yMzh6bTI0MS42MzYgNDBjMC04Ljg0IDcuMTYtMTYgMTYtMTZzMTYgNy4xNiAxNiAxNnYyMDhjMCA4Ljg0LTcuMTYgMTYtMTYgMTZzLTE2LTcuMTYtMTYtMTZ6bS04MCAwYzAtOC44NCA3LjE2LTE2IDE2LTE2czE2IDcuMTYgMTYgMTZ2MjA4YzAgOC44NC03LjE2IDE2LTE2IDE2cy0xNi03LjE2LTE2LTE2em0tODAgMGMwLTguODQgNy4xNi0xNiAxNi0xNnMxNiA3LjE2IDE2IDE2djIwOGMwIDguODQtNy4xNiAxNi0xNiAxNnMtMTYtNy4xNi0xNi0xNnoiLz48L2c+PC9zdmc+" /></button>
                    </form>-->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$reuniones->links()}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>



