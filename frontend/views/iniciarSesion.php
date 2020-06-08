<div>
    <div class="container">
        <div class="row" style="margin-left: 10%;">
            <div class="col-lg-12 contenedorPrincipal">
                <form class="loginForm" method="POST" action="../backend/controllers/loginCtr.php">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" placeholder="Ingresa tu correo..." name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" placeholder="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>