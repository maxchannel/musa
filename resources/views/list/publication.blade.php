@extends('layouts.app')

@section('script_head')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @include('partials.commands')
            <h1 class="text-center">Lista de Publicaciones</h1>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif

            <table class="table table-hover">
                <tr>
                    <th>Titulo</th>
                    <th>Creado</th>
                    <th></th>
                </tr>
                @foreach($publications as $i => $publication)
                <tr>
                    <td>{{ $publication->title }}</td>
                    <td>
                        <script>
                        moment.locale("es");
                        document.writeln(moment.utc("{{ $publication->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                        </script>
                    </td>
                    <td><a href="{{ route('edit_publication', [$publication->id]) }}" class="btn btn-warning btn-xs">Editar</a></td>
                </tr>
                @endforeach
            </table>
            {!! str_replace('/?', '?', $publications->render()) !!} 
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection
