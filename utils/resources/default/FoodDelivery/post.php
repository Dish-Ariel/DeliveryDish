<?php
    if(isset($_POST['guardar'])){
        //campos estaticos en el formulario
        $formFields = ["nombre","apellidos","telefonoMovil"];
        //cabecera y cuerpo del query final
        $insertHeaders = [];
        $insertValues = [];
        //query para el formato de escritura de BD
        $textQueryHeader = 'SHOW COLUMNS FROM ordenes WHERE Field != "idOrden" and Field != "estatus" and Field != "orden" and Field != "fechaCreacion"';
        $sqlHeader = mysqli_query($con, $textQueryHeader);
        $have_rows = mysqli_num_rows($sqlHeader);
        //llenado del header...en este campo puedes llamar servicios en backend, para crear validar direcciones, o directo desde el front
        
        //llenado del body
        $arrayBody = array(
            $formFields[0]=>$_POST[$formFields[0]],
            $formFields[1]=>$_POST[$formFields[1]],
            $formFields[2]=>$_POST[$formFields[2]]
        );
        $_POST["body"] = json_encode($arrayBody);
        //llenado de ambos campos para el insert
        if($have_rows > 0){
            while($rowB = mysqli_fetch_assoc($sqlHeader)){
                if(isset($_POST[$rowB['Field']])){
                    array_push($insertHeaders,$rowB['Field']);
                    array_push($insertValues,'"'.mysqli_real_escape_string($con,(strip_tags($_POST[$rowB['Field']],ENT_QUOTES))).'"');
                }
            }
            array_push($insertHeaders,"fechaCreacion");
            array_push($insertValues,'"'.date("Y-m-d H:i:s").'"');
            array_push($insertHeaders,"estatus");
            array_push($insertValues,'"enviado"');
        }else{
        }
        $queryInsert = "INSERT INTO ordenes (".implode(",",$insertHeaders).") VALUES (".implode(",",$insertValues).")";
        $insert = mysqli_query($con, $queryInsert);
        $last_id = $con->insert_id;
        echo $queryInsert."<br>";
        //echo $last_id."<br><br>";
        
        $ordenValor = "1-".Date("ymd").str_pad($last_id, 10, "0", STR_PAD_LEFT);
        $updateQuery = 'UPDATE ordenes SET orden="'.$ordenValor.'" WHERE idOrden='.$last_id;
        $updated = mysqli_query($con, $updateQuery);
        
        //echo $updateQuery."<br>";
        //echo $last_id." - ".$updated."<br>";
        if($insert && $updateQuery){
            echo '<div class="alert alert-success" role="alert">
                Éxito al hacer la compra, con número de orden"'.$ordenValor.'"
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            //header("Location:/ordenes/crearorden?tipo=success&orden=".$ordenValor);
        }else{
            echo '<div class="alert alert-danger" role="alert">
                Error al hacer la compra, con número de orden"'.$ordenValor.'"
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }   
    }
?>