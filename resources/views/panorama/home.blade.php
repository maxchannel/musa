@extends('layouts.app')

@section('script_head')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection

@section('content')
    <div class="container" id="main">
        <div class="row">
            <div class="col-md-3">
                </br><a href="{{ route('piece_list') }}" class="btn btn-info">Volver</a></br>
                <br>
                <div class="panel panel-default targetDiv">
                    <div class="panel-heading" >Imágenes (<a href="">Ver</a>)</div>
                    <div class="panel-body">
                        @if(count($piece->images))
                            <img src="{{ asset('images/'.$piece->images->first()->name) }}" class="img-responsive">
                            <hr>
                        @else
                            <p class="text-muted">Sin Imágenes Aún</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>#ID: {{ $piece->id }} - Título: {{ $piece->title }}</h3>

                @if($piece->count() > 0)
                    <table class="table table-hover">
                        <tr>
                            <th>Tipo</th>
                            <th>Título</th>
                            <th>Año</th>
                            <th>Descripción</th>
                        </tr>
                        <tr>
                            <td>{{ $piece->type->name }}</td>
                            <td>{{ $piece->title }}</td>
                            <td>{{ $piece->year }}</td>
                            <td>{{ $piece->description }}</td>
                        </tr>
                    </table>
                @else
                    <div class="alert alert-warning alert-dismissable">
                        Este Cliente aún no tiene pedidos.
                    </div>
                @endif

            </div><!-- /fin de col -->

            <div class="col-md-3">
                <div class="panel panel-default targetDiv">
                    <div class="panel-heading" >Básico</div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @include('partials.errorMessages')

                        {!! Form::model($piece,['route'=>['edit_piece_store', $piece->id], 'method'=>'PUT', 'role'=>'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre*</label>
                                <div class="col-md-6">
                                   {!! Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Nombre del Producto']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Año*</label>
                                <div class="col-md-6">
                                   {!! Form::text('year',null,['class'=>'form-control', 'placeholder'=>'Nombre del Producto']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Precio*</label>
                                <div class="col-md-6">
                                   {!! Form::text('price',null,['class'=>'form-control', 'placeholder'=>'Nombre del Producto']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripción*</label>
                                <div class="col-md-6">
                                   {!! Form::select('type_id',[''=>'Seleccionar']+$types,null,['class'=>'form-control']) !!}
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
            </div><!-- /fin de col -->
        </div><!-- /fin de row -->

        <br><br>
        <div class="row">
            <div class="col-md-3">
                <h4>Publicaciones (<a href="{{ route('piece_panorama_publications', $piece->id) }}">Editar</a>)</h4>
                <ul class="list-unstyled">
                    @if(count($piece->publicationsVigent))
                        <li>-Titulo: {{ $piece->publications->first()->title }}</li>
                        <li>-Author: {{ $piece->publications->first()->author }}</li>
                        <li>-Fecha: {{ $piece->publications->first()->fecha }}</li>
                        <li>-Referencia: {{ $piece->publications->first()->reference }}</li>
                        <hr>
                    @else
                        <p class="text-muted">Sin Publicaciones Aún</p>
                    @endif
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Exhibiciones (<a href="{{ route('piece_panorama_exhibitions', $piece->id) }}">Editar</a>)</h4>
                <ul class="list-unstyled">
                    @if(count($piece->exhibitionsVigent))
                        <li>-Titulo: {{ $piece->exhibitions->first()->title }}</li>
                        <li>-Descripción: {{ substr($piece->exhibitions->first()->description, 0, 90) }}...</li>
                        <hr>
                    @else
                        <p class="text-muted">Sin Exhibiciones Aún</p>
                    @endif
                </ul> 
            </div>
            <div class="col-md-3">
                <h4>Préstamos (<a href="{{ route('piece_panorama_loans', $piece->id) }}">Editar</a>)</h4>
                <ul class="list-unstyled">
                    @if(count($piece->loans))
                        <li>-Institución: {{ $piece->loans->first()->institution->name}}</li>
                        <hr>
                    @else
                        <p class="text-muted">Sin Préstamos Aún</p>
                    @endif
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Intervenciones (<a href="{{ route('piece_panorama_interventions', $piece->id) }}">Editar</a>)</h4>
                <ul class="list-unstyled">
                    @if(count($piece->interventions))
                        <li>-Responsable: <a href="#">{{ $piece->interventions->first()->manager }}</a></li>
                        <li>-Fecha: {{ $piece->interventions->first()->year }}</li>
                        <li>-Proceso: {{ $piece->interventions->first()->process }}</li>
                        <hr>
                    @else
                        <p class="text-muted">Sin Intervenciones Aún</p>
                    @endif
                </ul>
            </div>
        </div>

    </div> <!-- /container -->
@stop

@section('script_footer')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
@endsection

