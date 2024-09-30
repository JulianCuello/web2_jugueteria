<?php

require_once 'app/controlador/juguete.controlador.php';

class jugueteVista {

    public function mostrarError($error) {
        echo "<h2> $error</h2>";
    }
  
    function mostrarJuguetes($juguetes) {
        require_once "templates/header.php";
        ?>
        <!-- main section -->
        <main class="container my-4">
            <section class="juguetes">
                <div class="row">
                    <?php 
                    foreach ($juguetes as $index => $juguete) { 
                    ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="<?php echo htmlspecialchars($juguete->img); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($juguete->nombreProducto); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($juguete->nombreProducto); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($juguete->precio); ?></p>
                                    <a href="juguete/<?php echo $index; ?>" class="btn btn-outline-primary me-2">Leer más</a>
                                    <a href="actualizarJuguete/<?php echo $juguete->id_juguete; ?>" class='btn btn-success me-2'>Modificar</a>
                                    <a href="eliminarJuguete/<?php echo $juguete->id_juguete; ?>" class='btn btn-danger'>Eliminar</a>
                                </div>
                            </div>
                        </div>
                    <?php 
                    } 
                    ?>
                </div>
            </section>
        </main>
        <?php
        require_once "templates/footer.php";
    }

    function mostrarJuguete($id) {
        require_once "templates/header.php";

        // Verificar si el juguete existe
        $juguete = seleccionarJuguete($id);
        if (!$juguete) {
            echo "<p>Juguete no encontrado.</p>";
            require_once "templates/footer.php";
            return;
        }

        ?>
        <main class="container my-4">
            <section class="juguete">
                <div class="card" style="width: 18rem;">
                    <h1><?php echo htmlspecialchars($juguete->nombreProducto); ?></h1>
                    <p class="lead mt-3"><?php echo htmlspecialchars($juguete->precio); ?></p>
                    <a href="#" class="btn btn-primary mb-2">Comprar</a>
                    <img class="juguete-image img-fluid" src="<?php echo htmlspecialchars($juguete->img); ?>" alt="Imagen del juguete">
                </div>
            </section>
        </main>
        <?php
        require_once "templates/footer.php";
    }
}
