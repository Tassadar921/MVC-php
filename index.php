<?php if(isset($_SESSION["username"])): ?>
    <div class="row">
        <div class="col-md-12">
            <a href="/sign-out" class="btn btn-danger">Déconnexion</a>
        </div>
    </div>
<?php endif; ?>
<?php


    require_once 'controller/RoutingController.php';
