<?php require './templates/tareas/header.phtml'; ?>

<div class="container mt-5">
    <?php foreach ($lista as $juguete) { ?>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= $item->img; ?>" class="img-fluid rounded-start" alt="Imagen del Producto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $juguete->nombreProducto; ?></h5>
                        <p class="card-text"><?= $juguete->codigo; ?></p>
                        <p class="card-text"><strong>Precio:</strong>$<?= $juguete->precio; ?></p>
                        <p class="card-text"><strong>Material:</strong> <?= $juguete->material; ?></p>
                        
                        <a href="lista" class="btn btn-primary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php require_once 'templates/tareas/footer.phtml'; ?>