<!-- Contenido de la pagina -->
<div class="container">
        <div class="text-center mt-5">
            <img src="src/img/reestablecer.png" alt="Registrame!" style="width: 500px;">
            <h6><span class="badge bg-secondary">Rellene los datos para realizar cambios:</span></h6>
            <!-- Formulario -->
            <div class="col-md-4 offset-md-4">
                <div class="card my-5">
                    <form class="card-body cardbody-color p-lg-5" action="?action=reestablecer" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="correo" id="Correo" placeholder="Correo electrónico">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="contrasenaantigua" placeholder="Contraseña Antigua">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="contrasenanueva" placeholder="Nueva Contraseña">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-dark">Reestablecer</button>
                    </form>
                    
                </div>
            </div>
            <a href="./"><button type="button" class="btn btn-outline-dark btn-sm">¿Quieres iniciar sesión?</button></a>   
        </div>
    </div>