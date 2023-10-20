<div class="row">
    <div class="col-md-12">
        <a href="/home" class="btn btn-danger">Home</a>
    </div>
</div>

<?php if(isset($film)) ?>
<form method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $film->getTitle() ?>">
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis</label>
                <textarea name="synopsis" id="synopsis" class="form-control"><?= $film->getSynopsis() ?></textarea>
            </div>
            <div class="form-group">
                <label for="year">Année</label>
                <input type="text" name="year" id="year" class="form-control" value="<?= $film->getYear() ?>">
            </div>
            <div class="form-group">
                <label for="director">Réalisateur</label>
                <input type="text" name="director" id="director" class="form-control" value="<?= $film->getDirector() ?>">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" value="<?= $film->getGenre() ?>">
            </div>
            <div class="form-group">
                <label for="scenarist">Scénariste</label>
                <input type="text" name="scenarist" id="scenarist" class="form-control" value="<?= $film->getScenarist() ?>">
            </div>
            <div class="form-group">
                <label for="prodCompany">Société de production</label>
                <input type="text" name="prodCompany" id="prodCompany" class="form-control" value="<?= $film->getProdCompany() ?>">
            </div>
        </div>
    </div>
    <p><?php if(isset($message)){echo ($message);}?></p>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>
