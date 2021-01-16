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
                    
                    <a href="<?php echo ROUTE_URL; ?>/users/page/1" class="link mb-3 d-inline-block">← Regresar</a>
                    <div class="card card-body bg-light">
                    <form action="<?php echo ROUTE_URL; ?>/users/update/<?php echo $data['id_user']; ?>" method="POST">
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $data['user']->name; ?>">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" name="last_name" value="<?php echo $data['user']->last_name; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $data['user']->email; ?>">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="">Teléfono</label>
                                <input type="number" class="form-control" name="phone" value="<?php echo $data['user']->phone; ?>"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <select name="role" id="role" class="form-control">
                                <option>Selecciona un rol</option>
                                <option <?php if($data['user']->id_role == 1): ?>selected<?php endif; ?> value="1">Administrador</option>
                                <option <?php if($data['user']->id_role == 2): ?>selected<?php endif; ?> value="2">Colaborador</option>
                                <option <?php if($data['user']->id_role == 3): ?>selected<?php endif; ?> value="3">Cliente</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nueva contraseña</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $data['user']->password; ?>">
                        </div>

                        <input type="submit" value="Actualizar usuario" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            </article>
        </div>
    </div>
</main>

<?php require ROUTE_APP . "/view/inc/footer.php"; ?>