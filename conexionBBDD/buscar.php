<?php

include_once 'baseDatos.php';

// Recibir el término de búsqueda de GET y escapar para evitar inyección SQL
$query = isset($_GET['query']) ? $_GET['query'] : '';
if (empty($query)) :
    ?>
    <p>Por favor ingresa un nombre.</p>
    <a class="btn" href="index.php">Volver</a>
    <?php
    exit;
endif;
//Esto lo que hace és asegurar que cualquier carácter especial en la búsqueda y los (%) de alrededorpermite hacer una búsqueda parcial.
$query = '%' . mysqli_real_escape_string($conn, $query) . '%';

// Consulta para bibliotecas
$consultaBiblioteca = "SELECT 'biblioteca' AS tipo, name AS name, address AS address, phone AS phone, id AS id FROM library WHERE name LIKE '$query'";
$resultadoBiblioteca = mysqli_query($conn, $consultaBiblioteca);

// Consulta para libros
$consultaLibro = "SELECT 'libro' AS tipo, title AS title, author AS author, isbn AS isbn, language AS language, id_library AS id_library, id AS id FROM book WHERE title LIKE '$query'";
$resultadoLibro = mysqli_query($conn, $consultaLibro);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
<table>
    <!-- Encabezados de tabla para Bibliotecas -->
    <?php while ($row = mysqli_fetch_array($resultadoBiblioteca)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['address']); ?></td>
            <td><?php echo htmlspecialchars($row['phone']); ?></td>
        </tr>
    <?php endwhile; ?>
    
    <!-- Encabezados de tabla para Libros -->
    <?php while ($row = mysqli_fetch_array($resultadoLibro)) : ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['author']); ?></td>
            <td><?php echo htmlspecialchars($row['isbn']); ?></td>
            <td><?php echo htmlspecialchars($row['language']); ?></td>
            <td><?php echo htmlspecialchars($row['id_library']); ?></td>
            <td>
                <form action="detalleLibro.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <input class="btn" type="submit" value="Acceder">
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<a class="btn" href="index.php">Volver a pagina principal</a>
<?php
// Cerrar conexión
mysqli_close($conn);
?>
</body>
</html>