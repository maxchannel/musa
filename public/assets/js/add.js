$(document).ready(function(){   
var i=0;
var j=0;  

$('#add').click(function(){   
     ++i; 
     $('#dynamic_field').append('<table class="table table-bordered table-margin"> <tr id="row'+i+'"><td><input type="text" name="cantidad['+i+']" placeholder="Cantidad" class="form-control name_list" /></td> <td><input type="text" name="ancho['+i+']" placeholder="Ancho" class="form-control name_list" /></td> <td><input type="text" name="largo['+i+']" placeholder="Largo" class="form-control name_list" /></td> <td><select class="form-control name_list" id="cristal'+i+'" onchange="price()" name="cristal['+i+']"></select></td> <td><select class="form-control name_list" id="pre_'+i+'" onchange="price()" name="precio['+i+']"></select></td> <td><div type="button" name="" id="addPro'+i+'" class="btn btn-info btn_pros">+</div></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr></table>');
     $('#dynamic_field').append('<table class="table table-bordered table-margin" id="sp'+i+'"></table>  ');
     var pre_pro = $("#precio_master > option").clone();
     $('#pre_'+i).append(pre_pro);
     
     $('#addPro'+i).click(function(){     
         $('#sp'+i).append('<tr> <td><input type="text" name="cantidad_p['+i+']['+j+']" placeholder="Cantidad" class="form-control name_list" /></td> <td><select class="form-control name_list" id="pro_'+i+'_'+j+'" onchange="price()" name="process['+i+']['+j+']"></select></td> <td><select class="form-control name_list" id="p_ss'+i+'_'+j+'" onchange="price()" name="p_p['+i+']['+j+']"></select></td></tr>');
         var ops_pro = $("#process_master > option").clone();
         $('#pro_'+i+'_'+j).append(ops_pro);
         var pro_pro = $("#process_m > option").clone();
         $('#p_ss'+i+'_'+j).append(pro_pro);

         j++;
     });

     var options = $("#cristal_master > option").clone();
     $('#cristal'+i).append(options);
});

$(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
});  

}); 