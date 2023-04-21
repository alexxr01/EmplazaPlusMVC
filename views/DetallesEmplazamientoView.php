<?php foreach ($emplazamientos as $emplazamiento): ?>
    <h2>Detalles del emplazamiento seleccionado:</h2>
    <br><br>
    <p><?php echo $emplazamiento['nombre']; ?></p>
    <br>
    <p><?php echo $emplazamiento['descripcion']; ?></p>
    <br>
    <p><?php echo $emplazamiento['categoria']; ?></p>
    <br>
    <p><?php echo $emplazamiento['precio']; ?></p>
<?php endforeach; ?>