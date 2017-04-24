@extends('layouts.app')

@section('script_head')
<script src="{{ asset('assets/js/chart.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Estadísticas</div>
                <div class="panel-body">
                    <canvas id="myChart"></canvas>
                    <script>
                    var ctx = document.getElementById("myChart");
                    var pinturas = <?php echo $pinturas; ?>;
                    var graphs = <?php echo $graphs; ?>;
                    var sculs = <?php echo $sculs; ?>;
                    var photos = <?php echo $photos; ?>;
                    var draws = <?php echo $draws; ?>;

                    var myChart = new Chart(ctx, {
                        type: 'polarArea',
                        data: {
                            datasets: [{
                                data: [
                                    pinturas,
                                    graphs,
                                    sculs,
                                    photos,
                                    draws
                                ],
                                backgroundColor: [
                                    "#FF6384",
                                    "#FFCE56",
                                    "#36A2EB",
                                    "#4CAF50",
                                    "#666633"
                                ],
                                label: 'Obras por mes' // for legend
                            }],
                            labels: [
                                "Pinturas",
                                "Gráficas",
                                "Esculturas",
                                "Fotografías",
                                "Dibujos"
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
                    </script>
                </div>
            </div>
            
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection