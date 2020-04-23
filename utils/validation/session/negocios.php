<?php 
    //require $_SERVER['DOCUMENT_ROOT'].'/utils/database/conexionDB.php';
    //require $_SERVER['DOCUMENT_ROOT'].'/utils/session/sesion.php';
?>

<?php
    function validarNegocioExiste($nombre){
        $textQueryBody = 'SELECT * FROM negocios where nombre = "'.$nombre.'"';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $have_rows = mysqli_num_rows($sqlBody);
        return $have_rows;
    }
    function validarNegocioGiro($nombre,$giro){
        $textQueryBody = 'SELECT * FROM negocios where nombre = "'.$nombre.'" and giro = "'.$gito.'"';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $have_rows = mysqli_num_rows($sqlBody);
        return $have_rows;
    }
    function mostrarEmpleadoEstatus($nombre){
        $textQueryBody = 'SELECT estatus FROM negocios where nombre = "'.$nombre.'"';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $rowB = mysqli_fetch_assoc($sqlBody);
        return $rowB["estatus"];
    }
?>