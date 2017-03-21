@extends('layouts.app')

@section('script_head')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1">
            <a href="{{ route('piece_panorama', $piece->id) }}" class="btn btn-info">Volver</a>
        </div>
        <div class="col-md-10">
            <h1 class="text-center">Editar Publicaciones</h1>
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif

            @if(count($piece->publicationsVigent))
            <table class="table table-hover">
                <tr>
                    <th>Titulo</th>
                    <th>Creado</th>
                    <th></th>
                </tr>
                
                    @foreach($piece->publicationsVigent as $i => $publication)
                    <tr data-id="{{ $publication->pivot->id }}">
                        <td>{{ $publication->pivot->id }}</td>
                        <td>
                            <script>
                            moment.locale("es");
                            document.writeln(moment.utc("{{ $publication->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                            </script>
                        </td>
                        <td>
                            <a href="" class="btn btn-danger btn-xs btn-delete">Eliminar</a>
                            <a href="{{ route('edit_publication', [$publication->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                        </td>
                    </tr>
                    @endforeach
            </table>
            @else
                <p class="text-muted">Sin Publicaciones Aún</p>
            @endif
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

{!! Form::open(['route'=>['piece_publication_destroy', ':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection

@section('script_footer')
<script>
$(document).ready(function(){
    //Eliminar usuario
    $('.btn-delete').click(function(e){
        e.preventDefault();
        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID',id);
        var data = form.serialize();
        row.fadeOut();
        $.post(url, data, function(result){
            alert(result.message);
        });
    });
});
</script>
@endsection
