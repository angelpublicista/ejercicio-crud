<?php require ROUTE_APP . "/view/inc/header.php"; ?>

<div class="container my-5">
    <a href="<?php echo ROUTE_URL ?>/pages" class="btn btn-light">Regresar</a>

    <div class="card card-body bg-light mt-5">
        <h2>Agregar usuarios</h2>
        <form action="<?php echo ROUTE_URL; ?>/pages/add" method="POST">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
                <label for="">Apellido</label>
                <input type="text" class="form-control" name="last_name">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" class="form-control" name="password">
            </div>

            <input type="submit" value="Agregar usuario" class="btn btn-primary">
        </form>
    </div>    
</div>

<?php require ROUTE_APP . "/view/inc/footer.php"; ?>