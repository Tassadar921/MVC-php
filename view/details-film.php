<div class="row">
    <div class="col-md-12">
        <a href="/home" class="btn btn-danger">Home</a>
    </div>
</div>
<?php if (isset($film)): ?>
    <div class="row">
        <div class="col-md-12">
            <h2><?= $film->getTitle() ?></h2>
            <p><strong>Année de sortie : </strong><?= $film->getYear() ?></p>
            <p><strong>Réalisateur</strong> : <?= $film->getDirector() ?></p>
            <p><strong>Genre</strong> : <?= $film->getGenre() ?></p>
            <p><strong>Scénariste</strong> : <?= $film->getScenarist() ?></p>
            <p><strong>Boîte de prod</strong> : <?= $film->getProdCompany() ?></p>
            <p><strong>Synopsis : </strong><?= $film->getSynopsis() ?></p>
        </div>
    </div>
<?php endif; ?>
