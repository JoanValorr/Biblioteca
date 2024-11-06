<?php

include_once('baseDatos.php');

$consultaSelect = "SELECT * FROM book WHERE id_library = '" . $_POST['id'] . "'";
$resultadoSelect = mysqli_query($conn, $consultaSelect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
    <!-- Tabla para mostrar los datos -->
    <table>
        <tr><th>Title</th><th>Author</th><th>ISBN</th><th>Language</th><th>Nombre Biblioteca</th></tr>

<?php while ($row = mysqli_fetch_array($resultadoSelect)) : ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['isbn']; ?></td>
        <td><?php echo $row['language']; ?></td>
        <td><?php echo $row['id_library']; ?></td>
        <td>
            <form action="detalleLibro.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="submit" value="Acceder">
            </form>
        </td>
    </tr>
<?php endwhile; ?>
    </table>
</body>
</html>