<?php require './templates/task/header.phtml'; ?>

    <div class="container mt-5">
        <?php  foreach($marca as $marc) { ?>
            
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= $marc->img; ?>" class="img-fluid rounded-start" alt="Imagen del Producto">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $marc->nombreProducto; ?></h5>
                            <p class="card-text"><?= $marc->codigo; ?></p>
                            <p class="card-text"><strong>Precio:</strong>$<?= $item->precio; ?></p>
                            <p class="card-text"><strong>Marca:</strong> <?= $item->marca; ?></p>
                            
                            <a href="category" class="btn btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php require_once 'templates/task/footer.phtml'; ?>


    
   