@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Centros</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'centros.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear centros', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>lugar</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($centros as $centro)
                                <tr>
                                    <td>{{ $centro->lugar }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['centros.edit',$centro->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['centros.destroy',$centro->id], 'method' => 'delete']) !!}
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