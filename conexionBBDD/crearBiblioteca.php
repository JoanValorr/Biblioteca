
<?php
include_once('baseDatos.php');
include_once('crearBibliotecas.php');

// Recupera los datos enviados por el formulario
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Asegúrate de que los campos no estén vacíos

if (empty($name) || empty($address) || empty($phone)) {
    echo "<br>Error: Todos los campos (name, address,phone) deben ser rellenados.";
    echo "<br><br><a href='index.php'>Volver</a>";
    return;
}
$query = "INSERT INTO library (name, address, phone) VALUES ('$name', '$address', '$phone')";
$result = mysqli_query($conn, $query);
if ($result) {
    header('Location: index.php');
} else {
    echo "Error al guardar el usuario: " . mysqli_error($conn);
}
