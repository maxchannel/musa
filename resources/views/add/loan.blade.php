@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear un Préstamo</div>
                <div class="panel-body">

                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                @include('partials.errorMessages')

                {!! Form::open(['route'=>'add_loan_store', 'method'=>'POST', 'role'=>'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Pieza*</label>
                        <div class="col-md-6">
                           {!! Form::select('piece_id',[''=>'Seleccionar']+$pieces,null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Institución*</label>
                        <div class="col-md-6">
                           {!! Form::select('institution_id',[''=>'Seleccionar']+$insts,null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Inicio*</label>
                        <div class="col-md-6">
                           {!! Form::date('start') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Fin*</label>
                        <div class="col-md-6">
                           {!! Form::date('end') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Archivo (Multiples Archivos)*</label>
                        <div class="col-md-6">
                           {!! Form::file('file[]',['multiple' => 'multiple', 'id' => 'multiple-files']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
