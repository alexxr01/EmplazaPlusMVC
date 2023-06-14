<h1 class="mt-4">Registrar nuevo emplazamiento</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Añade un nuevo lugar de reservas para los usuarios.
        Los cambios aparecerán reflejados inmediatamente.
    </li>
</ol>

<!-- Contenido de la pagina -->
<div class="container">
    <div class="text-center mt-5">
        <!-- Formulario -->
        <div class="col-md-4 offset-md-4">
            <form class="card-body cardbody-color p-lg-5" action="?action=registroEmplazamiento" method="POST"
                enctype="multipart/form-data">
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
                    <select name="categoria" class="form-control">
                        <option selected>Categoría a la que pertenece:</option>
                        <option>Ocio</option>
                        <option>Turismo</option>
                        <option>Deporte</option>
                        <option>Infantil</option>
                        <option>Adultos</option>
                        <option>Online</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="precio" placeholder="Precio por horas">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="imagen" placeholder="Imagenes ilustrativas">
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Añadir nuevo emplazamiento</button>
            </form>
            <br>
        </div>
    </div>
</div>