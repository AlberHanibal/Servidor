<?php
require_once "vistasViejas/MainView.php";

class ListadoView extends MainView
{

    function content()
    {
        ?>
        <div class="row row-cols-1 row-cols-md-2">
            <?php
                    // $this->data ha sido inyectado en el método render
                    foreach ($this->data["deportistas"] as $deportista) {
                        ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="assets/fotos/<?= $deportista->img ?>" class="card-img" alt="<?= $deportista->nombre ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $deportista->nombre ?></h5>
                                <p class="card-text"><?= isset($deportista->nombre_local) ? " ($deportista->nombre_local) " : "$deportista->nombre" ?> tiene <?= $deportista->getEdad() ?> años. Compite en <?= $this->data["deportes"][$deportista->id_deporte]->nombre ?>.</p>
                                <p class="card-text"><small class="text-muted"><a href="index.php?controller=informacion&id=<?= $deportista->id ?>">Para más información</a></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                    }
                    ?>
        </div>
<?php
    }
}
