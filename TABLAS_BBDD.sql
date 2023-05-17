/* CREACIÓN TABLA RESERVAS */
CREATE TABLE reservas (
    `id` INT NULL AUTO_INCREMENT COMMENT 'Id de la reserva' ,
    `id_usuario` INT NULL COMMENT 'Id del usuario que ha realizado la reserva' ,
    `id_emplazamiento` INT NULL COMMENT 'Id del emplazamiento que se ha elegido' ,
    `fecha_alta` DATETIME NOT NULL COMMENT 'Fecha y hora en la que se ha reservado' ,
    `fecha_baja` DATETIME NOT NULL COMMENT 'Fecha y hora en la que la reserva finaliza' ,
    `precio` INT NOT NULL COMMENT 'Precio total que se ha pagado' ,
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
