function price() 
{
    var precio = 0;
    var p_t_count = document.getElementById('p_t_count').value;
    //Determinando descuento segun cliente
    var cliente_id = document.getElementById('id').value;
    var descuento_a = document.getElementById('cliente_id_'+cliente_id).value;
    var descuento = (100 - descuento_a)/100; 
    //Determinando descuento segun cliente

    var piezas = [];
    piezas[1] = document.getElementById('piezas1').value;
    piezas[2] = document.getElementById('piezas2').value;
    piezas[3] = document.getElementById('piezas3').value;
    piezas[4] = document.getElementById('piezas4').value;
    piezas[5] = document.getElementById('piezas5').value;
    piezas[6] = document.getElementById('piezas6').value;
    piezas[7] = document.getElementById('piezas7').value;
    piezas[8] = document.getElementById('piezas8').value;
    var ancho = [];
    ancho[1] = document.getElementById('ancho1').value;
    ancho[2] = document.getElementById('ancho2').value;
    ancho[3] = document.getElementById('ancho3').value;
    ancho[4] = document.getElementById('ancho4').value;
    ancho[5] = document.getElementById('ancho5').value;
    ancho[6] = document.getElementById('ancho6').value;
    ancho[7] = document.getElementById('ancho7').value;
    ancho[8] = document.getElementById('ancho8').value;
    var largo = [];
    largo[1] = document.getElementById('largo1').value;
    largo[2] = document.getElementById('largo2').value;
    largo[3] = document.getElementById('largo3').value;
    largo[4] = document.getElementById('largo4').value;
    largo[5] = document.getElementById('largo5').value;
    largo[6] = document.getElementById('largo6').value;
    largo[7] = document.getElementById('largo7').value;
    largo[8] = document.getElementById('largo8').value;
    var product_id = [];
    product_id[1] = document.getElementById('product_id1').value;
    product_id[2] = document.getElementById('product_id2').value;
    product_id[3] = document.getElementById('product_id3').value;
    product_id[4] = document.getElementById('product_id4').value;
    product_id[5] = document.getElementById('product_id5').value;
    product_id[6] = document.getElementById('product_id6').value;
    product_id[7] = document.getElementById('product_id7').value;
    product_id[8] = document.getElementById('product_id8').value;
    var precio_cristal = [];
    precio_cristal[1] = null;
    precio_cristal[2] = null;
    precio_cristal[3] = null;
    precio_cristal[4] = null;
    precio_cristal[5] = null;
    precio_cristal[6] = null;
    precio_cristal[7] = null;
    precio_cristal[8] = null;

    //Precio de cristal
    for(i=1; i<=8; i++)//Soloo contando 8 atributos
    {
        if(product_id[i])
        {
            precio_cristal[i]= document.getElementById('product_id_'+product_id[i]).value;
        } 
        //precio_cristal[i]= document.getElementById(fig).value;
    }
    //Precio de cristal

    //Calculo de todos
    for(i=1; i<=8; i++)//Soloo contando 8 atributos
    {
        if(piezas[i] && ancho[i] && largo[i] && precio_cristal[i])//Solo si se envia nombre y contenido
        { 
            precio = precio+ ((piezas[i]*ancho[i]*largo[i]*precio_cristal[i]) * descuento);
        }
    }
    //Calculo de todos



    //Procesos para cristal
    var barreno_id = document.getElementById('barreno_id').value;
    var barreno_price_a = document.getElementById('barreno_id_'+barreno_id).value;
    var barreno_price = barreno_price_a;
    //Procesos para cristal
    var cristal_price = 0;
    var price = (piezas1*ancho1*largo1*cristal_price) * descuento + barreno_price;
    var price_temp = document.getElementById("price_temp1");


    //IVA
    var iva = precio* 0.16;
    var precio_final = precio+iva;
    //Imprimiendo
    document.getElementById("price_temp2").value = precio;//Hidden input
    price_temp.innerHTML = "$ "+precio;//Displaying price
    if(iva > 0) 
    {
        document.getElementById("temp_2").innerHTML = "IVA(16%): "+iva.toFixed(2);
    };
    if(descuento_a > 0) 
    {
        document.getElementById("temp_1").innerHTML = "Descuento a cliente "+descuento_a+" %";
        $("#temp_1").toggle();
    }else
    {
        $("#temp_1").toggle();
    };
}

function price_hidden() 
{
    var new_price = document.getElementById('price_hidden_0').value;

    document.getElementById("price_hidden_1").value = new_price;
}