<?php if (!$userSession->checkSession()) header("location: index.php?pagina=login"); ?>
<div class="container-fluid" ng-controller="modificarPerfil">
    <div class="row">
        <div class="col-lg-2 p-0">
            <?php require_once "views/templates/barraIzquierda.phtml"; ?>
        </div>
        <div class="col-lg-10 contenedorPrincipal">
            <div class="container">
                <div id="form-row" class="row justify-content-center align-items-center">
                    <div id="form-column" class="col-md-6">
                        <div id="form-box" class="bg-light text-dark">

                            <form method="POST" id="editProfile" enctype="multipart/form-data">
                                <h3 class="text-center text-dark mb-3"> Actualizar Perfil</h3>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="user_fullname">Nombre completo</label>
                                    <input type="text" class="form-control" name="user_fullname" value="<?php echo $_SESSION['user_fullname']; ?>">
                                </div>

                                <fieldset disabled>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Correo Electrónico</label>
                                        <input type="text" name="user_email" id="disabledTextInput" class="form-control" value="<?php echo $_SESSION['user_email']; ?>">
                                    </div>
                                </fieldset>

                                <div class="form-group">
                                    <label for="user_password">Nueva contraseña<br><span class="small">(dejar en blanco para no cambiar)</span></label>
                                    <input id="editPassword" type="password" class="form-control" placeholder="********" name="user_password">
                                </div>

                                <div class="form-group">
                                    <label for="user_confirm_password">Confirmar contraseña</label>
                                    <input type="password" class="form-control" placeholder="********" name="user_confirm_password">
                                </div>

                                <!-- imagen noticia -->
                                <div class="input-group mb-5 mt-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Foto de perfil</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control-file" name="user_image" accept="image/*">
                                        <label class="custom-file-label" for="user_image"></label>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <img src="../backend/assets<?php echo $_SESSION['user_image']; ?>" class="fotoEditarPerfil">
                                </div>

                                <div class="form-group mt-2">
                                    <label for="user_description">Descripción</label>
                                    <textarea class="form-control" rows="5" name="user_description"><?php echo $_SESSION['user_description']; ?></textarea>
                                </div>

                                <!-- BOTON -->
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-block btn-lg btn-formulario border-dark" value="Modificar">
                                    <span class="text-danger"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>