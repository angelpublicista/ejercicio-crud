<?php require ROUTE_APP . "/view/inc/header.php"; ?>

Prueba de carga
<a href="<?php echo ROUTE_URL ?>/pages/add" class="btn btn-primary">Insertar</a>

<ul>
    <?php foreach($data['users'] as $user): ?>
        <li><?php echo $user->email; ?></li>
    <?php endforeach; ?>
</ul>

<br>

<?php require ROUTE_APP . "/view/inc/footer.php"; ?>