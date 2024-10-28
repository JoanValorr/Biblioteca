<html>
    <head>
        <meta charset="UTF-8"></meta>
        <link rel="stylesheet" href="../css/styles.css">
    </head>

<?php


include_once('baseDatos.php');


$consultaSelect = 'SELECT * FROM book';
$resultadoSelect = mysqli_query($conn, $consultaSelect);

echo '<table>';
echo '<tr><th>ID</th>
<th>Title</th><th>Author</th><th>ISBN</th><th>Language</th><th>Nombre Biblioteca</th></tr>';

while ($row = mysqli_fetch_array($resultadoSelect)) {
    $id = $row['id'];
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['title'] . '</td>';
    echo '<td>' . $row['author'] . '</td>';
    echo '<td>' . $row['isbn'] . '</td>';
    echo '<td>' . $row['language'] . '</td>';
    echo '<td>' . $row['id_library'] . '</td>';
    echo '<td>
                <form action="detalleLibro.php" method="POST">
                    <input type="hidden" name="id" value="' . $id . '">
                    <input type="submit" value="Acceder">
                </form>
            </td>';
    echo '</tr>';
}

echo '</table>'; // Cierra la tabla HTML.

echo '<input type="submit" name="action" value="Guardar"></input>';

if (isset($conn)) {
    mysqli_close($conn); // Cierra la conexión con la base de datos.
}
include_once('creacionLibros.php');
?>
