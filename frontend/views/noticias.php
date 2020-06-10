<div ng-controller="controladorNoticias">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 p-0">
                <?php require_once "views/templates/barraIzquierda.phtml";?>
            </div>
            <div class="col-lg-7 contenedorPrincipal">
                <div class="text-right">
                    <input class="mb-3 btn border-dark" type="text" ng-model="buscarNoticia" placeholder="Busqueda">
                </div>
                <?php require_once "views/templates/mostrarNoticias.phtml";?>
            </div>
            <div class="col-lg-3 perfil">
                <?php require_once "views/templates/barraDerecha.phtml";?>
            </div>
        </div>
    </div>
</div>