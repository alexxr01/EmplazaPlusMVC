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
                    <input type="text" class="form-control" name="descripcion_corta"
                        value="<?php echo "$descripcion_corta"; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="descripcion_larga"
                        value="<?php echo "$descripcion_larga"; ?>">
                </div>
                <div class="mb-3">
                    <select name="categoria" class="form-control">
                        <?php if($categoria == "Ocio"): ?>
                            <option selected>Ocio</option>
                            <option>Turismo</option>
                            <option>Deporte</option>
                            <option>Infantil</option>
                            <option>Adultos</option>
                            <option>Online</option>
                        <?php elseif($categoria == "Deporte"): ?>
                            <option selected>Deporte</option>
                            <option>Turismo</option>
                            <option>Ocio</option>
                            <option>Infantil</option>
                            <option>Adultos</option>
                            <option>Online</option>
                        <?php elseif($categoria == "Turismo"): ?>
                            <option selected>Turismo</option>
                            <option>Deporte</option>
                            <option>Ocio</option>
                            <option>Infantil</option>
                            <option>Adultos</option>
                            <option>Online</option>
                        <?php elseif($categoria == "Online"): ?>
                            <option selected>Online</option>
                            <option>Deporte</option>
                            <option>Ocio</option>
                            <option>Infantil</option>
                            <option>Adultos</option>
                            <option>Turismo</option>
                        <?php elseif($categoria == "Infantil"): ?>
                            <option selected>Infantil</option>
                            <option>Deporte</option>
                            <option>Ocio</option>
                            <option>Online</option>
                            <option>Adultos</option>
                            <option>Turismo</option>
                        <?php elseif($categoria == "Adultos"): ?>
                            <option selected>Adultos</option>
                            <option>Deporte</option>
                            <option>Ocio</option>
                            <option>Online</option>
                            <option>Infantil</option>
                            <option>Turismo</option>
                        <?php else: ?>
                            <option selected>Selecciona una categoria</option>
                            <option>Deporte</option>
                            <option>Ocio</option>
                            <option>Online</option>
                            <option>Infantil</option>
                            <option>Turismo</option>
                        <?php endif; ?>
                    </select>


                    <!--<input type="text" class="form-control" name="categoria" value="<?php echo "$categoria"; ?>">-->
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