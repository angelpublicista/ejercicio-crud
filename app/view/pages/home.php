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
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Mi título</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Mi título</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Mi título</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</main>



<?php require ROUTE_APP . "/view/inc/footer.php"; ?>