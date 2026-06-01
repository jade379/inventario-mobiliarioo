<?php include 'conexion.php';

// Si el formulario se envió
if ($_POST) {
    // Recoger datos del formulario
    $nombre = $_POST['nombre_mueble'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];
    $ubicacion = $_POST['ubicacion'];

    // CONSULTA SQL: Inserta en la ÚNICA tabla
    $sql = "INSERT INTO mobiliario (nombre_mueble, cantidad, estado, ubicacion) 
            VALUES ('$nombre', '$cantidad', '$estado', '$ubicacion')";

    if (mysqli_query($conexion, $sql)) {
        $mensaje = "<p class='exito'>✅ Registro guardado correctamente</p>";
    } else {
        $mensaje = "<p class='error'>❌ Error: " . mysqli_error($conexion) . "</p>";
    }
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mobiliario</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="contenedor">
        <h2>📝 Nuevo Registro</h2>
        <?php echo $mensaje ?? ""; ?>

        <form method="POST" class="formulario">
            <label>Nombre del mueble:</label>
            <input type="text" name="nombre_mueble" required placeholder="Ej: Silla, Escritorio, Pizarrón">

            <label>Cantidad:</label>
            <input type="number" name="cantidad" min="1" required placeholder="Ej: 15">

            <label>Estado:</label>
            <select name="estado" required>
                <option value="">Seleccionar</option>
                <option value="Bueno">Bueno</option>
                <option value="Regular">Regular</option>
                <option value="Malo">Malo</option>
            </select>

            <label>Ubicación / Aula:</label>
            <input type="text" name="ubicacion" required placeholder="Ej: Aula 101, Laboratorio">

            <button type="submit" class="boton">Guardar en Inventario</button>
        </form>

        <a href="index.php" class="boton volver">🔙 Volver al menú</a>
    </div>
</body>
</html>