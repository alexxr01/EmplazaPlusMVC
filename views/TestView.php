<h1>Lista de Emplazamientos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Categoría</th>
            <th>Precio</th>
        </tr>
        <?php foreach ($emplazamientos as $emplazamiento): ?>
            <tr>
                <td><?php echo $emplazamiento['id']; ?></td>
                <td><?php echo $emplazamiento['nombre']; ?></td>
                <td><?php echo $emplazamiento['descripcion']; ?></td>
                <td><?php echo $emplazamiento['categoria']; ?></td>
                <td><?php echo $emplazamiento['precio']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>