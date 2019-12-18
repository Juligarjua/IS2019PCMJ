@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cita</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'citas.store']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_hora', 'fecha_hora del paciente') !!}
                            {!! Form::text('fecha_hora',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('centro_id', 'centro') !!}
                            <br>
                            {!! Form::select('centro_id', $centros, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('medico_id', 'medico') !!}
                            <br>
                            {!! Form::select('medico_id', $medicos, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $paciente, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection