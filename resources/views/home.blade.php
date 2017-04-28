@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif

            @if(Auth::check())



            <div class="panel panel-default">

                <div class="panel-body">
                    <div>
                <div class="row">
                    <div class="col-md-10">
                        Hola mundo
                    </div>
                    <div class="col-md-2">
                        4 semanas
                    </div>
                </div>
                <div class="row">
                    <div>
                        <img src="{{ asset('files/images/imagen.png') }}" class="img-responsive" style="width:100%" alt="wake">
                    </div>
                </div>
                <div class="row"><br>
                    <div class="col-md-10">
                        Hola mundo, lorem
                    </div>
                    <div class="col-md-2">
                        xx
                    </div>
                </div>
            </div>
                </div>
            </div>
            @endif
            
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection