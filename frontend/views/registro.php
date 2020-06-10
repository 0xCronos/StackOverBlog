<?php if ($userSession->checkSession()) header("location: index.php?pagina=inicio");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 p-0">
                <?php require_once "views/templates/barraIzquierda.phtml";?>
        </div>
        <div class="col-lg-10 contenedorPrincipal">
            <div class="container">
                <div id="form-row" class="row justify-content-center align-items-center">
                    <div id="form-column" class="col-md-6">
                        <div id="form-box" class="bg-light text-dark">
                            <form id="registration" method="POST" class="registerForm" enctype="multipart/form-data">
                                <h3 class="text-center text-dark mb-3"> Registrarse</h3>
                                <div class="form-group">
                                    <label for="fullname">Nombre completo (visible para todos)</label>
                                    <input id="nombre" type="name" class="form-control"
                                        placeholder="Ingresa tu nombre completo o un alias" name="fullname">
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensaje1">Llenar campo nombre</div>

                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input id="email" type="email" class="form-control" placeholder="Ingresa tu correo" name="email">
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensaje2">LLenar campo correo correctamente</div>


                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensaje3">Llenar campo contraseña</div>
                                <div class="error alert alert-danger" role="alert" id="mensajePw">La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
                                NO puede tener otros símbolos.</div>

                                <div class="form-group">
                                    <label for="image">Foto de perfil</label>
                                    <input type="file" class="form-control-file" name="image" accept="image/*">
                                </div>


                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea id="description" class="form-control" rows="3" placeholder="Escribe sobre ti..."
                                        name="description"></textarea>
                                </div>
                                <div class="error alert alert-danger" role="alert" id="mensaje4">Llenar campo descripcion con maximo 2048 caracteres</div>


                                <!-- BOTON -->
                                <div class="form-group text-center">
                                    <input id="registerResponse" type="submit" class="btn btn-block btn-lg btn-formulario border-dark" value="Registrarse">
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
