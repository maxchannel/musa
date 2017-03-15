@extends('layouts.app')

@section('script_head')
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                <tr>
                    <th>Fecha</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($nots as $n)
                <tr data-id="{{ $n->id }}">
                    <td>
                        <script>
                        moment.locale("es");
                        document.writeln(moment.utc("{{ $n->created_at }}", "YYYYMMDD hh:mm:ss").fromNow());
                        </script>
                    </td>
                    <td>{!! $n->m !!}</td>
                    <td> 
                        <a href="#" class="btn-delete">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {!! str_replace('/?', '?', $nots->render()) !!} 
        </div>
    </div>
</div>

{!! Form::open(['route'=>['destroy_not', ':USER_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection

@section('script_footer')
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
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