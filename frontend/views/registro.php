<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 p-0">
                <?php require_once "views/templates/barraIzquierda.phtml";?>
        </div>
        <div class="col-lg-10 contenedorPrincipal">
            <div class="container">
                <form method="POST" action="../backend/controllers/registerCtr.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullname">Nombre de usuario (visible para todos)</label>
                        <input type="name" class="form-control"
                            placeholder="Ingresa tu nombre completo o un nombre de usuario" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" placeholder="Ingresa tu correo" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto de perfil</label>
                        <input type="file" class="form-control-file" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" rows="3" placeholder="Escribe sobre ti..."
                            name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarme</button>
                </form>
            </div>
        </div>
    </div>
</div>