<div ng-controller="controladorNoticias">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 p-0">
                <?php require_once "views/templates/barraIzquierda.phtml";?>
            </div>
            <div class="col-lg-7 contenedorPrincipal">
                <?php require_once "views/templates/mostrarNoticias.phtml";?>
            </div>
            <div class="col-lg-3 contenedorPrincipal perfil">
                <?php require_once "views/templates/perfil.phtml";?>
            </div>
        </div>
    </div>
</div>