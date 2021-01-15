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
                    
                    <a href="<?php echo ROUTE_URL ?>/users/add" class="btn btn-primary mb-3">+ AGREGAR USUARIO</a>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Pos. <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Correo <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Nombre <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Rol <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; foreach($data['users'] as $user): $count = $count + 1; ?>
                                <tr>
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->name; ?></td>
                                    <td><?php echo $user->role_name; ?></td>
                                    <td>
                                        <a href="<?php echo ROUTE_URL ?>/users/update?id=<?php echo $user->id; ?>" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                        <a href="<?php echo ROUTE_URL ?>/users/sendMail?id=<?php echo $user->id; ?>" class="btn btn-success"><i class="far fa-envelope"></i></a>
                                        <a href="<?php echo ROUTE_URL ?>/users/automate?id=<?php echo $user->id; ?>" class="btn btn-warning"><i class="fas fa-magic"></i></a>
                                        <a href="<?php echo ROUTE_URL ?>/users/delete?id=<?php echo $user->id; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                            <?php endforeach; ?>

                            <!-- <tr>
                            <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>@mdo</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </article>
        </div>
    </div>
</main>



<?php require ROUTE_APP . "/view/inc/footer.php"; ?>