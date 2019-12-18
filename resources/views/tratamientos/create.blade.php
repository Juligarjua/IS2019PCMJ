@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear tratamiento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'tratamientos.store']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'fecha_inicio ') !!}
                            {!! Form::text('fecha_inicio',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'fecha_fin') !!}
                            {!! Form::text('fecha_fin',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('unidades', 'unidades') !!}
                            {!! Form::text('unidades',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'descripcion ') !!}
                            {!! Form::text('descripcion',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('frecuencia', 'frecuencia del paciente') !!}
                            {!! Form::text('frecuencia',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('medicamento_id', 'medicamento paciente') !!}
                            <br>
                            {!! Form::select('medicamento_id', $medicamentos, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('cita_id', 'cita') !!}
                            <br>
                            {!! Form::select('cita_id', $citas, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
