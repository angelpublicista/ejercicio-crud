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
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <p>Mostrando <b><?php echo $data['show_results'] ?></b> de <?php echo $data['rows']; ?> resultados</p>
                        <div class="buttons-group  mb-3">
                            <a href="<?php echo ROUTE_URL ?>/plans/add" class="btn btn-primary mr-2"><i class="fas fa-plus-circle mr-1"></i> Agregar plan</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre plan <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Espacio en disco <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Ancho de banda <div class="sort-buttons d-inline float-right"><i class="fas fa-long-arrow-alt-down"></i> <i class="fas fa-long-arrow-alt-up"></i></div></th>
                                <th scope="col">Num. Correos</th>
                                <th scope="col">Num. Bases de datos</th>
                                <th scope="col">Num. Dominios</th>
                                <th scope="col">Num. Subdominios</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; foreach($data['plans'] as $plan): $count = $count + 1; ?>
                                <tr>
                                    <td><?php echo $plan->plan_name; ?></td>
                                    <td><?php echo $plan->plan_disk_space; ?></td>
                                    <td><?php echo $plan->plan_bandwidth; ?></td>
                                    <td><?php echo $plan->plan_num_emails; ?></td>
                                    <td><?php echo $plan->plan_num_db; ?></td>
                                    <td><?php echo $plan->plan_num_domains; ?></td>
                                    <td><?php echo $plan->plan_num_subdomains; ?></td>
                                    <td><?php echo $plan->plan_state; ?></td>
                                    <td>
                                        <a href="<?php echo ROUTE_URL ?>/plans/update/<?php echo $user->id; ?>" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                        <a href="<?php echo ROUTE_URL ?>/plans/delete/<?php echo $user->id; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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
                                <li class="page-item <?php if($data["current_page"] == $i + 1): ?> active<?php endif; ?>"><a class="page-link" href="<?php echo ROUTE_URL ?>/plans/page/<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
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