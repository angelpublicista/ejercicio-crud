<?php require ROUTE_APP . "/view/inc/header.php"; ?>

Prueba de carga
<br>

<ul>
    <?php foreach($data['articulos'] as $articulo): ?>
        <li><?php echo $articulo->nombre_empresa; ?></li>
    <?php endforeach; ?>
</ul>

<?php require ROUTE_APP . "/view/inc/footer.php"; ?>