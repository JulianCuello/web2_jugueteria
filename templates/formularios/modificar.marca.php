<?php

   require './templates/header.php';?>
    
    <div class="container mt-5">

        <h2>Modificar marca</h2>
        <form action="modificarMarca" method="POST">
            
            <div class="mb-3">
                <input type="hidden" class="form-control" id="id_marca" name="id_marca" value="<?=$marca[0]->id_marca?>">
            </div>
            <div class="mb-3">
                <label for="origen" class="form-label">origen </label>
                <input type="text" class="form-control" id="origen" name="origen" value="<?=$origen[0]->origen;?>"required>
            </div>
            <div class="mb-3">
                <label for="motor" class="form-label">Caracteristica</label>
                <input type="text" class="form-control" id="motor" name="caracteristica" value="<?=$caracteristica[0]->caracteristica;?>"required>
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>

    <?php

    require_once 'templates/footer.php';