@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Ficha Técnica</div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li>Tipo de objeto: <a href="">{{ $piece->type->name }}</a></li>
                        <li>Autor: <a href="">{{ $piece->authors->first()->name }}</a></li>
                        <li>Año: <a href="">{{ $piece->year }}</a></li>
                        <li>Número de Elementos: {{ $piece->elements }}</li>
                        <li>Valor económico: {{ $piece->price }} $</li>
                        @if(count($piece->conservations))
                            <li>Estado: {{ $piece->conservations->first()->state }} (<a href="#" data-toggle="modal" data-target="#modanConser">Conservaciones</a>)</li> 
                        @endif
                        <!-- modal -->
                        <div class="modal fade" id="modanConser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Conservaciones</h4>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-unstyled">
                                        <!-- tabulando -->
                                        @if(count($piece->conservations))
                                            @foreach($piece->conservations as $conser_gg)
                                                <li>-Estado: {{ $conser_gg->state }}</li>
                                                <li>
                                                    -Archivos:
                                                    @if(count($conser_gg->files))
                                                        @foreach($conser_gg->files as $nouu)
                                                            <a href="{{ url('download/'.$nouu->name) }}">{{ $nouu->name }}</a>
                                                        @endforeach
                                                    @endif
                                                </li>
                                                <hr>
                                            @endforeach
                                        @endif
                                        <!-- tabulando -->
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal -->
                    </ul>
                    <hr>
                    <h4>Adquisición</h4>
                    <ul class="list-unstyled">
                        <li>Forma: {{ $piece->acquisition->forma }}</li>
                        <li>Fecha: {{ $piece->acquisition->fecha }}</li>
                        <li>Valor económico: {{ $piece->acquisition->valuation }} USD $</li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Descripción</div>
                <div class="panel-body">
                    <p class="text-muted">
                        {{ $piece->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>{{ $piece->title }}</h1>

            <!-- Imágen -->
            @if(count($piece->images))
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Zoom</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Imágen -->
                            @if(count($piece->images))
                            <div class="bs-example" data-example-id="simple-carousel">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach($piece->images as $key => $image)
                                            @if($key == 0)
                                                <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" class="active"></li>
                                            @else
                                                <li data-target="#carousel-example-generic" data-slide-to="{{$key}}"></li>
                                            @endif
                                        @endforeach
                                    </ol>

                                    <div class="carousel-inner" role="listbox">
                                        @foreach($piece->images as $key => $image)
                                            @if($key == 0)
                                                <div class="item active">
                                                    <img src="{{ asset('images/'.$image->name) }}" class="img-responsive" style="width:100%" alt="{{ $piece->title }}">
                                                </div>
                                            @else
                                                <div class="item">
                                                    <img src="{{ asset('images/'.$image->name) }}" class="img-responsive" style="width:100%" alt="{{ $piece->title }}">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    @if(count($piece->images) > 1)
                                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            @endif
                            <!-- Imágen -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

            <div class="bs-example" data-example-id="simple-carousel">
                <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($piece->images as $key => $image)
                            @if($key == 0)
                                <li data-target="#carousel-example-generic2" data-slide-to="{{$key}}" class="active"></li>
                            @else
                                <li data-target="#carousel-example-generic2" data-slide-to="{{$key}}"></li>
                            @endif
                        @endforeach
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        @foreach($piece->images as $key => $image)
                            @if($key == 0)
                                <div class="item active">
                                    <img src="{{ asset('images/'.$image->name) }}" class="tales" alt="{{ $piece->title }}">
                                </div>
                            @else
                                <div class="item">
                                    <img src="{{ asset('images/'.$image->name) }}" class="tales" alt="{{ $piece->title }}">
                                </div>
                            @endif
                        @endforeach
                    </div>

                    @if(count($piece->images) > 1)
                        <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @endif
                </div>
            </div>

            <br>
            <div class="text-center"><!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Ampliar
                </button>
            </div>
            @endif
            <!-- Imágen -->
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Campos Gráficos</div>
                <div class="panel-body">
                    Técnica: <a href="">{{ $piece->techniques->first()->name }}</a>
                    <ul class="list-unstyled">
                    @foreach($piece->areas as $area)
                        <li>{{ $area->type }}: {{ $area->height }} x {{ $area->width }} cm</li>
                    @endforeach
                    </ul>

                    @if(count($piece->mounting))
                    <ul class="list-unstyled">
                        <li>-Dimensiones: {{ $piece->mounting->dimentions }}</li>
                        <li>-Dimensiones sin:{{ $piece->mounting->dimentions_without }}</li>
                        <li>-Padding: {{ $piece->mounting->dimentions_with }}</li>
                    </ul>
                    @endif
                </div>
            </div>

            <!-- Intervenciones -->
            <div class="panel panel-default">
                <div class="panel-heading">Intervenciones</div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        @if(count($piece->interventions))
                            <li>-Responsable: <a href="#">{{ $piece->interventions->first()->manager }}</a></li>
                            <li>-Fecha: {{ $piece->interventions->first()->year }}</li>
                            <li>-Proceso: {{ $piece->interventions->first()->process }}</li>
                            <li>
                                -Archivos:
                                @if(count($piece->interventions->first()->files))
                                    @foreach($piece->interventions->first()->files as $nouu)
                                        <a href="{{ url('download/'.$nouu->name) }}">{{ $nouu->name }}</a>
                                    @endforeach
                                @endif
                            </li>
                            <hr>
                        @endif
                    </ul>
                    <div class="text-center"><!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMUSA">
                            Ver todo ({{count($piece->interventions)}})
                        </button>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="modal fade" id="modalMUSA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Intervenciones</h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-unstyled">
                            <!-- tabulando -->
                            @if(count($piece->interventions))
                                @foreach($piece->interventions as $inter_gg)
                                    <li>-Responsable: <a href="#">{{ $inter_gg->manager }}</a></li>
                                    <li>-Fecha: {{ $inter_gg->year }}</li>
                                    <li>-Proceso: {{ $inter_gg->process }}</li>
                                    <li>
                                        -Archivos:
                                        @if(count($inter_gg->files))
                                            @foreach($inter_gg->files as $nouu)
                                                <a href="{{ url('download/'.$nouu->name) }}">{{ $nouu->name }}</a>
                                            @endforeach
                                        @endif
                                    </li>
                                    <hr>
                                @endforeach
                            @endif
                            <!-- tabulando -->
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <!-- Intervenciones -->


            <!-- Historial de préstamos -->
            <div class="panel panel-default">
                <div class="panel-heading">Historial de Préstamos</div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        @if(count($piece->loans))
                            <li>-Institución: {{ $piece->loans->first()->institution->name}}</li>
                            <hr>
                        @endif
                    </ul>
                    <div class="text-center"><!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMUSA">
                            Ver todo ({{count($piece->loans)}})
                        </button>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="modal fade" id="modalMUSA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Historial de Préstamos</h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-unstyled">
                            <!-- tabulando -->
                            @if(count($piece->loans))
                                @foreach($piece->loans as $loan)
                                    <li>-Institución: {{ $loan->institution->name }}</li>
                                    <hr>
                                @endforeach
                            @endif
                            <!-- tabulando -->
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <!-- Historial de préstamos -->


            <!-- Exhibiciones de MUSA -->
            <div class="panel panel-default">
                <div class="panel-heading">Exhibiciones MUSA</div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        @if(count($piece->exhibitions))
                            <li>-Titulo: {{ $piece->exhibitions->first()->exhibition->title }}</li>
                            <li>-Descripción: {{ $piece->exhibitions->first()->exhibition->description }}</li>
                            <hr>
                        @endif
                    </ul>
                    <div class="text-center"><!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExhi">
                            Ver todo ({{count($piece->exhibitions)}})
                        </button>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="modal fade" id="modalExhi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Exhibiciones MUSA</h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-unstyled">
                            <!-- tabulando -->
                            @if(count($piece->exhibitions))
                                @foreach($piece->exhibitions as $exhibition)
                                    <li>-Titulo: {{ $exhibition->exhibition->title }}</li>
                                    <li>-Descripción: {{ $exhibition->exhibition->description }}</li>
                                    <hr>
                                @endforeach
                            @endif
                            <!-- tabulando -->
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <!-- Exhibiciones de MUSA -->

            <!-- Publicaciones -->
            <div class="panel panel-default">
                <div class="panel-heading">Publicaciones</div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        @if(count($piece->publications))
                            <li>-Titulo: {{ $piece->publications->first()->title }}</li>
                            <li>-Author: {{ $piece->publications->first()->author }}</li>
                            <li>-Fecha: {{ $piece->publications->first()->fecha }}</li>
                            <li>-Referencia: {{ $piece->publications->first()->reference }}</li>
                            <hr>
                        @endif
                    </ul>
                    <div class="text-center"><!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPublication">
                            Ver todo ({{count($piece->publications)}})
                        </button>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="modal fade" id="modalPublication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Publicaciones</h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-unstyled">
                            <!-- tabulando -->
                            @if(count($piece->publications))
                                @foreach($piece->publications as $publication)
                                    <li>-Titulo: {{ $publication->title }}</li>
                                    <li>-Author: {{ $publication->author }}</li>
                                    <li>-Fecha: {{ $publication->fecha }}</li>
                                    <li>-Referencia: {{ $publication->reference }}</li>
                                    <hr>
                                @endforeach
                            @endif
                            <!-- tabulando -->
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <!-- Publicaciones -->

        </div>
    </div>
</div>
@endsection
