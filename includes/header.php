<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Mi app</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand"><img src="assets/img/logo-geniorama-blanco.png" alt="" class="img-brand"> | Agency</a>
        <ul class="nav">
            
            <?php if(isset($_SESSION['user_id']) ): ?>
                <li class="nav-item"><a href="logout.php" class="nav-link">Cerrar sesión</a></li>
                <li class="nav-item"><span class="text-light d-block nav-link">Bienvenid@ <?php echo $user['user_name'] ?></span></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>