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

                            <form method="POST" class="editar_perfil" enctype="multipart/form-data">
                                <h3 class="text-center text-dark mb-3"> Actualizar Perfil</h3>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="user_fullname">Nombre completo</label>
                                    <input id="nombreEditarPerfil" type="name" class="form-control" name="user_fullname" value="<?php echo $_SESSION['user_fullname']; ?>">
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensajeNombreEditarPerfil1">Introduzca un nombre.</div>

                                <fieldset disabled>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Correo Electrónico</label>
                                        <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $_SESSION['user_email']; ?>">
                                    </div>
                                </fieldset>
                                <div class="error alert alert-danger" role="alert" id="mensajeEmailEditarPerfil1">LLenar campo Correo correctamente.</div>

                                <div class="form-group">
                                    <label for="user_password">Contraseña</label>
                                    <input id="passwordEditarPerfil" type="password" class="form-control" placeholder="********" name="user_password">
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensajePasswordEditarPerfil1">LLenar campo Contraseña.</div>
                                <div class="error alert alert-danger" role="alert" id="mensajePasswordEditarPerfil2">La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
                                    NO puede tener otros símbolos.
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
                                    <textarea id="descriptionEditarPerfil" class="form-control" rows="5" name="user_description"><?php echo $_SESSION['user_description']; ?></textarea>
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensajeDescriptionEditarPerfil1">LLenar campo Descripción con menos de 2048 caracteres.</div>

                                <!-- BOTON -->
                                <div class="form-group text-center">
                                    <input id="editPerfilButton" type="submit" class="btn btn-block btn-lg btn-formulario border-dark" value="Modificar">
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