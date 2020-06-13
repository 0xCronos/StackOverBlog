<?php if ($userSession->checkSession()) header("location: index.php?pagina=inicio"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 p-0">
            <?php require_once "views/templates/barraIzquierda.phtml"; ?>
        </div>
        <div class="col-lg-10 contenedorPrincipal">
            <div class="container">
                <div id="form-row" class="row justify-content-center align-items-center">
                    <div id="form-column" class="col-md-6">
                        <div id="form-box" class="bg-light text-dark">
                            <form method="POST" id="registerForm" enctype="multipart/form-data">
                                <h3 class="text-center text-dark mb-3"> Registrarse</h3>
                                <div class="form-group">
                                    <label for="fullname">Nombre completo (visible para todos)</label>
                                    <input id="fullname" type="text" class="form-control" placeholder="Ingresa tu nombre completo o un alias" name="fullname">
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input id="email" type="email" class="form-control" placeholder="Ingresa tu correo" name="email">
                                </div>


                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input id="registerPassword" type="password" class="form-control" placeholder="Password" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password">Confirma tu contraseña</label>
                                    <input id="confirm_password" type="password" class="form-control" placeholder="Password" name="confirm_password">
                                </div>


                                <div class="input-group mb-3 mt-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Foto de perfil</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control-file" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea id="description" class="form-control" rows="3" placeholder="Escribe sobre ti..." name="description"></textarea>
                                </div>


                                <!-- BOTON -->
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-block btn-lg btn-formulario border-dark" value="Registrarse">
                                    <span class="text-danger" ></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
