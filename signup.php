<?php 

require "db.php";

$message = "";
$message_type = "";

if(!empty($_POST['gn-user-email']) && !empty($_POST['gn-user-pass'])){

    $user_pass = $_POST['gn-user-pass'];
    $user_pass_hash = password_hash($user_pass, PASSWORD_BCRYPT);


    $sql = "INSERT INTO gn_users (user_email, user_name, user_last_name, user_pass) VALUES (:user_email, :user_name, :user_last_name, :user_pass)";
    $statement = $connect_db->prepare($sql);
    $statement->bindParam(":user_email", $_POST['gn-user-email']);
    $statement->bindParam(":user_name", $_POST['gn-user-name']);
    $statement->bindParam(":user_last_name", $_POST['gn-user-last-name']);
    $statement->bindParam(":user_pass", $user_pass_hash);

    if($statement->execute()){
        $message = "Usuario creado con éxito";
        $message_type = "success";
    } else {
        $message = "Hubo un error el crear el usuario";
        $message_type = "danger";
    }
}

include "includes/header.php"; 
?>

<main class="gn-main gn-main__form d-flex flex-column align-items-center justify-content-center bg-dark p-5">
    <form action="signup.php" class="gn-form-signup bg-light p-5 rounded" method="POST">
        <h5 class="text-center text-primary mb-4">REGISTRARME</h5>
        <div class="row">
            <div class="form-group col-12 col-md-6">
                <label for="gn-user-name">Nombre</label>
                <input type="text" class="form-control" id="gn-user-name" name="gn-user-name" required>
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="gn-user-last-name">Apellido</label>
                <input type="text" class="form-control" id="gn-user-last-name" name="gn-user-last-name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="gn-user-email">Correo electrónico</label>
            <input type="email" class="form-control" id="gn-user-email" name="gn-user-email" required>
        </div>
        <div class="form-group">
            <label for="gn-user-pass">Contraseña</label>
            <input type="password" class="form-control" id="gn-user-pass" name="gn-user-pass" required>
        </div>
        <div class="form-group">
            <label for="gn-user-pass-confirm">Confirmar contraseña</label>
            <input type="password" class="form-control" id="gn-user-pass-confirm" required>
        </div>

        <?php if(!empty($message)): ?>
        <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show" role="alert">
            <?php echo $message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <div class="form-group justify-content-between d-flex align-items-center">
            <a href="login.php">Iniciar sesión</a>
            <button class="btn btn-primary" type="submit">REGISTRARME</button>
        </div>
    </form>
</main>

<?php include "includes/footer.php" ?>