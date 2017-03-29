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
            <h1 class="text-center">Lista de Piezas</h1>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif

            <p class="pull-right">
                Ordenar(
                    @if(\Request::input('sort') == 'name' || \Request::input('sort') == 'title_a')
                    Nombre
                    @else
                    <a href="{{ route('piece_list', ['sort'=>'title']) }}">Nombre</a>
                    @endif
                    /
                    @if(\Request::input('sort') == 'fecha' || \Request::input('sort') == 'fecha_a')
                    Fecha
                    @else
                    <a href="{{ route('piece_list', ['sort'=>'fecha']) }}">Fecha</a>
                    @endif
                    )    

                    @if(\Request::input('sort') == 'title')
                    <a href="{{ route('piece_list', ['sort'=>'title_a']) }}"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a>
                    @elseif(\Request::input('sort') == 'title_a')
                    <a href="{{ route('piece_list', ['sort'=>'title']) }}"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a>
                    @endif    

                    @if(\Request::input('sort') == 'fecha')
                    <a href="{{ route('piece_list', ['sort'=>'fecha_a']) }}"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a>
                    @elseif(\Request::input('sort') == 'fecha_a')
                    <a href="{{ route('piece_list', ['sort'=>'fecha']) }}"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a>
                    @endif
            </p>
            <table class="table table-hover">
                <tr>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Año</th>
                    <th></th>
                    <th>Creado</th>
                    <th></th>
                </tr>
                @foreach($pieces as $i => $piece)
                <tr>
                    <td>{{ $piece->title }}</td>
                    <td>{{ $piece->type->name }}</td>
                    <td>{{ $piece->year }}</td>
                    <td>
                        @if(count($piece->images))
                            <img src="{{ asset('files/images/'.$piece->images->first()->name) }}" style="width:100px">
                        @else
                        <span class="text-muted">Sin imágen</span>
                        @endif
                    </td>
                    <td>
                        <script>
                        moment.locale("es");
                        document.writeln(moment.utc("{{ $piece->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                        </script>
                    </td>
                    <td>
                        <a href="{{ route('piece_profile', [$piece->id]) }}" class="btn btn-primary btn-xs">Detalles</a>
                        <a href="{{ route('piece_panorama', [$piece->id]) }}" class="btn btn-success btn-xs">Panorama</a>
                        <a href="{{ route('edit_piece', [$piece->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {!! str_replace('/?', '?', $pieces->render()) !!} 
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection
