<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 p-0">
            <?php require_once "views/templates/barraIzquierda.phtml"; ?>
        </div>
        <div class="col-lg-10 contenedorPrincipal">
            <div class="container">
                <form class="contactForm" method="POST">
                    <div class="form-group">
                        <label for="fullname">Nombre de usuario (visible para todos)</label>
                        <input type="name" class="form-control" placeholder="Ingresa tu nombre completo o un nombre de usuario" name="contact_fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" placeholder="Ingresa tu correo" name="contact_email">
                    </div>
                    <div class="form-group">
                        <label for="contact_text">Mensaje</label>
                        <textarea class="form-control" rows="3" placeholder="Escribe sobre ti..." name="contact_text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>