<?php include 'conexion.php';

// CONSULTA SQL: Obtiene TODO de la tabla
$sql = "SELECT * FROM mobiliario ORDER BY fecha_registro DESC";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Inventario</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="contenedor">
        <h2>📋 Listado Completo de Mobiliario</h2>

        <?php if (mysqli_num_rows($resultado) > 0): ?>
            <div class="lista">
                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                    <div class="tarjeta">
                        <h3>🆔 ID: <?php echo $fila['id']; ?></h3>
                        <p><strong>Mueble:</strong> <?php echo $fila['nombre_mueble']; ?></p>
                        <p><strong>Cantidad:</strong> <?php echo $fila['cantidad']; ?></p>
                        <p><strong>Estado:</strong> <?php echo $fila['estado']; ?></p>
                        <p><strong>Ubicación:</strong> <?php echo $fila['ubicacion']; ?></p>
                        <p><small>Registrado: <?php echo $fila['fecha_registro']; ?></small></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="aviso">⚠️ No hay registros en el inventario</p>
        <?php endif; ?>

        <?php mysqli_close($conexion); ?>
        <a href="index.php" class="boton volver">🔙 Volver al menú</a>
    </div>
</body>
</html>