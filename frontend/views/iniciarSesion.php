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
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="passsword" class="text-dark">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <!-- BOTON -->
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-block btn-lg btn-formulario border-dark" value="Conectarse">
                                    <span class="text-danger" id="loginResponse"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>