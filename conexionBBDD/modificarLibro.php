<?php

include_once('baseDatos.php');

// Recupera los datos del formulario
$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$language = $_POST['language'];
$id_library = $_POST['id_library'];

// Comprueba que todos los campos están rellenos
if (empty($title) || empty($author) || empty($isbn) || empty($language) || empty($id_library)) {
    echo "<br>Error: Todos los campos (title, author, isbn, language, id_library) deben ser rellenados.";
    echo "<br><br><a href='infoLibros.php'>Volver</a>";
    return;
}

// Actualiza la biblioteca en la base de datos
if (!empty($title) && !empty($author) && !empty($isbn) && !empty($language) && !empty($id_library)) {
    $query = "UPDATE book SET title='$title', author='$author', isbn='$isbn', language='$language', id_library='$id_library' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Libro actualizado correctamente.";
    } else {
        echo "Error al actualizar Libro: " . mysqli_error($conn);
    }
} else {
    echo "Todos los campos deben estar completos.";
}

// Redirige de vuelta a index.php
header('Location: infoLibros.php');
exit();