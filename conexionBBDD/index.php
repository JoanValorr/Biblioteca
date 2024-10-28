
<?php

include_once('baseDatos.php');

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
<?php
    // Iterar sobre los resultados y mostrar cada fila en la tabla
while ($row = mysqli_fetch_array($resultadoSelect)) {
        $id = $row['id'];
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['phone'] . '</td>';
        echo '<td>
                <form action="bibliotecaDetalle.php" method="POST">
                    <input type="hidden" name="id" value="' . $id . '">
                    <input type="submit" value="Acceder">
                </form>
            </td>';
        echo '</tr>';
}
?>
    </table>
<?php
    include_once('creacionBibliotecas.php');
?>

</body>
</html>