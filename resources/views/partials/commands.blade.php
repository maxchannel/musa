            {!! Form::open(['route'=>'command_line', 'method'=>'GET', 'role'=>'form']) !!}
                {!! Form::text('query',null,['class'=>'form-control', 'placeholder'=>'Busqueda y Linea de Comandos']) !!}
                {!! Form::hidden('mode', 'search') !!}
            {!! Form::close() !!}