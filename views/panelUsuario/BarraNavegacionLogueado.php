<!-- Menú-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand"><img src="src/img/favicon.png" width="30px" alt="Logo">
            EmplazaPlus
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <span class="navbar-text">
            <a class="btn btn-cta btn-lg" role="button" data-toggle="modal"
                data-target="#confirmacionCerrarSesion"><button type="button" class="btn btn-primary btn-sm active"><i
                        class="bi bi-box-arrow-left"></i> Cerrar sesión</button></a>
        </span>
    </div>
</nav>

<!-- Modal que se abrirá para confirmar cerrar sesión -->
<div class="modal fade" id="confirmacionCerrarSesion" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistroLabel">¿Quieres cerrar sesión?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre">
                          Vas a salir de la sesión actual.
                          <br>
                          Para volver a ingresar, solo inicia sesión de nuevo.
                        </label>
                        <br><br>
                        <a href="?cerrar_sesion=1"><button type="button" class="btn btn-danger btn-sm">Confirmar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>