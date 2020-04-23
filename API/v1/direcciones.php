<?php
    require $_SERVER['DOCUMENT_ROOT'].'/utils/environment/variables.php';
    $google_key = $_SERVER['GOOGLE_KEY'];
    
    if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
        $error = ["error"=>"Solo disponible con POST requqest"];
        echo json_encode($error);
        return;
    }
    
    $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
    if (stripos($content_type, 'application/json') === false) {
        $error = ["error"=>"Solo POST requqest con formato application/json"];
        echo json_encode($error);
        return;
    }
    
    $body = file_get_contents("php://input");
    $characters = json_decode($body);

    if(isset($characters->accion) && $characters->accion=="obtenerCoordenadas"){
        $direccion = $characters->direccion;
        $api = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$direccion."&key=".$google_key);
        $data = json_decode($api);
        echo json_encode($data);

    }else if(isset($characters->accion) && $characters->accion=="obtenerDistancias"){
        $origen = $characters->origen;
        $destino = $characters->destino;
        $medio = isset($characters->medio)?$characters->medio:"driving";
        $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origen."&destinations=".$destino."&mode=".$medio."&key=".$google_key);
        $data = json_decode($api);
        echo json_encode($data);
    }else{
        $error = ["error"=>"campo accion omitido, o con valores invalidos"];
        echo json_encode($error);
    } 
?>