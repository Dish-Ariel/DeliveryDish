$(document).ready(function(){
    $("#varColonia").change(function(){
        var colonia = document.getElementById("comboColonia").value;
        var cp = document.getElementById("varCp").value;
        $.ajax({
            type: "POST",
            contentType: "application/json",     
            url: "https://a7n9wlt4ci.execute-api.us-east-1.amazonaws.com/Dev/getcallesbycpcolonia",
            data: JSON.stringify({"cp":cp,"ccolonia":colonia}),
            success: function(data){
                var txt = '<select id="comboCalle" class="custom-select" name="calle" required>';
                txt += '<option></option>';
                for (var key in data.direcciones) {
                    txt += "<option>" + data.direcciones[key].vialidad + "</option>";
                }
                txt += "</select>";
                document.getElementById("varCalle").innerHTML = txt;
                //alert("cambio");
                var res=$("#comboColonia option:selected").text();
                $('#hiddenColonia').val(res);
            }
        });
    });
});