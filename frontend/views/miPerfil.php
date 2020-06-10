<?php if (!$userSession->checkSession()) header("location: index.php?pagina=login");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 p-0">
            <?php require_once "views/templates/barraIzquierda.phtml";?>
        </div>
        <div class="col-lg-10 contenedorPrincipal">
            <div class="row">
                <div class="col-lg-4 text-center" style="margin-top: 10%;">
                    <img class="img-fluid fotoPerfil" src="../backend/assets<?php echo $_SESSION['user_image']; ?>" width="400px" height="auto">
                    <p class="lead"><?php echo $_SESSION['user_email']?></p>
                </div>
                <div class="col-lg-8">
                    <h2 class="text-center h3 pt-2"><?php echo $_SESSION['user_fullname']?></h2>
                    <p class="lead text-left bordePerfil">
                        <?php echo $_SESSION['user_description']?>
                    </p>
                    <a class="mt-5" href="index.php?pagina=editarPerfil">Click acá para editar</a>
                </div>
            </div>
        </div>
    </div>
</div>