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
    FOREIGN KEY (id_emplazamiento) REFERENCES emplazamiento(id)) ENGINE = InnoDB;