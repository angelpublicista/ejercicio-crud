<?php require ROUTE_APP . "/view/inc/header.php"; ?>

<main class="gn-main">
    <div class="row">
        <div class="col-12 col-md-3">
            <!-- Sidebar menú -->
            <?php require ROUTE_APP . "/view/inc/sidebar-menu.php"; ?>
        </div>

        <div class="col-12 col-md-9">
            <article class="gn-content p-4">
                <div class="container-fluid">
                    <h1 class="mb-4 gn-content-title"><?php echo $data['title']; ?></h1>
                    <div class="card card-body bg-light">
                    <form action="<?php echo ROUTE_URL; ?>/users/add" method="POST">
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="">Teléfono</label>
                                <input type="number" class="form-control" name="phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>Selecciona un rol</option>
                                <option value="1">Administrador</option>
                                <option value="2">Colaborador</option>
                                <option value="3">Cliente</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <input type="submit" value="Agregar usuario" class="btn btn-primary">
                    </form>
                </div>
                </div>
            </article>
        </div>
    </div>
</main>



<?php require ROUTE_APP . "/view/inc/footer.php"; ?>