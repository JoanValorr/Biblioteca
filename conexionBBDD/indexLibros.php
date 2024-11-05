<?php

include_once 'baseDatos.php';

$consultaSelect = 'SELECT * FROM book';
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
    <div class="container">
        <!-- Formulario a la izquierda -->
        <div class="form-container">
            <?php include_once 'creacionLibros.php'; ?>
        </div>

        <!-- Tabla para mostrar los datos a la derecha -->
        <table>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Idioma</th>
                <th>Biblioteca</th>
                <th>Actions</th>
            </tr>

            <?php while ($row = mysqli_fetch_array($resultadoSelect)): ?>
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
                            <input class="btn" type="submit" value="Acceder">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <a class="btn" href="../index.php">Volver a pagina principal</a>
    </div>
</body>
</html>

