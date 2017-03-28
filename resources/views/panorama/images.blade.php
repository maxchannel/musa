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
        <div class="col-md-7">
            <h1 class="text-center">Editar Imágenes</h1>

            @if(count($piece->images))
            <table class="table table-hover">
                <tr>
                    <th>Imágen</th>
                    <th>Creado</th>
                    <th></th>
                </tr>
                    @foreach($piece->images as $i => $image)
                    <tr data-id="{{ $image->id }}">
                        <td>
                            <img src="{{ Storage::url('file/images/'.$image->name) }}" style="width:100px">
                        </td>
                        <td>
                            <script>
                            moment.locale("es");
                            document.writeln(moment.utc("{{ $image->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                            </script>
                            <br>
                            {{ $image->id }}
                            <br>
                            {{ $image->pivot->id }}
                        </td>
                        <td>
                            <a href="" class="btn btn-danger btn-xs btn-delete">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
            </table>
            @else
                <p class="text-muted">Sin Imágenes Aún</p>
            @endif
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" >Añadir Imágen</div>
                <div class="panel-body">
                    <!-- images -->
                    {!! Form::open(['route'=>['add_piece_image', $piece->id], 'method'=>'PUT', 'role'=>'form', 'enctype' => 'multipart/form-data']) !!}
                    <h3>Subir más Imágenes</h3>
                    <p class="text-muted">Puedes subir multiples imágenes al Pedido</p>
                    @if(Session::has('image-message'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('image-message') }}
                        </div>
                    @endif
                    
                    {!! Form::file('file[]',['multiple' => 'multiple', 'id' => 'multiple-files', 'accept' => 'image/*']) !!}
                    <br>
                    <button type="submit" class="btn btn-primary">Enviar</button>    

                    {!! Form::close() !!}
                    <!-- images -->
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::open(['route'=>['piece_image_destroy', ':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
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

