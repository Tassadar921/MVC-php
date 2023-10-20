<div class="row">
    <div class="col-md-12">
        <a href="/add-film" class="btn btn-success">Ajouter un film</a>
    </div>
</div>
<?php
if(isset($films))
foreach ($films as $film): ?>
    <div class="row">
        <div class="col-md-12">
            <h2><?= $film->getTitle() ?></h2>
            <p><?= $film->getYear() ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="edit-film/<?=$film->getId() ?>" class="btn btn-primary">Modifier</a>
        </div>
        <div class="col-md-4">
            <a href="delete-film/<?=$film->getId() ?>" class="btn btn-danger">Supprimer</a>
        </div>
        <div class="col-md-4">
            <a href="details-film/<?=$film->getId() ?>" class="btn btn-info">Détails</a>
        </div>
    </div>
<?php endforeach; ?>
