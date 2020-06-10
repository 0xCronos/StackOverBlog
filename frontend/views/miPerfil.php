<?php if (!$userSession->checkSession()) header("location: index.php?pagina=login");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 p-0">
            <?php require_once "views/templates/barraIzquierda.phtml";?>
        </div>
        <div class="col-lg-10 contenedorPrincipal">
            <div class="row">
                <div class="col-lg-4 text-center" style="margin-top: 8%;">
                    <h2 class="text-center h3 pt-2 mb-3">Foto de perfil</h2>
                    <img class="img-fluid fotoPerfil" src="../backend/assets<?php echo $_SESSION['user_image']; ?>" width="400px" height="auto">
                    <p class="lead"><?php echo $_SESSION['user_email']?></p>
                </div>
                <div class="col-lg-8">
                    <h2 class="text-center h3 pt-2"><?php echo $_SESSION['user_fullname']?></h2>
                    <p class="lead text-left bordePerfil">
                        <?php echo $_SESSION['user_description']?>
                    </p>
                    <div class="text-center mb-5 ">
                        <a class="editarPerfil mt-5text-decoration-none" href="index.php?pagina=editarPerfil"><i class=" fas fa-user-edit mr-1"></i>Editar mi perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>