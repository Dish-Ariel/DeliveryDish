<?php 
    //require $_SERVER['DOCUMENT_ROOT'].'/utils/database/conexionDB.php';
    //require $_SERVER['DOCUMENT_ROOT'].'/utils/session/sesion.php';
?>

<?php
    function obtenerComponentesPlantilla($id,$con){
        $textQueryBody = 'SELECT * FROM componentes where idPlantilla = '.$id.'';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $rowB = mysqli_fetch_assoc($sqlBody);
        return $rowB;
    }

    function obtenerRecursosPlantilla($id){
        $textQueryBody = 'SELECT * FROM recursos where idPlantilla = "'.$id.'"';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $rowB = mysqli_fetch_assoc($sqlBody);
        return $rowB;
    }

    function validarEstatusPlantilla($id){
        $textQueryBody = 'SELECT * FROM plantillas where idPlantilla = "'.$id.'" and estatus = "Activo"';
        $sqlBody = mysqli_query($con, $textQueryBody);
        $have_rows = mysqli_num_rows($sqlBody);
        return $have_rows;
    }
?>