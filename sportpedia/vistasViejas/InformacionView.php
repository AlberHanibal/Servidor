<?php
require_once "vistasViejas/MainView.php";

class InformacionView extends MainView
{
    function content()
    {
        $deportista = $this->data["deportista"];
        $deporte = $this->data["deporte"];
        ?>
        <div class="container">
            <div class="row mt-1 mb-1">
                <div class="col-4">
                    <img src="assets/fotos/<?= $deportista->img ?>" class=" img-fluid" alt="<?= $deportista->nombre ?>">
                </div>
                <div class="col-8">
                    <h3><?= $deportista->nombre ?></h3>
                    <p><?= isset($deportista->nombre_local) ? " ($deportista->nombre_local) " : "$deportista->nombre" ?> tiene <?= $deportista->getEdad() ?> años. Compite en <?= $deporte->nombre ?>.</p>
                    <p><?= $deportista->bio ?>.</p>
                </div>
            </div>
            <div class="row mb-1">
                <?php
                        if (isset($deportista->youtube)) {
                ?>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $deportista->youtube ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php
                        }
                ?>

            </div>

        </div>
<?php
    }
}
