<div class="container p-5 bg-faded">
    <div class="row" style="margin-left: 10%;">
        <div class="col-lg-12 contenedorPrincipal">
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