<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/utils/database/conexionDB.php';
    require $_SERVER['DOCUMENT_ROOT'].'/utils/session/sesion.php';
    
    $idEmpleado = isset($_SESSION['id_usuario'])?$_SESSION['id_usuario']:-1;
    $textQueryPlantillas = 'SELECT n.nombre as negocio, ps.nombre as visible, ps.modelo, p.nombre as plantilla, ps.idPlantilla FROM empleados e, sucursales s, negocios n, plantillas_sucursales ps, plantillas p
    where e.idSucursal = s.idSucursal 
    and s.idNegocio = n.idNegocio
    and ps.idSucursal = s.idSucursal
    and ps.idPlantilla = p.idPlantilla
    and ps.modelo = "b2b"
    and e.idEmpleado = '.$idEmpleado;

    $sqlPlantillas = mysqli_query($con, $textQueryPlantillas);
    $have_rows = mysqli_num_rows($sqlPlantillas);
    $rowsPlantillas = [];
    if($have_rows){
        while($rowP = mysqli_fetch_assoc($sqlPlantillas)){
            array_push($rowsPlantillas,$rowP);
        }
    }
?>

<?php 
    /*while ($row = mysqli_fetch_assoc($sqlPlantillas)){
        $data[] = $row ; //Add the value to storage.
        foreach($row as $key=>$value) {   
            echo $key."-".$value."<br>"; 
        }
    }*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

    <link data-require="fontawesome@*" data-semver="4.5.0" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css" />
</head>

<body>
    <?php
        require $_SERVER['DOCUMENT_ROOT'].'/utils/views/navegador.php';
        if(isset($_SESSION['id_usuario'])){
    ?>
        <div class="container d-flex justify-content-center">
            <div style="width: 25rem;">
                <br><br>
                <select id="comboCatalogos" class="custom-select" value="">
                    <option disabled selected value hidden>Selecciona un catálogo</option>
                    <?php
                        foreach($rowsPlantillas as $row){
                    ?>
                        <option value="<?php echo $row["idPlantilla"]?>"><?php echo $row["visible"]."(".$row["plantilla"].")"?></option>   
                    <?php 
                        }   
                    ?>
                </select>
                <br><br>
                <a id="btn" class="btn btn-success" href="#">Seleccionar</a>

                <script>
                    $("#btn").on('click',function(){
                        var combo = document.getElementById("comboCatalogos").value;
                        if(combo != ""){
                            window.location='/orden/crear.php?plantilla='+combo;
                        }else{
                            alert("selecciona un catalogo")
                        }
                    });
                </script>
            </div>
        </div>
    <?php
        }else{
            $error_parametrizable_titu = "selecciona un recurso";
            $error_parametrizable_mens = "un recurso válido";
            $error_parametrizable_botn = "Aceptar";
            $error_parametrizable_enlc = "#";
            require $_SERVER['DOCUMENT_ROOT'].'/utils/views/messages/error-acceso-deslogueado.php';
        }
    ?>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

</html>