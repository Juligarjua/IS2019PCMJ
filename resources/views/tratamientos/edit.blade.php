@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar tratamiento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($tratamiento, [ 'route' => ['tratamientos.update',$tratamiento->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('fecha_inicio', 'fecha_inicio del tratamiento') !!}
                            {!! Form::text('fecha_inicio',$tratamiento->fecha_inicio,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_fin', 'fecha_fin del paciente') !!}
                            {!! Form::text('fecha_fin',$tratamiento->fecha_fin,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('unidades', 'unidades del paciente') !!}
                            {!! Form::text('unidades',$tratamiento->unidades,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'descripcion del tratamiento') !!}
                            {!! Form::text('descripcion',$tratamiento->descripcion,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('frecuencia', 'frecuencia del paciente') !!}
                            {!! Form::text('frecuencia',$tratamiento->frecuencia,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('medicamento_id', 'medicamento ') !!}
                            <br>
                            {!! Form::select('medicamento_id', $medicamentos, $tratamiento->medicamento_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('cita_id', 'cita') !!}
                            <br>
                            {!! Form::select('cita_id', $citas, $tratamiento->cita_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
