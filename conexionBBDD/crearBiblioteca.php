<?php

include_once 'baseDatos.php';

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Bibliotecas</title>
</head>
<body>
    <?php if (empty($name) || empty($address) || empty($phone)) : ?>
        <h2>No has rellenado todos los campos.</h2>
        <div class="backContainer">
            <a class="btn" href="indexBibliotecas.php">Volver</a>
        </div>
    <?php else : ?>
        <?php
            $queryInsert = 'INSERT INTO library (name, address, phone) VALUES ("' . $name . '", "' . $address . '", "' . $phone . '")';
            $resultInsert = mysqli_query($conn, $queryInsert);
            header('Location: indexBibliotecas.php');
        ?>
    <?php endif ?>
</body>
</html>