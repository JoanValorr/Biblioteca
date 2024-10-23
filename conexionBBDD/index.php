<html>
    <head>
        <meta charset="UTF-8"></meta>
        <link rel="stylesheet" href="../css/styles.css">
    </head>

<?php


include_once('baseDatos.php');


$consultaSelect = 'SELECT * FROM library';
$resultadoSelect = mysqli_query($conn, $consultaSelect);

echo '<table>';
echo '<tr><th>ID</th><th>Name</th><th>Address</th><th>phone</th></tr>';

while ($row = mysqli_fetch_array($resultadoSelect)) {
    $id = $row['id'];
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['address'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . '<input type="submit" action="button" value="Acceder">' . '</td>';
    echo '</tr>';
}

echo '</table>'; // Cierra la tabla HTML.

echo '<input type="submit" name="action" value="Guardar"></input>';

if (isset($conn)) {
    mysqli_close($conn); // Cierra la conexión con la base de datos.
}

?>
