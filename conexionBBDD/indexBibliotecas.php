<?php

include_once 'baseDatos.php' ;

$consultaSelect = 'SELECT * FROM library';
$resultadoSelect = mysqli_query($conn, $consultaSelect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
    <!-- Tabla para mostrar los datos -->
    <table>
        <tr><th>ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Actions</th></tr>

<?php while ($row = mysqli_fetch_array($resultadoSelect)) : ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td>
            <form action="bibliotecaDetalle.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input class="btn" type="submit" value="Acceder">
            </form>
        </td>
    </tr>
<?php endwhile; ?>
    </table>
    <a class="btn" href="index.php">Volver a pagina principal</a>
<?php
    include_once 'creacionBibliotecas.php';
?>

</body>
</html>