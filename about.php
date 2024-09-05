<?php 
require_once 'db_juguetes.php';

function showAbout($id = null) {
    include_once 'templates/header.php'; ?>

    <main class="container mt-5 bg-beige">
        <?php 
            // obtengo el arreglo de developers
            $developers = getDevelopers();
        ?>

        <h1>Nuestros vendedores</h1>

        <div class="row">
            <div class="col">
                <div class="list-group">
                    <?php foreach ($developers as $developer) { ?>
                        <a class="list-group-item list-group-item-action" href="about/<?php echo $developer->id?>">
                            <?php echo $developer->name?>
                        </a>
                    <?php }?>
                </div>
            </div>

            <div class="col">
                <?php
                    // se fija si existe el parametro y en ese caso lo busca e imprime
                    if (!empty($id)) {
                        $developer = getDeveloperById($id);
                ?>
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="images/avatar.png">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $developer->name ?></h4>
                            <h5 class="card-subtitle"><?php echo $developer->role ?></h5>
                            <p><?php echo $developer->email ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <?php include_once 'templates/footer.php'; 
}
