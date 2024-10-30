<div class="last-box row">
    <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
        <div class="partner-box text-center">
            <p>
                <i class="fa fa-map-marker fa-2x sr-icons"></i>
                <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
            </p>
            <h4>Our Main Partners</h4>
            <hr>
            <div class="text-muted text-left">
                <?php foreach ($tresAsociados as $asociado): ?>
                    <ul class="list-inline">
                        <li><img src="images/index/<?= $asociado->getLogo() ?>" class="miAsociado" title="<?= $asociado->getDescripcion() ?>" alt="<?= $asociado->getDescripcion() ?>"></li>
                        <li><?= $asociado->getNombre() ?></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>