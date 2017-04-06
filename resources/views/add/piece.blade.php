@extends('layouts.app')

@section('script_head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Pieza</div>
                <div class="panel-body">

                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                @include('partials.errorMessages')

                {!! Form::open(['route'=>'add_piece_store', 'method'=>'POST', 'role'=>'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Titulo*</label>
                        <div class="col-md-6">
                           {!! Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Titulo']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tipo*</label>
                        <div class="col-md-6">
                            {!! Form::select('type_id',[''=>'Seleccionar']+$types,null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Autor*</label>
                        <div class="col-md-6">
                            {!! Form::select('author_id',[''=>'Seleccionar']+$authors,null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Año*</label>
                        <div class="col-md-6">
                           {!! Form::text('year',null,['class'=>'form-control', 'placeholder'=>'Año']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Precio*</label>
                        <div class="col-md-6">
                           {!! Form::text('price',null,['class'=>'form-control', 'placeholder'=>'Precio']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Descripción*</label>
                        <div class="col-md-6">
                           {!! Form::textarea('description',null,['class'=>'form-control', 'placeholder'=>'Descripción']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="buttons">
            <a class="btn btn-primary showSingle" target="1">Pintura</a>
            <a class="btn btn-success showSingle" target="2">Gráfica</a>
            <a class="btn btn-warning showSingle" target="3">Escultura</a><br><br>
            <a class="btn btn-default showSingle" target="4">Fotografía</a>
            <a class="btn btn-info showSingle" target="5">Dibujo</a>
            </div>      
            <br>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading" >Añadir Imágen</div>
                <div class="panel-body">
                    <!-- images -->
                    <p class="text-muted">Puedes subir multiples imágenes al Pedido</p>
                    @if(Session::has('image-message'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('image-message') }}
                        </div>
                    @endif
                    
                    {!! Form::file('file[]',['multiple' => 'multiple', 'id' => 'multiple-files', 'accept' => 'image/*']) !!}
                    <br>  
                    <!-- images -->
                </div>
            </div>
            <hr> 

            <br>
            <div class="panel panel-default targetDiv"  id="div1">
                <div class="panel-heading" >Campos Pintura</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Técnica*</label>
                        <div class="col-md-6">
                           {!! Form::select('technique_id',[''=>'Seleccionar']+$techs,null,['class'=>'form-control']) !!}
                        </div>
                    </div><br><br>
                    <hr>
                    <p class="text-danger">con Marco</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('marco_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('marco_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br>
                    <p class="text-primary">sin Marco</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('sin_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('sin_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br><br><br>
                </div>
            </div>

            <div class="panel panel-default targetDiv"  id="div2">
                <div class="panel-heading" >Campos Gráfica</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Técnica</label>
                            <select name="tecnica1[]" id="tags" multiple="multiple" style="width:100%" >
                                @foreach($tec_grafs as $tech)
                                    <option selected="selected">{{ $tech }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br><br><hr>
                    <p class="text-success">Padding</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('graph_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('graph_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br>
                    <p class="text-danger">con Marco</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('graph_con_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('graph_con_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br>
                    <p class="text-primary">sin Marco</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('graph_sin_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('graph_sin_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br><br><br>
                    <br><br><br>
                </div>

            </div>

            <div class="panel panel-default targetDiv" id="div3">
                <div class="panel-heading">Campos Escultura</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('cube_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('cube_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Alto*</label>
                        <div class="col-md-6">
                           {!! Form::text('cube_long',null,['class'=>'form-control', 'placeholder'=>'Alto']) !!}
                        </div>
                    </div>
                </div>
            </div>

             <div class="panel panel-default targetDiv" id="div4">
                <div class="panel-heading">Campos Fotografía</div>
                <div class="panel-body">
                    <p class="text-danger">con Marco</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('photo_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('photo_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br>
                    <p class="text-primary">sin Marco</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('photo_sin_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('photo_sin_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br><br><br>
                </div>
            </div>

             <div class="panel panel-default targetDiv" id="div5">
                <div class="panel-heading">Campos Dibujo</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Técnica</label>
                            <select name="tecnica2[]" id="tags2" multiple="multiple" style="width:100%" >
                                @foreach($tec_draws as $tech)
                                    <option selected="selected">{{ $tech }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br><br><hr>
                    <p class="text-danger">con Marco</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('draw_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('draw_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br>
                    <p class="text-primary">sin Marco</p>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ancho*</label>
                        <div class="col-md-6">
                           {!! Form::text('draw_sin_width',null,['class'=>'form-control', 'placeholder'=>'Ancho']) !!}
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Largo*</label>
                        <div class="col-md-6">
                           {!! Form::text('draw_sin_height',null,['class'=>'form-control', 'placeholder'=>'Largo']) !!}
                        </div>
                    </div><br><br><br>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection

@section('script_footer')
<script>
$('#div1').hide();
$('#div2').hide();
$('#div3').hide();
$('#div4').hide();
$('#div5').hide();
jQuery(function(){
    jQuery('#showall').click(function(){
        jQuery('.targetDiv').show();
    });
    jQuery('.showSingle').click(function(){
        jQuery('.targetDiv').hide();
        jQuery('#div'+$(this).attr('target')).show();
    });
});

$('#tags').select2({
    tags: true,
    tokenSeparators: [','], 
    placeholder: "Añade tus categorías"
});

$('#tags2').select2({
    tags: true,
    tokenSeparators: [','], 
    placeholder: "Añade tus categorías"
});
</script>
@endsection
