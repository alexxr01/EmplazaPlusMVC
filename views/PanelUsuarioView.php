<!-- Page Content-->
<div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="src/img/areausuario.png" alt="Area privada para el usuario." /></div>
            <div class="col-lg-5">
                <?php
                echo "<h1 class='font-weight-light'>Bienvenid@ <code><i>" . $_SESSION['usuario'] . "</i></code>!</h1>";
                ?>
                <p>Esta es tu zona privada, realiza los cambios que necesites.</p>
                <a href="./"><button class="btn btn-dark">Volver al inicio</button></a>
                <a href=""><button class="btn btn-outline-danger">Dar de baja</button></a>
            </div>
        </div>
        <!-- Call to Action-->
        <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <p class="text-white m-0">A continuación, veras las acciones disponibles para realizar en su cuenta.</p>
            </div>
        </div>
        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <!--
                    CASILLA PARA EDITAR LA CONTRASEÑA
                -->
            <div class="col-md-4 mb-5">
                <div class="card h-70">
                    <div class="card-body">
                        <h2 class="card-title">Cambiar contraseña</h2>
                        <p class="card-text">Reestablece la contraseña de tu cuenta fácilmente.</p>
                        <form class="card-body cardbody-color p-lg-5" action="src/funciones/reestablecer.php" method="POST">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="usuario" id="Usuario" placeholder="Usuario a editar">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="contrasenaantigua" placeholder="Contraseña Antigua">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="contrasenanueva" placeholder="Nueva Contraseña">
                            </div>
                            <br>
                            <button class="btn btn-dark">Aplicar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--
                    CASILLA PARA AÑADIR UNA DESCRIPCIÓN A LA CUENTA
                -->
            <div class="col-md-4 mb-5">
                <div class="card h-90">
                    <div class="card-body">
                        <h2 class="card-title">Añadir descripción</h2>
                        <p>Añade información acerca de ti.</p>
                        <?php
                        // Creamos un array de 4 elementos, se indica hasta el numero 3 porque tambien se incluye el 0
                        $db = array(3);
                        // Abrimos el siguiente archivo.
                        $archivo = fopen("datosconexion.txt", "r");
                        if (!feof($archivo)) {
                            // Recorremos el array
                            for ($i = 0; $i < 4; $i++) {
                                // Leemos los elementos del archivo.
                                $db[$i] = trim(fgets($archivo));
                            }
                        } else {
                            // Si no se puede hacer lo anterior, cerramos el flujo de archivo.
                            fclose($operacion);
                        }
                        // Leemos los datos del archivo por orden del array que indicamos mediante []
                        // seguidamente lo recogemos en las variables definidas para la conexion a la BD.
                        $server = $db[0];
                        $user = $db[1];
                        $password = $db[2];
                        $database = $db[3];
                        // Conexión a la BD.
                        $conexion = mysqli_connect($server, $user, $password, $database);
                        $obtenerUsuario = $_SESSION['usuario']; // Obtenemos el usuarios logueado
                        $sql = "SELECT descripcion FROM usuarios WHERE usuario='$obtenerUsuario'"; // Guardamos la consulta
                        $obtenerDescripcionUsuario = mysqli_query($conexion, $sql); // Ejecutamos
                        echo "<hr>"; // Espaciado con linea
                        echo "Esta es tu descripción actual:<br>"; // Mensaje
                        // Recorremos un bucle
                        while ($row = mysqli_fetch_array($obtenerDescripcionUsuario)) {
                            echo "<code>" . $row['descripcion'] . "</code>"; // Mostramos el contenido
                        }
                        // Cerramos el flujo de archivo.
                        fclose($archivo);
                        ?>
                        <form class="card-body cardbody-color p-lg-10" action="src/funciones/anadirdescripcion.php" method="POST">
                            <div class="mb-3">
                                <p>Establece una nueva descripción:</p>
                                <textarea class="form-control" name="descripcioncuenta" rows="3" placeholder="Añade una nueva descripción."></textarea>
                            </div>
                            <br>
                            <button class="btn btn-dark">Actualizar información</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--
                    CASILLA PARA SUBIR IMAGEN DE PERFIL AL USUARIO
                -->
            <div class="col-md-4 mb-5">
                <div class="card h-70">
                    <div class="card-body">
                        <h2 class="card-title">Elegir imagen de perfil</h2>
                        <p class="card-text">Tu perfil se verá mucho mejor!</p>
                        <form class="card-body cardbody-color p-lg-10" action="src/funciones/anadiravatar.php" method="POST">
                            <label class="form-label" for="avatar"></label>
                            <input type="file" class="form-control" name="avatar" />
                            <br>
                            <button class="btn btn-dark">Actualizar avatar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>