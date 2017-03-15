@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @include('partials.menuSetting')
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Configuración de Perfil</div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    @include('partials.errorMessages')

                    {!! Form::model($user, ['route'=>'settings_store', 'method'=>'PUT', 'role'=>'form', 'class' => 'form-horizontal']) !!}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nombre</label>
                        <div class="col-md-6">
                            {!! Form::text('name',null,['class'=>'form-control', 'maxlength'=>'30', 'placeholder'=>'Nombre para mostrar']) !!}
                        </div>
                    </div>

                    </br>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
