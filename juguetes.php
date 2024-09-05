<?php
require_once "db_juguetes.php";

function showJuguetes(){
    require_once "templates/header.php";
    ?>
    <!-- main section -->
    <main class="container my-4">
      <section class="juguetes">
        <div class="row">
            <?php 
            $juguetes = getJuguetes();
            foreach($juguetes as $index => $juguete) : 
            ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <img src="<?php echo $juguete->imagen ?>" class="card-img-top" alt="<?php echo htmlspecialchars($juguete->nombre); ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo htmlspecialchars($juguete->nombre); ?></h5>
                  <p class="card-text"><?php echo htmlspecialchars($juguete->edad); ?></p>
                  <a href="juguete/<?php echo $index ?>" class="btn btn-outline-primary">Leer más</a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
        </div>
      </section>
    </main>
    <?php
    require_once "templates/footer.php";
}
function showJugueteById($id){
  require_once "templates/header.php";

  // Verificar si el juguete existe
  $juguete = getJugueteById($id);
  if (!$juguete) {
      echo "<p>Juguete no encontrado.</p>";
      require_once "templates/footer.php";
      return;
  }
  ?>
  <main class="container my-4">
    <section class="juguete">
      <h1><?php echo htmlspecialchars($juguete->nombre); ?></h1>
      <p class="lead mt-3"><?php echo htmlspecialchars($juguete->edad); ?></p>
      <a href="#" class="btn btn-primary">Comprar</a>
      <img class="juguete-image img-fluid" src="<?php echo htmlspecialchars($juguete->imagen); ?>" alt="Imagen del juguete">
    </section>
  </main>
  <?php
  require_once "templates/footer.php";
}

?>
