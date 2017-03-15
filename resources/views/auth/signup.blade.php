@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                @include('partials.errorMessages')
                @if(Session::has('login_error'))
                    </br><div class="alert alert-danger" role="alert"><p>Email o Password incorrectos</p></div>
                @endif
                
                {!! Form::open(['route'=>'signupStore', 'method'=>'POST', 'role'=>'form', 'class' => 'form-horizontal']) !!}
                    <h2 class="form-signin-heading text-center">Registro</h2>
                    <label for="inputEmail" class="sr-only">Name</label>
                    {!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Name']) !!}
                    <label for="inputEmail" class="sr-only">Email address</label>
                    {!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Email']) !!}
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
                {!! Form::close() !!}
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection