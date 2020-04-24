<?php
    session_start();
    function iniciarSesionEmpleado($id,$correo,$rol,$token,$estatus) {
        $_SESSION['id_usuario'] = $id;
        $_SESSION['correo_usuario'] = $correo;
        $_SESSION['rol_usuario'] = $tipo;
        $_SESSION['token_usuario'] = $token;
        $_SESSION['estatus_usuario'] = $estatus;
    }
    function cerrarSesion() {
        session_destroy();
    }
?>