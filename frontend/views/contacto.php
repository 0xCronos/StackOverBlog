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
                            <form id="contactForm" method="POST">

                                <h3 class="text-center text-dark">Contacto</h3>

                                <div class="form-group">
                                    <label for="contact_fullname">Nombre completo</label>
                                    <input id="nombreContacto" type="text" class="form-control" placeholder="Ingresa tu nombre completo" name="contact_fullname">
                                </div>

                                <div class="form-group">
                                    <label for="contact_email">Correo electrónico</label>
                                    <input id="emailContacto" type="email" class="form-control" placeholder="Ingresa tu correo" name="contact_email">
                                </div>
                                
                                <div class="form-group">
                                    <label for="contact_text">Mensaje</label>
                                    <textarea id="mensajeContacto" class="form-control" rows="3" placeholder="Escribe sobre ti..." name="contact_text"></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-block btn-lg btn-formulario border-dark" value="Enviar">
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
