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
            <h1 class="text-center">Editar Préstamos</h1>
            @if(count($piece->loans))
            <table class="table table-hover">
                <tr>
                    <th>Manager</th>
                    <th>Creado</th>
                    <th></th>
                </tr>
                
                    @foreach($piece->loans as $i => $loan)
                    <tr data-id="{{ $loan->id }}">
                        <td>{{ $loan->manager }}</td>
                        <td>
                            <script>
                            moment.locale("es");
                            document.writeln(moment.utc("{{ $loan->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                            </script>
                        </td>
                        <td>
                            <a href="" class="btn btn-danger btn-xs btn-delete">Eliminar</a>
                            <a href="{{ route('edit_loan', [$loan->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                        </td>
                    </tr>
                    @endforeach
            </table>
            @else
                <p class="text-muted">Sin Publicaciones Aún</p>
            @endif
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" >Añadir Préstamo</div>
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
                            <label class="col-md-4 control-label">Manager*</label>
                            <div class="col-md-6">
                               {!! Form::text('manager',null,['class'=>'form-control', 'placeholder'=>'Nombre']) !!}
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

{!! Form::open(['route'=>['piece_loan_destroy', ':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
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
