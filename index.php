<?php 
session_start();
include "db.php"; 

if(isset($_SESSION['user_id'])){
    $records = $connect_db->prepare("SELECT id, user_email, user_name, user_last_name, user_pass FROM gn_users WHERE id= :id");
    $records->bindParam(":id", $_SESSION['user_id']);
    $records->execute();

    $res = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($res) > 0){
        $user = $res;
    }
}

?>



<?php include "includes/header.php"; ?>

<?php if(isset($user)): ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario creación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="save_task.php" method="POST">
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <input type="text" name="nombre_empresa" class="form-control" placeholder="Nombre empresa" autofocus>
                </div>
                <div class="form-group col-12 col-md-6">
                    <input type="text" name="nombre_cliente" class="form-control" placeholder="Nombre encargado/a">
                </div>
            </div>
            <div class="form-group">
                <input type="email" name="correo" class="form-control" placeholder="Correo electrónico">
            </div>
            <div class="form-group">
                <input type="text" name="dominio" class="form-control" placeholder="Dominio">
                <small>Ej: miempresa.com</small>
            </div>

            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <select name="plan_pagos" class="form-control custom-select">
                        <option selected disabled>Plan de pagos</option>
                        <option value="mensual">Mensual</option>
                        <option value="unico">Único</option>
                        <option value="trimestral">Trimestral</option>
                        <option value="semestral">Semestral</option>
                        <option value="anual">Anual</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <input type="number" name="valor_pago" class="form-control" placeholder="Valor">
                </div>
            </div>

            <div class="form-group">
                <select name="tipo_plan" id="" class="form-control custom-select">
                    <option selected disabled>Tipo plan</option>
                    <option value="starter">Starter</option>
                    <option value="basic">Basic</option>
                    <option value="news_page">News Page</option>
                    <option value="mega_shop">Mega Shop</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="">Fecha inicio</label>
                    <input type="date" name="fecha_inicio" id="" class="form-control">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="">Fecha final</label>
                    <input type="date" name="fecha_final" id="" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <textarea name="observaciones" class="form-control" placeholder="Observaciones"></textarea>
            </div>
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" value="Crear Plan" class="btn btn-primary" name="save_task">
        </form>
      </div>
    </div>
  </div>
</div>

<main class="gn-main">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 p-4">
                <a href="#" class="btn btn-success mb-4" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Nuevo registro</a>
                <?php if(isset($_SESSION["message"])):?>
                    <div class="alert alert-<?php echo $_SESSION["message_type"]; ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION["message"]; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Empresa</th>
                                <th>Dominio</th>
                                <th>Fecha inicio</th>
                                <th>Fecha final</th>
                                <th>Tipo plan</th>
                                <th>Plan pagos</th>
                                <th>Valor pago</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query_task = "SELECT * FROM task";
                                $query_task_sentence = $connect_db->query($query_task);
                            ?>
                            <?php foreach($query_task_sentence as $row):?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombre_empresa']; ?></td>
                                    <td><?php echo $row['dominio'] ?></td>
                                    <td><?php echo $row['fecha_inicio'] ?></td>
                                    <td class="fecha-final"><?php echo $row['fecha_final'] ?></td>
                                    <td class="text-uppercase"><?php echo $row['tipo_plan'] ?></td>
                                    <td class="plan-pagos"><?php echo $row['plan_pagos'] ?></td>
                                    <td class="valor-pago"><?php echo $row['valor_pago'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary" title="Editar"><i class="fas fa-edit"></i></a>
                                        <a href="send_email.php?id=<?php echo $row['id'] ?>" class="btn btn-success" title="Enviar email"><i class="fas fa-envelope"></i></a>
                                        <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary" title="Borrar"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php else: header("Location: login.php") ?>



<?php endif; ?>

<?php include "includes/footer.php"; ?>

    
