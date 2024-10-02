<?php

require './templates/task/header.php';  ?>

    <div class="container mt-3">
        <h2>Carga de marca</h2>

        <form action="agregarMarca" method="POST">
            <div class="mb-1">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="categoria" name="marca" required>
            </div>
            <div class="mb-1">
                <label for="origen" class="form-label">origen</label>
                <input type="text" class="form-control" id="origen" name="origen" required>
            </div>
            <div class="mb-1">
                <label for="caracteristica" class="form-label">caracteristica</label>
                <input type="text" class="form-control" id="origen" name="caracteristica" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar marca</button>
        </form>
    </div>

    <?php

    require_once 'templates/footer.php';