var blank="http://upload.wikimedia.org/wikipedia/commons/c/c0/Blank.gif";
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_prev')
            .attr('src', e.target.result)
            .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
    else {
      var img = input.value;
        $('#img_prev').attr('src',img).height(200);
    }
    $("#x").show().css("margin-right","10px");
}
$(document).ready(function() {
  $("#x").click(function() {
    $("#img_prev").attr("src",blank);
    $("#x").hide();  
  });
});