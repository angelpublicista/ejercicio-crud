<?php require ROUTE_APP . "/view/inc/header.php"; ?>

<main class="gn-main gn-main-error">
    <div class="row">
        <div class="col-12 col-md-3">
            <!-- Sidebar menú -->
            <?php require ROUTE_APP . "/view/inc/sidebar-menu.php"; ?>
        </div>

        <div class="col-12 col-md-9">
            <article class="gn-content p-4">
                <div class="container-fluid text-center py-5">
                    <i class="fas fa-exclamation-circle text-danger"></i>
                    <h1 class="text-danger">Error</h1>
                    <h5>Tu solicitud no se pudo procesar</h5>
                    <p class="text-danger"><?php echo $data['message']; ?></p>
                </div>
                </div>
            </article>
        </div>
    </div>
</main>



<?php require ROUTE_APP . "/view/inc/footer.php"; ?>