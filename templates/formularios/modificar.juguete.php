<?php
require_once 'templates/header.php';  ?>

<div class="container mt-1" >
    <h2>Modificacion de Producto</h2>
    <form action="modificarJuguete" method="POST">
        <div class="mb-1">
            
            <select class="form-select" id="juguete" name="id_juguete">
                <?php foreach ($marca as $marc) { ?>
                    <option value="<?= $marc->id_marca; ?>"><?= $marc->marca; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-1">
            <input type="hidden" class="form-control" id="id_juguete" name="idProducto" value="<?= $item[0]->id_juguete; ?>" required>
        </div>
        <div class="mb-1">
            <label for="nombreProducto" class="form-label">nombre producto</label>
            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="<?= $item[0]->nombreProducto; ?>">
        </div>
        <div class="mb-1">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="<?= $item[0]->precio; ?>" required>
        </div>
        <div class="mb-1">
            <label for="material" class="form-label">material</label>
            <input type="text" class="form-control" id="material" name="material" value="<?= $item[0]->material; ?>" required>
        </div>
        <div class="mb-1">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" class="form-control" id="codigo" name="codigo" value="<?= $item[0]->codigo; ?>" required>
        </div>
        <div class="mb-1">
            <label for="img" class="form-label">Imagen</label>
            <input type="text" class="form-control" id="img" name="img" value="<?= $item[0]->img; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
</div>

<?php

require_once 'templates/task/footer.phtml';