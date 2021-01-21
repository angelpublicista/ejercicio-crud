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
                    <form action="<?php echo ROUTE_URL; ?>/users/sendMail/<?php echo $data['id_user']; ?>" method="POST">
                        <div class="form-group">
                            <label for="">De:</label>
                            <input type="email" class="form-control" name="from" value="">
                        </div>

                        <div class="form-group">
                            <label for="">Para</label>
                            <input type="email" class="form-control" name="to" value="<?php echo $data['user']->email; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Asunto</label>
                            <input type="text" class="form-control" name="affair" value="">
                        </div>

                        <div class="form-group">
                            <label for="">Mensaje</label>
                            <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                        </div>

                        <input type="submit" value="Enviar mensaje" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            </article>
        </div>
    </div>
</main>

<?php require ROUTE_APP . "/view/inc/footer.php"; ?>