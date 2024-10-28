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
?>   
    <h1>Editar Biblioteca</h1>
    <form method="post" action="modificarBiblioteca.php">
        <label for="name">Nom de la Biblioteca: </label><input type="text" name="name"><br><br>
        <label for="address">Address: </label><input type="text" name="address"><br><br>
        <label for="phone">Número de telèfon: </label><input type="number" name="phone"><br><br>
        <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
        <input type="submit" value="Modificar"> 
    </form>
</body>
</html>