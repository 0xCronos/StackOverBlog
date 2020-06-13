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
                            <form id="loginForm" method="POST">
                                <h3 class="text-center text-dark">Iniciar Sesion</h3>
                                <div class="form-group">
                                    <label for="email" class="text-dark">Correo</label>
                                    <input type="email" name="email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="passsword" class="text-dark">Contraseña</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <!-- BOTON -->
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-block btn-lg btn-formulario border-dark mb-3"">Conectarse</button>
                                    <span id="respuestaLogin" class="text-danger"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
