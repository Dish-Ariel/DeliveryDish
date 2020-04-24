
<?php
    require $_SERVER['DOCUMENT_ROOT'].'/utils/session/sesion.php';
    
    if(isset($_SESSION['id_usuario'])){
        cerrarSesion();
        header("Location:/index.php");
    }else{
        header("Location:/index.php");
    }
    
?>