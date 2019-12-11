@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicamentos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('medicamentos', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>NombreComercial</th>
                                <th>Composicion</th>
                                <th>Presentacion</th>
                                <th>enlaceOnline</th>
                                <th>fecha_inicio</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($medicamentos as $medicamento)


                                <tr>
                                    <td>{{ $medicamento->NombreComercial }}</td>
                                    <td>{{ $medicamento->Composicion }}</td>
                                    <td>{{ $medicamento->Presentacion}}</td>
                                    <td>{{ $medicamento->enlaceOnline}}</td>
                                    <td>{{ $medicamento->fecha_inicio}}</td>


                                    <td>
                                        {!! Form::open(['route' => ['medicamentos.edit',$medicamento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicamentos.destroy',$medicamento->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
