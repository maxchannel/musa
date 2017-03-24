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
                        <h4>Básico</h4>
                        <strong>Tipo de pieza:</strong> {{ $piece->type->name }}<br>
                        <strong>Autor:</strong> {{$piece->authors->first()->name}}<br>
                        <strong>Año:</strong> {{$piece->year}}<br>
                        <strong>Elementos:</strong> {{$piece->elements}}<br>
                        <strong>Estado:</strong> {{ $piece->conservations->first()->state }}<br>
                    </td>
                    <td width="50%">
                        <h4>Adquisición</h4>
                        <strong>Forma:</strong> {{ $piece->acquisition->forma }}<br>
                        <strong>Fecha:</strong> {{ $piece->acquisition->fecha }}<br>
                        <strong>Valor económico:</strong> {{ $piece->acquisition->valuation }} USD $<br>

                        <h4>Campos {{$piece->type->name}}</h4>
                        <strong>Forma:</strong> {{ $piece->acquisition->forma }}<br>
                        <strong>Fecha:</strong> {{ $piece->acquisition->fecha }}<br>
                        <strong>Valor económico:</strong> {{ $piece->acquisition->valuation }} USD $<br>
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