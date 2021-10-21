<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>
<body>



<center><h1>Lista de Empresas</h1></center>

@if(Session::has('msg'))
 <div class="alert alert-warning alert-dismissible" role="alert">
{{ session::get('msg')}}

 <button type="button" class="close" data-dismiss="alert" aria-label="close">
     <span aria-hidden="true">&times;</span>
 </button>
</div>
@endif


<a type="submit" class=" btn btn-success" href="{{url('empresas/create')}}" >Nuevo</a>


<table class="table table-striped">
    <thead>
        <th></th>
        <th>NIT</th>
        <th>Nombre</th>
        <th>Nombre Jefe</th>
        <th>EmialInmediato</th>


    </thead>
    <tbody>
        @foreach ($empresas as $empresa)
            <tr>
                <td>
                    <a href="{{url('empresas/'.$empresa->IdEmpresa)}}" >Show</a>

                    <a href="{{url('empresas/'.$empresa->IdEmpresa.'/edit')}}" >Edit</a>
                </td>
                <td>
                    {{$empresa->NIT}}
                </td>
                <td>
                    {{$empresa->Nombre}}
                </td>
                <td>
                    {{$empresa->NombreInmediato}}
                    {{$empresa->ApellidoInmediato}}
                </td>
                <td>
                    {{$empresa->EmailInmediato}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$empresas->links()}}

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>


</body>






