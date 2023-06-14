<?php
$id = $_GET['id'];
$usuario = $_GET['usuario'];
$correo = $_GET['correo'];
$descripcion = $_GET['descripcion'];
$permisos = $_GET['permisos'];
?>

<h1 class="mt-4">Detalles sobre el usuario [<span class="badge bg-dark"><?php echo "$usuario"; ?></span>]</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edita los datos del usuario actual y guardalos.
    </li>
</ol>

<!-- Contenido de la pagina -->
<div class="container">
    <div class="text-center mt-5">
        <!-- Formulario -->
        <div class="col-md-6">
            <form class="card-body cardbody-color p-lg-5" action="?action=editarUsuario" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo "$id"; ?>" />
                <div class="mb-3">
                    <input type="text" class="form-control" name="usuario" id="Usuario" placeholder="Nombre del usuario"
                        value="<?php echo "$usuario"; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="correo" placeholder="Correo electrónico del usuario"
                        value="<?php echo "$correo"; ?>">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="contrasena"
                        placeholder="Insertar contraseña en caso de querer cambiarla">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="descripcion"
                        placeholder="Descripción personalizada para el usuario" value="<?php echo "$descripcion"; ?>">
                </div>
                <div class="mb-3">
                <p>Permisos para el usuario <i class="fa-solid fa-chevron-down"></i></p>
                    <?php if ($permisos == "usuario"): ?>
                    <select class="form-control" name="permisos">
                        <option selected>usuario</option>
                        <option>administrador</option>
                    </select>
                    <?php elseif ($permisos == "administrador"): ?>
                    <select class="form-control" name="permisos">
                        <option selected>administrador</option>
                        <option>usuario</option>
                    </select>
                    <?php else: ?>
                        <p>El permiso <b><?php echo "$permisos" ?></b> no existe en el sistema.</p>
                    <?php endif; ?>
                </div>
                <br>
                <button type="submit" class="btn btn-dark">Editar usuario</button>
            </form>
            <p>o también</p>
            <a href="index"><button class="btn btn-danger">Cancelar y salir</button></a>
            <br><br>
        </div>
    </div>
</div>