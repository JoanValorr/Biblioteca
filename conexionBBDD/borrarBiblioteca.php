<?php

include_once('baseDatos.php');

// Recupera el ID del formulario
$id = $_POST['id'];

if (empty($id)) {
    echo "<br>Error: Campo (id) deben ser rellenado.";
    echo "<br><br><a href='index.php'>Volver</a>";
    return;
}
if (!empty($id)) {
    echo '<h3>Estás borrando el usuario con id: ' . htmlspecialchars($id) . '</h3>';
    echo '<form action="" method="POST">';
    echo '<input type="hidden" name="id" value="' . htmlspecialchars($id) . '">';
    echo '<input type="hidden" name="action" value="Borrar">';
    echo '<input class="confirmButton" type="submit" name="confirm"value="Borrar">';
    echo '</form>';
    echo '<a href="index.php">Volver</a>';
    if (isset($_POST['confirm'])) {
        $query = "DELETE FROM library WHERE id='$id'";
        $delete_result = mysqli_query($conn, $query);
        if ($delete_result) {
            echo 'Biblioteca eliminado correctamente <br/>';
            header('Location: index.php');
        } else {
            echo 'Error al eliminar usuario: ' . mysqli_error($conn) . '<br/>';
        }
    }
}
