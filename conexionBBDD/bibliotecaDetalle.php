<?php

include_once 'baseDatos.php';

$id = $_POST['id'];

$consultaDetalle = "SELECT * FROM library WHERE id = '$id'";
$resultadoDetalle = mysqli_query($conn, $consultaDetalle);
$array_detalle = mysqli_fetch_array($resultadoDetalle);

$consultaLibro = "SELECT * FROM book WHERE id_library = '$id'";
$resultadoLibro = mysqli_query($conn, $consultaLibro);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Biblioteca</title>
</head>
<body>

    <h2>Detalles de la <?php echo $array_detalle['name']?></h2>
    <p>ID: <?php echo $array_detalle['id']?></p>
    <p>Direccion: <?php echo $array_detalle['address']?></p>
    <p>Telefono<?php echo $array_detalle['phone']?></p>

    <form action="borrarBiblioteca.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
        <input type="submit" value="Borrar">
    </form>
   
    <form action="editarBiblioteca.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
        <input type="submit" value="Editar">
    </form>

    <form action="indexBibliotecas.php" method="POST">
        <input type="submit" value="Volver">
    </form>
    <table>
        
        <th>ID</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>ISBN</th>
        <th>Idioma</th>
        <th>Biblioteca</th>
        <th>Actions</th>

<?php while ($row = mysqli_fetch_array($resultadoLibro)) : ?>
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