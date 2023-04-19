<!-- Contenido de la pagina -->
<div class="container">
        <div class="text-center mt-5">
            <img src="src/img/registro.png" alt="Registrame!" style="width: 300px;">
            <h6><span class="badge bg-secondary">Rellene los datos para registrar:</span></h6>
            <!-- Formulario -->
            <div class="col-md-4 offset-md-4">
                <div class="card my-5">
                    <form class="card-body cardbody-color p-lg-5" action="?action=registro" method="POST">
                        <div class="mb-3">
                            <input type="name" class="form-control" name="usuario" id="Usuario" placeholder="Usuario">
                            <small class="form-text text-muted">Elige un nombre de usuario único.</small>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="correo" placeholder="Correo">
                            <small class="form-text text-muted">Necesitaremos tu dirección de correo electrónico.</small>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                            <small class="form-text text-muted">Asegurate de usar una contrasena segura.</small>
                        </div>
                        <!--
                        <div class="mb-3">
                            <select name="permisos">
                                <option selected>Selecciona permisos:</option>
                                <option value="Usuario">Usuario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div> -->
                        <br>
                        <button type="submit" class="btn btn-dark">¡Registrarme!</button>
                    </form>
                </div>
            </div>
            <a href="./"><button type="button" class="btn btn-outline-dark btn-sm">¿Quieres iniciar sesión?</button></a>
            <br><br>
        </div>
    </div>