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

    // Prepara la consulta para seleccionar los datos de la Libro específica
    $consultaDetalle = 'SELECT * FROM book WHERE id = ?';
    $stmt = mysqli_prepare($conn, $consultaDetalle);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultadoDetalle = mysqli_stmt_get_result($stmt);

    // Muestra los detalles de la Libro
    if ($row = mysqli_fetch_array($resultadoDetalle)) {
        echo '<h2>Detalles de ' . $row['title'] . '</h2> ' ;
        echo '<p>ID: ' . $row['id'] . '</p>';
        echo '<p>Autor: ' . $row['author'] . '</p>';
        echo '<p>ISBN: ' . $row['isbn'] . '</p>';
        echo '<p>Lenguage: ' . $row['language'] . '</p>';
        echo '<p>Libro: ' . $row['id_library'] . '</p>';
    } else {
        echo '<p>No se encontraron detalles para esta Libro.</p>';
    }

    mysqli_stmt_close($stmt);
} else {
    echo '<p>No se recibió un ID de Libro válido.</p>';
}

if (isset($conn)) {
    mysqli_close($conn); // Cierra la conexión con la base de datos
}
?>   
    <h1>Editar Libro</h1>
    <form method="post" action="modificarLibro.php">
        <label for="title">Nombre del Libro: </label><input type="text" name="title"><br><br>
        <label for="author">Autor: </label><input type="text" name="author"><br><br>
        <label for="isbn">ISBN: </label><input type="number" name="isbn"><br><br>
        <label for="language">Lengua/Idioma: </label><input type="text" name="language"><br><br>
        <label for="id_library">Biblioteca: </label><input type="text" name="id_library"><br><br>
        <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
        <input type="submit" value="Modificar"> 
    </form>
<?php
echo '<form action="detalleLibro.php" method="POST">
<input type="submit" value="Volver">
</form>'
?>
</body>
</html>