<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/css/distr/tailwind.css" rel="stylesheet">
        <title>Connexion</title>
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-3xl font-bold underline">
                    Connexion
                </h1>
            </div>
        </div>
        <form method="post">
            <div class="row">
                <div class="col-md-12">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <p><?php if(isset($message)){echo ($message);}?></p>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="/sign-up" class="btn btn-primary">Pas encore inscrit ?</a>
                </div>
            </div>
        </form>
    </body>
</html>
