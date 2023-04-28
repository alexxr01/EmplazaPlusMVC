<!-- Contenido de la pagina -->
<div class="container">
    <div class="text-center mt-5">
        <!-- Formulario -->
        <div class="col-md-4 offset-md-4">
            <form class="card-body cardbody-color p-lg-5" action="?action=registroEmplazamiento" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" name="nombre" id="Nombre"
                        placeholder="Nombre emplazamiento">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="descripcion_corta" placeholder="Descripción corta">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="descripcion_larga" placeholder="Descripción larga">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="categoria" placeholder="Categoría a la que pertenece">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="precio" placeholder="Precio por horas">
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Añadir nuevo emplazamiento</button>
            </form>
            <br>
        </div>
    </div>
</div>