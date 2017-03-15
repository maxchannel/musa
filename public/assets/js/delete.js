    $('#myTab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
    $(".delete-button").click(function(){
        if (!confirm("Confirmas que quiere Eliminar?")){
          return false;
        }
    });