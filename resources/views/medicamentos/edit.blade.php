@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medico</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medicamento, [ 'route' => ['medicamentos.update',$medicamento->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('nombreComercial', 'medicamentos') !!}
                            {!! Form::text('nombreComercial',$medicamento->nombreComercial,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('composicion', 'Composicion del medico') !!}
                            {!! Form::text('composicion',$medicamento->composicion,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('presentacion', 'Presentacion del medico') !!}
                            {!! Form::text('presentacion',$medicamento->presentacion,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('enlaceOnline', 'enlaceOnline del medico') !!}
                            {!! Form::text('enlaceOnline',$medicamento->enlaceOnline,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_inico', 'fecha_inicio tratamiento') !!}
                            {!! Form::text('fecha_inicio',$medicamento->enlaceOnline,['class'=>'form-control']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
