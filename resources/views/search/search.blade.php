@extends('layouts.app')

@section('script_head')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(\Request::input('mode') == "types")
                <h1>Mostrando solo {{ \Request::input('header') }}</h1>
            @else
                <h1>Busqueda: {{ $query }}</h1>
            @endif            
            
            <table class="table table-hover">
                <tr>
                    <th>Resultado</th>
                    <th>Tipo de Resultado</th>
                    <th>Creado el</th>
                    <th></th>
                </tr>

                <!-- Tipos -->
                @if($tipos->count() > 0)
                    @foreach($tipos as $piece)
                    <tr>
                        <td>{{ $piece->title }}</td>
                        <td>{{ $piece->type->name }}</td> 
                        <td>{{ $piece->created_at }}</td> 
                        <td>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- Tipos -->

                <!-- Users -->
                @if($results_users->count() > 0)
                    @foreach($results_users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>Usuario</td> 
                        <td>{{ $user->created_at }}</td> 
                        <td>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- Users -->

                <!-- Piece -->
                @if($results_piece->count() > 0)
                    @foreach($results_piece as $product)
                    <tr>
                        <td>{{ $product->title }} ({{ $product->year }})</td>
                        <td>Pieza</td> 
                        <td>{{ $product->created_at }}</td> 
                        <td>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- Piece -->

                <!-- Exhibition -->
                @if($results_exis->count() > 0)
                    @foreach($results_exis as $author)
                    <tr>
                        <td>{{ $author->title }}</td>
                        <td>Exibición</td> 
                        <td>{{ $author->created_at }}</td> 
                        <td>
                            <a href="{{ route('edit_author', [$author->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- Exhibition -->

                <!-- Institution -->
                @if($results_insti->count() > 0)
                    @foreach($results_insti as $insti)
                    <tr>
                        <td>{{ $insti->name }}</td>
                        <td>Institución</td> 
                        <td>{{ $insti->created_at }}</td> 
                        <td>
                            <a href="{{ route('edit_author', [$insti->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- Institution -->
                
            </table>

            <hr>
            @if($results_author->count() > 0)
                <h3>Autores:</h3>
                @foreach($results_author as $author)
                {{ $author->name }}, obras:<br>
                    <ul>
                    @if(count($author->pieces))
                        @foreach($author->pieces as $piece)
                            <li>
                                {{ $piece->title }} (<a href="{{ route('piece_profile', [$piece->id]) }}">Ver Pieza</a>)
                            </li>
                        @endforeach
                    @endif
                    </ul>
                @endforeach
            @endif

            
        </div>
    </div>
</div>
@endsection
