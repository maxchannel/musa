@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Estadísticas</div>
                <div class="panel-body">
                    <hr>
                </div>
            </div>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection