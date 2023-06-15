/* CREACIÓN TABLA RESERVAS */
CREATE TABLE reservas (
    `id` INT NULL AUTO_INCREMENT COMMENT 'Id de la reserva' ,
    `id_usuario` INT NULL COMMENT 'Id del usuario que ha realizado la reserva' ,
    `id_emplazamiento` INT NULL COMMENT 'Id del emplazamiento que se ha elegido' ,
    `fecha_hora` DATETIME NOT NULL COMMENT 'Fecha y hora en la que se ha reservado' ,
    `precio` INT NOT NULL COMMENT 'Precio total que se ha pagado' ,
    `anotaciones` VARCHAR(500) COMMENT 'Notas extras proporcionadas por el usuario en caso necesario' ,
    PRIMARY KEY (`id`),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_emplazamiento) REFERENCES emplazamientos(id)) ENGINE = InnoDB;

/* CREACIÓN TABLA EMPLAZAMIENTOS */
CREATE TABLE emplazamientos (
    `id` INT NULL AUTO_INCREMENT COMMENT 'Id de emplazamiento único' ,
    `nombre` VARCHAR(30) NOT NULL COMMENT 'Nombre del emplazamiento' ,
    `descripcion_corta` VARCHAR(100) NOT NULL COMMENT 'Descripción sencilla para dar detalles' ,
    `descripcion_larga` VARCHAR(1000) NOT NULL COMMENT 'Descripción larga, para explicar un poco más' ,
    `categoria` VARCHAR(20) NOT NULL COMMENT 'Categoría a la que pertenece' ,
    `precio` INT NOT NULL COMMENT 'Precio por horas' ,
    `fecha_registro` DATETIME COMMENT 'Fecha y hora en la que se ha registrado el emplazamiento' ,
    `imagenes` MEDIUMBLOB COMMENT 'Imagenes ilustrativas' ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;

/* CREACION TABLA CATEGORÍAS DE EMPLAZAMIENTOS */
CREATE TABLE categoria_emplazamientos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_categoria VARCHAR(100) NOT NULL
    );

/* CREACIÓN TABLA USUARIOS */
CREATE TABLE usuarios (
    `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador único para cada usuario en el sistema.' , 
    `usuario` VARCHAR(100) NOT NULL COMMENT 'Nombre de usuario característico para el usuario.' , 
    `correo` VARCHAR(400) NOT NULL COMMENT 'Correo electrónico con el que el usuario realizará sus operaciones.' , 
    `contrasena` VARCHAR(500) NOT NULL COMMENT 'Contraseña privada y encriptada.' , 
    `descripcion` VARCHAR(500) COMMENT 'Descripcion personalizada del usuario.' , 
    `permisos` VARCHAR(30) NOT NULL COMMENT 'Permisos con los que cuenta.' , 
    `fecha_alta` DATETIME NOT NULL COMMENT 'Fecha en la que el usuario se ha dado de alta en el sistema.' , 
    `avatar` LONGBLOB COMMENT 'Avatar personalizable.' , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;
