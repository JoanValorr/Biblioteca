
<?php

include_once 'baseDatos.php';

$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$language = $_POST['language'];
$id_library = $_POST['id_library'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Libros</title>
</head>
<body>
    <?php if (empty($title) || empty($author) || empty($isbn) || empty($language) || empty($id_library)) : ?>
        <h2>No has rellenado todos los campos.</h2>
        <div class="backContainer">
            <a class="btn" href="indexLibros.php">Volver</a>
        </div>
    <?php else : ?>
        <?php
            $queryInsert = "INSERT INTO book (title, author, isbn, language, id_library) VALUES ('$title', '$author', '$isbn', '$language', '$id_library')";
            $resultInsert = mysqli_query($conn, $queryInsert);
            header('Location: indexLibros.php');
        ?>
    <?php endif ?>
</body>
</html>