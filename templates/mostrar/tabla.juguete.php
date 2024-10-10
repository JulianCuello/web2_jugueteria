<?php
require 'templates/header.php';   
?>
        <table class="table">
            <thead>
                <tr>
                    <th>id_juguete</th>
                    <th>nombreProducto</th>
                    <th>precio</th>
                    <th>Precio</th>
                    <th>Material</th>
                    <th>codigo</th>
                    <th>img</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($juguete as $item) { ?>      
                    <tr>
                        <td><?php echo $juguete->id_juguete; ?></td>
                        <td><?php echo $juguete->nombreProducto; ?></td>
                        <td><?php echo $juguete->precio; ?></td>
                        <td><?php echo $juguete->material; ?></td>
                        <td><?php echo $juguete->codigo; ?></td>
                        <td><img src="<?php echo $item->img; ?>"class="imagen"></td>
                        <td><?php echo $item->juguete; ?></td>
                        <td>
                            <a href="jugueteId/<?php echo $juguete->id_juguete; ?>" class="btn btn-primary">Ver Producto</a>
                            <a href="eliminarJuguete/<?php echo $juguete->id_juguete; ?>" type="button" class='btn btn-danger ml-auto'>Eliminar</a>
                            <a href="actualizarJuguete/<?php echo $juguete->id_juguete; ?>" type="button" class='btn btn-success ml-auto'>Modificar</a>
                        </td>
                        </tr>      
                <?php } ?>
            </tbody>
        </table>
        <?php
        require './templates/footer.php;