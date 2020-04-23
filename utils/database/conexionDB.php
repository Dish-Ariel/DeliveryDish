<?php
    require $_SERVER['DOCUMENT_ROOT'].'/utils/environment/variables.php';
    
    $db_host = $_SERVER['DB_PROD_HOST'];
    $db_port = $_SERVER['DB_PROD_PORT'];
    $db_user = $_SERVER['DB_PROD_USER'];
    $db_pass = $_SERVER['DB_PROD_PASS'];
    $db_name = $_SERVER['DB_PROD_NAME'];
    
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);

    function ConectarEn($pr_host, $pr_user, $pr_pass, $pr_name, $pr_port) {
        $con = mysqli_connect($pr_host, $pr_user, $pr_pass, $pr_name, $pr_port);
    }

    function ConexionDefault() {
        $con = mysqli_connect($this->db_name, $this->db_port, $this->db_user, $this->db_pass, $this->db_name);
    }

    function cerrarConexion() {
        mysqli_close($con); 
    }
?>