<?php
    session_start();
    function iniciarSesionEmpleado($correo,$token,$negocio) {
        $_SESSION['correo_usuario'] = $correo;
        $_SESSION['negocio_usuario'] = $negocio;
        $_SESSION['token_usuario'] = $token;
    }
    function cerrarSesion() {
        session_destroy();
    }
?>