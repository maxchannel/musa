$(document).ready(function() {
    var count = 2;
    var maxCounts = 8;

    //hide if not empty
    for(var i=2; i<=8; i++) 
    {
        if($('#piezas'+i).val() == "") 
        {
            $('#cp'+i).hide();
        }else
        {
            count++;//solo incrementar cuando no es vacio
        }
    };

    $('#addAttr').click(function()
    {
        console.log('#cp'+count);
        if(count <= maxCounts)
        {
            $('#cp'+count).show();
            count++;
        }

    });

});

$(document).ready(function() {
    var conteo = 2;
    var maxConteo = 8;

    //hide if not empty
    for(var i=2; i<=8; i++) 
    {
        if($('#figuras'+i).val() == "") 
        {
            $('#ca'+i).hide();
        }else
        {
            conteo++;//solo incrementar cuando no es vacio
        }
    };

    $('#addFigure').click(function()
    {
        console.log('#ca'+conteo);
        if(conteo <= maxConteo)
        {
            $('#ca'+conteo).show();
            conteo++;
        }

    });

});


