<?php

include_once 'baseDatos.php';

// Recupera los datos enviados por el formulario
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
// Asegúrate de que los campos no estén vacíos
if (empty($name) || empty($address) || empty($phone)) {
    echo "<br>Error: Todos los campos (name, address, phone) deben ser rellenados.";
    echo "<br><br><a href='indexBibliotecas.php'>Volver</a>";
    return;
}

// Consulta para insertar los datos
$query = "INSERT INTO library (name, address, phone) VALUES ('$name', '$address', '$phone')";
$result = mysqli_query($conn, $query);


if ($result) {
    header('Location: indexBibliotecas.php');
} else {
    echo "Error al guardar los datos: " . mysqli_error($conn);
}

// Cierra la conexión
if (isset($conn)) {
    mysqli_close($conn);
}
