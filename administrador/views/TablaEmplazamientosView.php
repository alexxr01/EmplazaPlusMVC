<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Lista de emplazamientos disponibles
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion corta</th>
                    <th>Descripcion larga</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emplazamientos as $emplazamiento): ?>
                <tr>
                    <form action="?action=eliminarEmplazamiento" method="POST">
                        <input readonly type="hidden" name="id" value="<?php echo $emplazamiento['id']; ?>" />

                        <td><?php echo $emplazamiento['nombre']; ?></td>
                        <td><?php echo $emplazamiento['descripcion_corta']; ?></td>
                        <td><?php echo $emplazamiento['descripcion_larga']; ?></td>
                        <td><?php echo $emplazamiento['categoria']; ?></td>
                        <td><?php echo $emplazamiento['precio']; ?>€/h</td>
                        <td>
                            <a
                                href="editaremplazamiento?nombre=<?php echo $emplazamiento['nombre']; ?>&descripcion_corta=<?php echo $emplazamiento['descripcion_corta']; ?>&descripcion_larga=<?php echo $emplazamiento['descripcion_larga']; ?>&categoria=<?php echo $emplazamiento['categoria']; ?>&precio=<?php echo $emplazamiento['precio']; ?>&id=<?php echo $emplazamiento['id']; ?>">
                                <button type="button" class="btn btn-dark btn-sm" placeholder="Editar datos"><i
                                        class="fa-solid fa-pencil"></i></button></a>
                            <button type="submit" class="btn btn-danger btn-sm" placeholder="Eliminar"><i
                                    class="fa-solid fa-trash"></i></button>
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>