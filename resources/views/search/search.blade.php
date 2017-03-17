@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Busqueda: {{ $query }}</h1>
            
            <table class="table table-hover">
                <tr>
                    <th>Resultado</th>
                    <th>Tipo de Resultado</th>
                    <th>Creado el</th>
                    <th></th>
                </tr>

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
                        <td>{{ $product->title }}</td>
                        <td>Pieza</td> 
                        <td>{{ $product->created_at }}</td> 
                        <td>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- Piece -->

                <!-- Author -->
                @if($results_author->count() > 0)
                    @foreach($results_author as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>Autor</td> 
                        <td>{{ $author->created_at }}</td> 
                        <td>
                            <a href="{{ route('edit_author', [$author->id]) }}" class="btn btn-warning btn-xs">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
                <!-- Author -->

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
        </div>
    </div>
</div>
@endsection
