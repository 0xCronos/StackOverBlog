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
                            <form class="loginForm" id="loginForm" class="form" method="post">
                                <h3 class="text-center text-dark">Iniciar Sesion</h3>
                                <div class="form-group">
                                    <label for="email" class="text-dark">Correo</label>
                                    <input id="emailInicioSesion" type="email" name="email" class="form-control">
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensajeEmailInicioSesion1">LLenar campo correo.</div>
                                <div class="error alert alert-danger" role="alert" id="mensajeEmailInicioSesion2">Escriba un correo válido.</div>

                                <div class="form-group">
                                    <label for="passsword" class="text-dark">Contraseña</label>
                                    <input type="password" name="password" id="passwordInicioSesion" class="form-control">
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensajePwIniciarSesion1">Escriba su contraseña.</div>

                                <!-- BOTON -->
                                <div class="form-group text-center">
                                    <input type="submit" id="loginResponse" class="btn btn-block btn-lg btn-formulario border-dark mb-3" value="Conectarse">
                                    <span id="respuestaLogin" class="text-danger" ></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
