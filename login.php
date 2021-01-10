<?php 

session_start();

if(isset($_SESSION['user_id'])){
    header("Location: index.php");
}

require "db.php";

if(!empty($_POST['gn-user-email']) && !empty($_POST['gn-user-pass'])){
    $records = $connect_db->prepare('SELECT id, user_email, user_pass FROM gn_users WHERE user_email = :email');
    $records->bindParam(":email", $_POST['gn-user-email']);
    $records->execute();

    $res = $records->fetch(PDO::FETCH_ASSOC);

    $message = "";

    if($res){
        if(count($res) > 0 && password_verify($_POST['gn-user-pass'], $res['user_pass'])){
            $_SESSION['user_id'] = $res['id'];
    
            header('Location: index.php');
        } else {
            $message = "Lo sentimos, parece que el usuario o contraseña no coinciden";
        }
    } else {
        $message = "Lo sentimos, parece que el usuario o contraseña no coinciden";
    }
    
}

include "includes/header.php";

?>

<main class="gn-main gn-main__form d-flex flex-column align-items-center justify-content-center bg-dark">
    <form action="login.php" method="POST" class="gn-form-login bg-light p-5 rounded">
        <h5 class="text-center text-primary mb-4">INICIAR SESIÓN</h5>
        <div class="form-group">
            <label for="gn-user-name">Usuario</label>
            <input type="email" class="form-control" id="gn-user-email" name="gn-user-email">
        </div>
        <div class="form-group">
            <label for="gn-user-pass">Contraseña</label>
            <input type="password" class="form-control" id="gn-user-pass" name="gn-user-pass">
        </div>
        <?php if(!empty($message)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $message; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <div class="form-group justify-content-between d-flex align-items-center">
            <a href="signup.php">Registrarme</a>
            <button class="btn btn-primary" type="submit">INGRESAR</button>
        </div>
    </form>
</main>

<?php include "includes/footer.php" ?>