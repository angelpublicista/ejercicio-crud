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
                    <a href="<?php echo ROUTE_URL; ?>/plans/page/1" class="link mb-3 d-inline-block">← Regresar</a>
                    <div class="card card-body bg-light">
                    <form action="<?php echo ROUTE_URL; ?>/plans/add" method="POST">
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="">Nombre plan</label>
                                <input type="text" class="form-control" name="plan_name">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="">Valor Mensual (Base)</label>
                                <input type="number" class="form-control" name="plan_value_base_month">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="">Base dcto por año(cliente %)</label>
                                <input type="number" class="form-control" name="plan_discount_base_year_customer">
                            </div>

                            <div class="form-group col-12 col-md-6">
                                <label for="">Base dcto por año(aliado %)</label>
                                <input type="number" class="form-control" name="plan_discount_base_year_ally">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-4">
                                <label for="">Tamaño en disco (MB)</label>
                                <input type="number" class="form-control" name="plan_disk_space">
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="">Ancho de banda (MB)</label>
                                <input type="number" class="form-control" name="plan_bandwidth">
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="">Límite cuentas de correo</label>
                                <input type="number" class="form-control" name="plan_num_emails">
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="">Límite bases de datos</label>
                                <input type="number" class="form-control" name="plan_num_db">
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="">Límite dominios</label>
                                <input type="number" class="form-control" name="plan_num_domains">
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label for="">Límite subdominios</label>
                                <input type="number" class="form-control" name="plan_num_subdomains">
                            </div>
                        </div>

                        <input type="submit" value="Agregar plan" class="btn btn-primary">
                    </form>
                </div>
                </div>
            </article>
        </div>
    </div>
</main>



<?php require ROUTE_APP . "/view/inc/footer.php"; ?>