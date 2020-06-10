<?php 
if(isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
    $user_profile = $_GET['id'];
}else{
    header("location: index.php?pagina=miPerfil");
}
?>

<div class="container-fluid" ng-controller="controladorPerfil" ng-init="loadProfile(<?php echo $user_profile?>)">
    <div class="row">
        <div class="col-lg-2 p-0">
            <?php require_once "views/templates/barraIzquierda.phtml"; ?>
        </div>
        <div class="col-lg-10 contenedorPrincipal">
            <div class="row">
                <div class="col-lg-4 text-center" style="margin-top: 10%;">
                    <img class="img-fluid fotoPerfil" src="../backend/assets{{userData.user_image}}" width="400px" height="auto">
                    <p class="lead">Rol actual: {{userData.role_name}}</p>
                </div>
                <div class="col-lg-8">
                    <h2 class="text-center h3 pt-2">{{userData.user_fullname}}</h2>
                    <p class="lead text-left bordePerfil">
                        {{userData.user_description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>