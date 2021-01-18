<?php require ROUTE_APP . "/view/inc/header.php"; ?>

<main class="gn-main">
    <!-- Modal import users -->
    <div class="modal fade" id="import-users" tabindex="-1" aria-labelledby="import-users--abel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Importar Usuarios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Selecciona un archivo de excel (.xls) para importar usuarios</p>
            <form action="">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_users"
                    id="file_users" accept=".xls,.xlsx" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Seleccionar archivo</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3">
            <!-- Sidebar menú -->
            <?php require ROUTE_APP . "/view/inc/sidebar-menu.php"; ?>
        </div>

        <div class="col-12 col-md-9">
            <article class="gn-content p-4">
                <div class="container-fluid">
                    <h1 class="mb-4 gn-content-title"><?php echo $data['title']; ?></h1>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <p>Mostrando <b><?php echo $data['show_results'] ?></b> de <?php echo $data['rows']; ?> resultados</p>
                        <div class="buttons-group  mb-3">
                            <a href="<?php echo ROUTE_URL ?>/users/add" class="btn btn-primary mr-2"><i class="fas fa-plus-circle mr-1"></i> Agregar usuario</a>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#import-users"><i class="fas fa-file-csv mr-1"></i> Importar usuarios</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Correo <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Nombre <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Rol <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; foreach($data['users'] as $user): $count = $count + 1; ?>
                                <tr>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->name . " " . $user->last_name; ?></td>
                                    <td><?php echo $user->role_name; ?></td>
                                    <td>
                                        <a href="<?php echo ROUTE_URL ?>/users/update/<?php echo $user->id; ?>" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                        <a href="<?php echo ROUTE_URL ?>/users/sendMail/<?php echo $user->id; ?>" class="btn btn-success"><i class="far fa-envelope"></i></a>
                                        <a href="<?php echo ROUTE_URL ?>/users/delete/<?php echo $user->id; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            
                            <li class="page-item <?php if($data["current_page"] < 2): ?>disabled <?php endif; ?>">
                            <a class="page-link" href="<?php echo $data["current_page"] - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            </li>
                            
                            
                            <?php for($i=0;$i<$data['pages'];$i++): ?>
                                <li class="page-item <?php if($data["current_page"] == $i + 1): ?> active<?php endif; ?>"><a class="page-link" href="<?php echo ROUTE_URL ?>/users/page/<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                            <?php endfor; ?>
                            
                            
                                <li class="page-item <?php if($data["current_page"] >= $data["pages"]): ?>disabled<?php endif; ?>">
                                <a class="page-link" href="<?php echo $data["current_page"] + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>
                            
                        </ul>
                    </nav>
                </div>
            </article>
        </div>
    </div>
</main>



<?php require ROUTE_APP . "/view/inc/footer.php"; ?>