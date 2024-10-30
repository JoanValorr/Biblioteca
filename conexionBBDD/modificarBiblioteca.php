<?php

include_once 'baseDatos.php';

// Recupera los datos del formulario

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];


// Comprueba que todos los campos están rellenos
if (empty($id)  || empty($name) || empty($address) || empty($phone)) {
    echo "<br>Error: Todos los campos (name, address, phone) deben ser rellenados.";
    echo "<br><br><a href='indexBibliotecas.php'>Volver</a>";
    return;
}

// Actualiza la biblioteca en la base de datos
if (!empty($id) && !empty($name) && !empty($address) && !empty($phone)) {
    $query = "UPDATE library SET name='$name', address='$address', phone='$phone' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar usuario: " . mysqli_error($conn);
    }
} else {
    echo "Todos los campos deben estar completos.";
}

// Redirige de vuelta a index.php
header('Location: indexBibliotecas.php');
exit();
