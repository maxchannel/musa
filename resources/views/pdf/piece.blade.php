<html>
<head>
<title>{{$piece->title}}</title>
{!! Html::style('assets/css/pdf.css') !!}

</head>
<body>
    <div id="page-wrap">
        <h3 class="pdf-title">{{$piece->title}}</h3>
        <table width="100%">
            <tbody>
                <tr>
                    <td width="50%">
                        @if($basic == "yes")
                        <h4>Básico</h4>
                        <strong>Tipo de pieza:</strong> {{ $piece->type->name }}<br>
                        <strong>Autor:</strong> {{$piece->authors->first()->name}}<br>
                        <strong>Año:</strong> {{$piece->year}}<br>
                        <strong>Elementos:</strong> {{$piece->elements}}<br>
                        <strong>Estado:</strong> {{ $piece->conservations->first()->state }}<br>
                        <strong>Descripción:</strong> {{ $piece->description }}<br>
                        @endif
                    </td>
                    <td width="50%"> 
                        @if($images == "yes")
                            @if(count($piece->images))
                                <img src="{{ asset('files/images/'.$piece->images->first()->name) }}" style="height:100px; width:100px;"><br>
                            @endif
                        @endif

                        @if($adqui == "yes")
                            <h4>Adquisición</h4>
                            <strong>Forma:</strong> {{ $piece->acquisition->forma }}<br>
                            <strong>Fecha:</strong> {{ $piece->acquisition->fecha }}<br>
                            <strong>Valor económico:</strong> {{ $piece->acquisition->valuation }} USD $<br>
                        @endif

                        @if($pub == "yes")
                            <h4>Publicaciones</h4>
                            @if(count($piece->publications))
                                @foreach($piece->publications as $publication)
                                    <strong>Título:</strong> {{ $publication->title}}<br>
                                    <strong>Autor:</strong> {{ $publication->author }}<br>
                                    <strong>Fecha:</strong> {{ $publication->fecha}}<br>
                                    <strong>Referencia:</strong> {{ $publication->reference }}<br>
                                @endforeach
                            @endif
                        @endif

                        @if($loan == "yes")
                            <h4>Prestamos</h4>
                            @if(count($piece->loans))
                                @foreach($piece->loans as $loan)
                                    <strong>Institución:</strong> {{ $piece->loans->first()->institution->name}}<br>
                                @endforeach
                            @endif
                        @endif

                        @if($inter == "yes")
                            <h4>Intervenciones</h4>
                            @if(count($piece->interventions))
                                @foreach($piece->interventions as $inter_gg)
                                    <strong>Responsable:</strong> {{ $inter_gg->manager }}<br>
                                    <strong>Fecha:</strong> {{ $inter_gg->year }}<br>
                                    <strong>Proceso:</strong> {{ $inter_gg->process }}<br>
                                @endforeach
                            @endif
                        @endif

                        @if($conser == "yes")
                            <h4>Conservaciones</h4>
                            @if(count($piece->conservations))
                                @foreach($piece->conservations as $conser_gg)
                                    <strong>Estado:</strong> {{ $conser_gg->state }}<br>
                                @endforeach
                            @endif
                        @endif

                        @if($exhi == "yes")
                            <h4>Exhibiciones</h4>
                            @if(count($piece->exhibitionsVigent))
                                @foreach($piece->exhibitionsVigent as $key => $exhibition)
                                    <strong>Título:</strong> {{$exhibition->title}}<br>
                                    <strong>Descripción:</strong> {{$exhibition->description}}<br>
                                @endforeach
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
            </tbody>
        </table>

        <br><br><br>
        <table>
            <tbody>
                <tr>
                    <td id="info-emp">
                        http://musa.udg.mx/wordpress, Calle Juárez, 975, Colonia Centro, 44100 Guadalajara, Jal.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>