$(document).ready(function(){
    $("#varCp").focusout(function(){
        var myObj, txt = "", cp = $("#varCp").val();
        document.getElementById("varColonia").innerHTML = '<select id="comboColonia" class="custom-select" required><option disabled value="">cp erroneo para buscar colonias</option></select>';
        document.getElementById("campo_delegacion").innerHTML = '<label>Delegacion</label><input id="varDelegacion" type="text" class="form-control" name="delegacion" value="" readonly="readonly">';
        document.getElementById("campo_municipio").innerHTML = '<label>Municipio</label><input id="varMunicipio"type="text" class="form-control" name="municipio" value="" readonly="readonly">';
            
        $.get("https://4sauzzhveg.execute-api.us-east-1.amazonaws.com/Prod/edomuncolonias/"+cp , function(data, status){
            if(status=="success"){
                myObj = JSON.parse(JSON.stringify(data, undefined, 2));
                txt += '<select id="comboColonia" class="custom-select" required>';
                txt += '<option></option>';
                for (var key in data.estadoMunColonias.colonias) {
                    txt += "<option value="+data.estadoMunColonias.colonias[key].ccolonia+">" + data.estadoMunColonias.colonias[key].colonia + "</option>";
                }
                txt += "</select>";
                document.getElementById("varColonia").innerHTML = txt;

                document.getElementById("campo_delegacion").innerHTML = '<label>Delegacion</label><input id="varDelegacion" type="text" class="form-control" name="delegacion" value="'+data.estadoMunColonias.estadoMun.delmun+'" readonly="readonly" required>';
                document.getElementById("campo_municipio").innerHTML = '<label>Municipio</label><input id="varMunicipio" type="text" class="form-control" name="municipio" value="'+data.estadoMunColonias.estadoMun.estado+'" readonly="readonly" required>';
            }else{
                alert("Error con las direcciones");
            }
        });

    });
});