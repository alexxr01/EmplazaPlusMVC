<?php
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$descripcion_corta = $_GET['descripcion_corta'];
$descripcion_larga = $_GET['descripcion_larga'];
$categoria = $_GET['categoria'];
$precio = $_GET['precio'];
?>

<h1 class="mt-4">Editar emplazamiento</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edita un emplazamiento cómodamente desde aquí.
        Todos los cambios se verán reflejados inmediatamente.
    </li>
</ol>

<!-- Contenido de la pagina -->
<div class="container">
    <div class="text-center mt-5">
        <!-- Formulario -->
        <div class="col-md-6">
            <form class="card-body cardbody-color p-lg-5" action="?action=editarEmplazamiento" method="POST"
                enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo "$id"; ?>" />
                <div class="mb-3">
                    <input type="text" class="form-control" name="nombre" id="Nombre" value="<?php echo "$nombre"; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="descripcion_corta" value="<?php echo "$descripcion_corta"; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="descripcion_larga" value="<?php echo "$descripcion_larga"; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="categoria" value="<?php echo "$categoria"; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="precio" value="<?php echo "$precio"; ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Editar emplazamiento</button>
            </form>
            <br>
        </div>
    </div>
</div>