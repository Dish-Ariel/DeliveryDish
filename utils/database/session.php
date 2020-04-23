<?php
    session_start();
    function iniciarSesion($id,$name,$rol,$estatus,$restaurante) {
        $_SESSION['id_usuario'] = $id;
        $_SESSION['nombre_usuario'] = $name;
        $_SESSION['status_usuario'] = $estatus;
        $_SESSION['rol_usuario'] = $rol;
        $_SESSION['restaurante_usuario'] = $restaurante;
    }
    function cerrarSesion() {
        session_destroy();
    }
?>