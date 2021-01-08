<?php
include "db.php";

if(isset($_POST['save_task'])){
    $nombre_empresa = $_POST['nombre_empresa'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $correo = $_POST['correo'];
    $dominio = $_POST['dominio'];
    $plan_pagos = $_POST['plan_pagos'];
    $valor_pago = $_POST['valor_pago'];
    $tipo_plan = $_POST['tipo_plan'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    $observaciones = $_POST['observaciones'];

    $query = "INSERT INTO task(nombre_empresa, nombre_cliente, correo, dominio, plan_pagos, valor_pago, tipo_plan, fecha_inicio, fecha_final, observaciones) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $sentence = $connect_db->prepare($query);
    $sentence->execute([$nombre_empresa, $nombre_cliente, $correo, $dominio, $plan_pagos, $valor_pago, $tipo_plan, $fecha_inicio, $fecha_final, $observaciones ]);

    if(!$sentence){
        die("Ha fallado");
    }

    $_SESSION["message"] = "Cuenta de hosting agregada";
    $_SESSION["message_type"] = "success";

    header("Location: index.php");
    
}