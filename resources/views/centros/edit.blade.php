@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar centro</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($centro, [ 'route' => ['centros.update',$centro->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('lugar', 'centros') !!}
                            {!! Form::text('lugar',$centro->lugar,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

