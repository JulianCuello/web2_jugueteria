<?php
require_once "db_juguetes.php";
require_once "db_juguetes.php";


class jugueteVista() {
  public function mostrarJuguetes($juguetes) {
      // la vista define una nueva variable con la cantida de tareas
      $count = count($juguetes);

      // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
      require 'templates/lista_tareas.phtml';
  }

  public function mostrarError($error) {
      require 'templates/error.phtml';
  }

}

function mostrarJuguetes(){
    require_once "templates/header.php";
    ?>
    <!-- main section -->
    <main class="container my-4">
      <section class="juguetes">
        <div class="row">
          
            <?php 
            $juguetes = seleccionarJuguetes();
            foreach($juguetes as $index => $juguete) { 
              // Código a ejecutar con cada $juguete
          
        
              echo $juguete->nombreProducto;
              echo $juguete->precio;
              echo $juguete->id_marca;
             
            } 
          
            ?>

            <div class="col-md-4 mb-4">
              <div class="card">
                <img src="<?php echo $juguete->imagen ?>" class="card-img-top" alt="<?php echo htmlspecialchars($juguete->nombreProducto); ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo htmlspecialchars($juguete->nombreProducto); ?></h5>
                  <p class="card-text"><?php echo htmlspecialchars($juguete->precio); ?></p>
                  <a href="juguete/<?php echo $index ?>" class="btn btn-outline-primary">Leer más</a>
                </div>
              </div>
            </div>
            
        </div>
      </section>
    </main>
    <?php
    require_once "templates/footer.php";
}

function mostrarJuguete($id){
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
      <a href="#" class="btn btn-primary">Comprar</a>
      <img class="juguete-image img-fluid" src="<?php echo htmlspecialchars($juguete->imagen); ?>" alt="Imagen del juguete">
    </section>
  </main>
  <?php
  require_once "templates/footer.php";
}

?>
