<div class="container">
    <div class="text-center mt-5">
        <img src="src/img/iniciosesion.png" alt="Registrame!" style="width: 300px;">
        <h6><span class="badge bg-secondary">Rellene los datos e ingrese:</span></h6>
        <!-- Formulario -->
        <div class="col-md-4 offset-md-4">
            <div class="card my-5">
                <form name="formulario" class="card-body cardbody-color p-lg-5" action="?action=login" onsubmit="return formularioValidacion()" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="correo" placeholder="Correo">
                        <small class="form-text text-muted">Introduce tu correo electrónico.</small>
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
                    <button type="submit" class="btn btn-dark">Iniciar sesion</button>
                </form>

                <!-- Acceso mediante Google Oauth -->
                    
                <br>
            </div>
        </div>
        <a href="registro.php"><button type="button" class="btn btn-outline-dark btn-sm">¿Quieres
                registrarte?</button></a>
        <a href="reestablecer.php"><button class="btn btn-outline-dark btn-sm">¿Contraseña olvidada?</button></a>
        <br><br>
    </div>
</div>