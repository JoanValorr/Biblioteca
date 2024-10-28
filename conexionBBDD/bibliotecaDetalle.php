<?php

include_once('baseDatos.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepara la consulta para seleccionar los datos de la biblioteca específica
    $consultaDetalle = 'SELECT * FROM library WHERE id = ?';
    $stmt = mysqli_prepare($conn, $consultaDetalle);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultadoDetalle = mysqli_stmt_get_result($stmt);

    // Muestra los detalles de la biblioteca
    if ($row = mysqli_fetch_array($resultadoDetalle)) {
        echo '<h2>Detalles de la Biblioteca</h2>';
        echo '<p>ID: ' . $row['id'] . '</p>';
        echo '<p>Nombre: ' . $row['name'] . '</p>';
        echo '<p>Dirección: ' . $row['address'] . '</p>';
        echo '<p>Teléfono: ' . $row['phone'] . '</p>';
    } else {
        echo '<p>No se encontraron detalles para esta biblioteca.</p>';
    }

    mysqli_stmt_close($stmt);
} else {
    echo '<p>No se recibió un ID de biblioteca válido.</p>';
}

if (isset($conn)) {
    mysqli_close($conn); // Cierra la conexión con la base de datos
}

echo '<form action="borrarBiblioteca.php" method="POST">
    <input type="hidden" name="id" value="' . $id . '">
    <input type="submit" value="Borrar">
</form>'
?>
<?php
echo '<form action="editarBiblioteca.php" method="POST">
<input type="hidden" name="id" value="' . $id . '">
<input type="submit" value="Editar">
</form>'
?>
<?php
echo '<form action="index.php" method="POST">
<input type="submit" value="Volver">
</form>'
?>


</body>
</html>