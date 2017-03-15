$(document).ready(function(){  
var i=1;  


$('#addPro0').click(function(){  

    $('#sp0').append('<tr> <td><input type="text" name="cantidad_p[0]['+i+']" placeholder="Cantidad" class="form-control name_list" /></td> <td><select class="form-control name_list" id="pro_0_'+i+'" onchange="price()" name="process[0]['+i+']"></select></td> <td><select class="form-control name_list" id="p_ss0_'+i+'" onchange="price()" name="p_p[0]['+i+']"></select></td></tr>');
    var ops_pro = $("#process_master > option").clone();
    $('#pro_0_'+i).append(ops_pro);
    var pro_pro = $("#process_m > option").clone();
    $('#p_ss0_'+i).append(pro_pro);

    i++;
});

}); 