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
                    <td><?php echo $emplazamiento['nombre']; ?></td>
                    <td><?php echo $emplazamiento['descripcion_corta']; ?></td>
                    <td><?php echo $emplazamiento['descripcion_larga']; ?></td>
                    <td><?php echo $emplazamiento['categoria']; ?></td>
                    <td><?php echo $emplazamiento['precio']; ?>€/h</td>
                    <td>
                        <button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>