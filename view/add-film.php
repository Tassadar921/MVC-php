<form method="post">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Titre du film">
    </div>
    <div class="form-group">
        <label for="synopsis">Synopsis</label>
        <textarea name="synopsis" id="synopsis" class="form-control" placeholder="Synopsis du film"></textarea>
    </div>
    <div class="form-group">
        <label for="year">Année</label>
        <input type="number" name="year" id="year" class="form-control" placeholder="Année de sortie">
    </div>
    <div class="form-group">
        <label for="director">Réalisateur</label>
        <input type="text" name="director" id="director" class="form-control" placeholder="Réalisateur">
    </div>
    <div class="form-group">
        <label for="genre">Genre</label>
        <input type="text" name="genre" id="genre" class="form-control" placeholder="Genre">
    </div>
    <div class="form-group">
        <label for="scenarist">Scénariste</label>
        <input type="text" name="scenarist" id="scenarist" class="form-control" placeholder="Scénariste">
    </div>
    <div class="form-group">
        <label for="prodCompany">Société de production</label>
        <input type="text" name="prodCompany" id="prodCompany" class="form-control" placeholder="Société de production">
    </div>
    <p><?php if(isset($message)){echo ($message);}?></p>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>
