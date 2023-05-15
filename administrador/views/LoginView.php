<div class="container">
    <div class="text-center mt-5">
        <img src="../src/img/favicon.png" alt="Registrame!" style="width: 100px;">
        <h6><span class="badge badge-light">Formulario para ingresar al panel administrador.</span></h6>
        <!-- Formulario -->
        <div class="col-md-4 offset-md-4">
            <div class="card my-5">
                <form name="formulario" class="card-body cardbody-color p-lg-5" action="?action=login"
                    onsubmit="return formularioValidacion()" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="correo" placeholder="Correo">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-dark">Iniciar sesion</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>