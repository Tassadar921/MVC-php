<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/css/distr/tailwind.css" rel="stylesheet">
        <title>Inscription</title>
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-3xl font-bold underline">
                    Inscription
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
                <div class="col-md-6">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1" placeholder="Password">
                </div>
                <div class="col-md-6">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" id="password2" placeholder="Confirm password">
                </div>
            </div>
            <p><?php if(isset($message)){echo ($message);}?></p>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Inscription</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="/sign-in" class="btn btn-primary">Déjà inscrit ?</a>
                </div>
            </div>
        </form>
    </body>
</html>
