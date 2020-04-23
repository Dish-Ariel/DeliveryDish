<?php 
    //require $_SERVER['DOCUMENT_ROOT'].'/utils/database/conexionDB.php';
    //require $_SERVER['DOCUMENT_ROOT'].'/utils/session/sesion.php';
?>

<?php
    function validarEmpleadoExiste($correo){
        $textQueryBody = 'SELECT * FROM empleados where correo = "'.$correo.'"';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $have_rows = mysqli_num_rows($sqlBody);
        return $have_rows;
    }
    function validarEmpleadoSesion($correo,$token){
        $textQueryBody = 'SELECT * FROM empleados where correo = "'.$correo.'" and token = "'.$token.'"';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $have_rows = mysqli_num_rows($sqlBody);
        return $have_rows;
    }
    function mostrarEmpleadoEstatus($correo){
        $textQueryBody = 'SELECT estatus FROM empleados where correo = "'.$correo.'"';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $rowB = mysqli_fetch_assoc($sqlBody);
        return $rowB["estatus"];
    }
?>