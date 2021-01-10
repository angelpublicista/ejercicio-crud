<?php
session_start();
include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $res = $connect_db->query($query);
    
    if($res->rowCount() == 1){
        foreach($res as $row){
            $nombre_empresa = $row['nombre_empresa'];
            $nombre_cliente = $row['nombre_cliente'];
            $correo = $row['correo'];
            $dominio = $row['dominio'];
            $plan_pagos = $row['plan_pagos'];
            $valor_pago = $row['valor_pago'];
            $tipo_plan = $row['tipo_plan'];
            $fecha_inicio = $row['fecha_inicio'];
            $fecha_final = $row['fecha_final'];
            $observaciones = $row['observaciones'];

        }
    }   
}

// UPDATE
if(isset($_POST['update'])){
    $id_upt = $_GET['id'];

    $nombre_empresa_upt = $_POST['nombre_empresa'];
    $nombre_cliente_upt = $_POST['nombre_cliente'];
    $correo_upt = $_POST['correo'];
    $dominio_upt = $_POST['dominio'];
    $plan_pagos_upt = $_POST['plan_pagos'];
    $valor_pago_upt = $_POST['valor_pago'];
    $tipo_plan_upt = $_POST['tipo_plan'];
    $fecha_inicio_upt = $_POST['fecha_inicio'];
    $fecha_final_upt = $_POST['fecha_final'];
    $observaciones_upt = $_POST['observaciones'];

    $query_upt = "UPDATE task set nombre_empresa=?, nombre_cliente=?, correo=?, dominio=?, plan_pagos=?, valor_pago=?, tipo_plan=?, fecha_inicio=?, fecha_final=?, observaciones=? WHERE id =?";
    $pdo_statement = $connect_db->prepare($query_upt);
    $pdo_statement->execute([ $nombre_empresa_upt, $nombre_cliente_upt, $correo_upt, $dominio_upt, $plan_pagos_upt, $valor_pago_upt, $tipo_plan_upt, $fecha_inicio_upt, $fecha_final_upt, $observaciones_upt, $id_upt ]);

    $_SESSION["message"] = "Cuenta de hosting actualizada";
    $_SESSION["message_type"] = "success";

    header("Location: index.php");
}
?>

<?php include "includes/header.php"; ?>

<div class="container py-5">
    <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <h4 class="text-center mb-4">EDITAR PLAN</h4>
        <div class="form-group">
            <input type="text" name="nombre_empresa" class="form-control" placeholder="Nombre empresa" value="<?php echo $nombre_empresa; ?>">
        </div>
        <div class="form-group">
            <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre encargado/a" value="<?php echo $nombre_cliente; ?>">
        </div>
        <div class="form-group">
            <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" value="<?php echo $correo; ?>">
        </div>
        <div class="form-group">
            <input type="text" name="dominio" class="form-control" placeholder="Dominio" value="<?php echo $dominio; ?>">
            <small>Ej: miempresa.com</small>
        </div>
        <hr>
        <div class="form-group">
            <select name="plan_pagos" class="form-control custom-select">
                <option disabled>Plan de pagos</option>
                <option <?php if($plan_pagos == "mensual"): ?>selected<?php endif; ?> value="mensual">Mensual</option>
                <option <?php if($plan_pagos == "unico"): ?>selected<?php endif; ?> value="unico">Único</option>
                <option <?php if($plan_pagos == "trimestral"): ?>selected<?php endif; ?> value="trimestral">Trimestral</option>
                <option <?php if($plan_pagos == "semestral"): ?>selected<?php endif; ?> value="semestral">Semestral</option>
                <option <?php if($plan_pagos == "anual"): ?>selected<?php endif; ?> value="anual">Anual</option>
            </select>
        </div>
        <div class="form-group">
            <input type="number" name="valor_pago" class="form-control" placeholder="Valor" value="<?php echo $valor_pago; ?>">
        </div>
        <hr>
        <div class="form-group">
            <select name="tipo_plan" id="" class="form-control custom-select">
                <option disabled>Tipo plan</option>
                <option <?php if($tipo_plan == "starter"): ?>selected<?php endif; ?> value="starter">Starter</option>
                <option <?php if($tipo_plan == "basic"): ?>selected<?php endif; ?> value="basic">Basic</option>
                <option <?php if($tipo_plan == "news_page"): ?>selected<?php endif; ?> value="news_page">News Page</option>
                <option <?php if($tipo_plan == "mega_shop"): ?>selected<?php endif; ?> value="mega_shop">Mega Shop</option>
                <option <?php if($tipo_plan == "admin"): ?>selected<?php endif; ?> value="admin">Admin</option>
            </select>
        </div>
        <hr>
        <div class="form-group">
            <label for="">Fecha inicio</label>
            <input type="date" name="fecha_inicio" id="" class="form-control" value="<?php echo $fecha_inicio ?>">
        </div>
        <div class="form-group">
            <label for="">Fecha final</label>
            <input type="date" name="fecha_final" id="" class="form-control" value="<?php echo $fecha_final ?>">
        </div>
        <hr>
        <div class="form-group">
            <textarea name="observaciones" class="form-control" placeholder="Observaciones" ><?php echo $observaciones ?></textarea>
        </div>
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <input type="submit" value="Actualizar Plan" class="btn btn-success" name="update">
    </form>
</div>

<?php include "includes/footer.php"; ?>