<?php
// fecha actual para el footer
$fecha = new DateTime();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <title>TUDAI - Jugueteria Digital</title>
</head>
<body>

    <!-- main header -->
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="list">
            <img src="img/hugoJuguetesLogo.jpg" alt="logo" width="70px">
        </a>
        <a class="navbar-brand" href="#">Jugueteria</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="inicioSesion">inicioSesion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="cierreSesion">cierreSesion</a>
                </li>
            </ul>
        </div>
    </nav>
</header>