@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Autor</div>
                <div class="panel-body">

                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                @include('partials.errorMessages')

                {!! Form::model($publication,['route'=>['edit_publication_store', $publication->id], 'method'=>'PUT', 'role'=>'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Título*</label>
                        <div class="col-md-6">
                           {!! Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Título']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Author*</label>
                        <div class="col-md-6">
                           {!! Form::text('author',null,['class'=>'form-control', 'placeholder'=>'Autor']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Fecha*</label>
                        <div class="col-md-6">
                           {!! Form::text('fecha',null,['class'=>'form-control', 'placeholder'=>'Fecha']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Referencia*</label>
                        <div class="col-md-6">
                           {!! Form::text('reference',null,['class'=>'form-control', 'placeholder'=>'Referencia']) !!}
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
