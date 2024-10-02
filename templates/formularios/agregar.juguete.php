<?php require_once 'templates/header.php'; ?>

<div class="container mt-1">
    <h5>Carga de Producto</h5>
    <form action="insertarJuguete" method="POST">
        <div class="mb-1">
            
            <select class="form-select" id="marca" name="id_marca">
                <?php foreach($marca as $marc): ?>
                    <option value="<?= $marc->id_marca; ?>"><?= $marc->marca; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-1">
            <label for="nombreJuguete" class="form-label"> nombre juguete</label>
            <input type="text" class="form-control" id="nombreJuguete" name="nombreJuguete" required>
        </div>
        <div class="mb-1">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="mb-1">
            <label for="material" class="form-label">material</label>
            <input type="text" class="form-control" id="material" name="material" required>
        </div>
        <div class="mb-1">
            <label for="codigo" class="form-label">codigo</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required>
        </div>
        <div class="mb-1">
            <label for="img" class="form-label">Imagen</label>
            <input type="text" class="form-control" id="img" name="img">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
    </form>
</div>

<?php require_once 'templates/task/footer.phtml'; ?>