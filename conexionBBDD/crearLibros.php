<?php

include_once('baseDatos.php');

// Recupera los datos enviados por el formulario
$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$language = $_POST['language'];
$id_library = $_POST['id_library'];
// Asegúrate de que los campos no estén vacíos
if (empty($title) || empty($author) || empty($isbn) || empty($language) || empty($id_library)) {
    echo "<br>Error: Todos los campos (title, author, isbn, language, id_library) deben ser rellenados.";
    echo "<br><br><a href='infoLibros.php'>Volver</a>";
    return;
}

// Consulta para insertar los datos
$query = "INSERT INTO book (title, author, isbn, language, id_library) VALUES ('$title', '$author', '$isbn', '$language', '$id_library')";
$result = mysqli_query($conn, $query);


if ($result) {
    header('Location: infoLibros.php');
} else {
    echo "Error al guardar los datos: " . mysqli_error($conn);
}

// Cierra la conexión
if (isset($conn)) {
    mysqli_close($conn);
}