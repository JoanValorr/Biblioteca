
<?php
include_once('baseDatos.php');

// Recupera los datos enviados por el formulario
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Asegúrate de que los campos no estén vacíos

if (empty($nombre) || empty($apellidos) || empty($edad)) {
    echo "<br>Error: Todos los campos (name, address,phone) deben ser rellenados.";
    echo "<br><br><a href='index.php'>Volver</a>";
    return;
}
$query = "INSERT INTO user (name, address, phone) VALUES ('$name', '$address', '$phone')";
$result = mysqli_query($conn, $query);
if ($result) {
    header('Location: index.php');
} else {
    echo "Error al guardar el usuario: " . mysqli_error($conn);
}