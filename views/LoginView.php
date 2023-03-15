<div class="container">
    <div class="text-center mt-5">
        <img src="src/img/iniciosesion.png" alt="Registrame!" style="width: 300px;">
        <h6><span class="badge bg-secondary">Rellene los datos e ingrese:</span></h6>
        <!-- Formulario -->
        <div class="col-md-4 offset-md-4">
            <div class="card my-5">
                <form name="formulario" class="card-body cardbody-color p-lg-5" action="model/LoginController.php" onsubmit="return formularioValidacion()" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="usuario" id="Usuario" placeholder="Usuario">
                        <small class="form-text text-muted">Introduce tu nombre de usuario único.</small>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                        <small class="form-text text-muted">Hey, ¡no compartas tu contraseña con nadie!</small>
                    </div>
                    <div class="form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="mantenersesion">
                        <label class="form-check-label" for="flexSwitchCheckDefault">&nbsp;&nbsp; Mantener sesión iniciada</label>
                    </div>
                    <br>
                    <button class="btn btn-dark">Iniciar sesion</button>
                </form>
                    <!-- Google OAuth -->
                    <?php
                        session_start();
                        include_once('oauth/GoogleOauthConfig.php');
                        $_SESSION['usuario'] = $_POST['name'];
                        if(!isset($_SESSION['access_token']) && !$_SESSION['access_token']) {
                        $google_client = GoogleOauthConfig::instance();
                        $google_auth_url = $google_client->getGoogleAuthUrl();
                    }
                    ?>

                    <!-- Iniciar sesión mediante Google OAuth -->
                    <?php if (isset($google_auth_url)): ?>
                        <form action="<?php echo $google_auth_url; ?>" method="post">
                        <button type="submit" class="btn btn-outline-dark">
                        <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Logueate con Google" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                Continuar con Google
                        </button>
                    </form>
                    <?php else: ?>
                        <?php
                        header('Location: '.'confirmacion.php');
                        ?>
                    <?php endif ?>
                <br>
            </div>
        </div>
        <a href="registro.php"><button type="button" class="btn btn-outline-dark btn-sm">¿Quieres
                registrarte?</button></a>
        <a href="reestablecer.php"><button class="btn btn-outline-dark btn-sm">¿Contraseña olvidada?</button></a>
    </div>
</div>