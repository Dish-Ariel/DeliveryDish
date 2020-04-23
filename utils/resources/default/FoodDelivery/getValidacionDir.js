$(document).ready(function(){
    var isChecked = false;
    $("#varValidator").click(function(){
        var cp = $("#varCp").val();
        var colonia = $("#comboColonia option:selected").text();
        var delegacion = $("#varDelegacion").val();
        var municipio = $("#varMunicipio").val();
        var calle = $("#varCalle").val();

        var rLatitud = $("#varLatitud").val();
        var rLongitud = $("#varLongitud").val();
        var rDistancia = $("#varRangoDistancia").val();
        var rTiempo = $("#varRangoTiempo").val();
        
        var cDireccion = calle + "+" + colonia + "+" + delegacion + "+" + municipio + "+" + cp;
        var cLatitud = 0, cLongitud = 0;
        var restaurante = rLatitud + "+" + rLongitud + "+" + rDistancia + "+" + rTiempo;

        var oDistancia = 0;
        var oTiempo = 0;
        window.varIsValid = false;

        $("#overlay").css("display", "block");
        //document.getElementById("overlay").style.display = "block";
        //alert(cDireccion);
        if(cp && colonia && delegacion && municipio && calle){
        }else{
            alert ("llena los campos: CP, colonia, delegacion, municipio y calle para validar");
            return;
        }

        $.ajax({
            type: "POST",
            contentType: "application/json",     
            url: "/API/v1/direcciones.php",
            data: JSON.stringify({"accion":"obtenerCoordenadas","direccion": cDireccion.replace(/\s/g,"+")}),
            async: false,
            cache: false,
            success: function(data){
                response = JSON.parse(data);
                cLatitud = response.results[0].geometry.location.lat;
                cLongitud = response.results[0].geometry.location.lng;
                //alert(cDireccion + " -" + cLatitud + cLongitud);
            }
        });

        console.log('"{accion":"obtenerDistancias","origen":'+rLatitud+","+rLongitud+',"destino":'+cLatitud+","+cLongitud+',"medio":"driving"}');
        $.ajax({
            type: "POST",
            contentType: "application/json",     
            url: "/API/v1/direcciones.php",
            data: JSON.stringify({"accion":"obtenerDistancias","origen":rLatitud+","+rLongitud,"destino":cLatitud+","+cLongitud,"medio":"driving"}),
            async: false,
            cache: false,
            success: function(data){
                response = JSON.parse(data);
                oDistancia = (response.rows[0].elements[0].distance.value / 1000);
                oTiempo = (response.rows[0].elements[0].duration.value / 60);
                $("#overlay").css("display", "none");
                alert("\nTiempos y distancias de esta entrega...\n\n   Distancia: " +oDistancia.toFixed(2)+ " km Tiempo: " +oTiempo.toFixed(2)+ " min\n\n" + "Tu orden"+ ((oDistancia < rDistancia) && (oTiempo < rTiempo)?" es válida":" no es válida"));
            }
        });
        
        if((oDistancia < rDistancia) && (oTiempo < rTiempo)){
            document.getElementById("varGuardador").disabled = false;
            window.varIsValid = false;
        }else{
            document.getElementById("varGuardador").disabled = true;
            window.varIsValid = true;
        }
    });
});