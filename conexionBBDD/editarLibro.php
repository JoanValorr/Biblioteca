<?php

include_once 'baseDatos.php';
$datosLibro = "SELECT * FROM book WHERE id = '" . $_POST['id'] . "'";
$libro = mysqli_query($conn, $datosLibro);
$tituloLibro = mysqli_fetch_assoc($libro);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editar.css">
    <title>LIBRO</title>
</head>
<body>
    <div>
        <form action="" method="POST">
            <h2>Editando el Libro: <?php echo $tituloLibro['title']; ?></h2>
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
            <label for="title">Titulo:</label>
                <input type="text" id="title" name="title" value="<?php echo $tituloLibro['title']; ?>" required>
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" value="<?php echo $tituloLibro['author']; ?>" required>
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" value="<?php echo $tituloLibro['isbn']; ?>" required>
                <label for="language">Lenguaje:</label>
                <input type="text" id="language" name="language" value="<?php echo $tituloLibro['language']; ?>" required>
                <label for="id_library">Biblioteca:</label>
                <input type="text" id="id_library" name="id_library" value="<?php echo $tituloLibro['id_library'];?>" required>
            <input type="submit" value="Actualiza" name="updateLibrary">
            <a class="btn" href="indexLibros.php">Volver</a>
        </form>
    </div>
    <?php if (isset($_POST['updateBook'])) : ?>
            <?php if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['isbn']) || empty($_POST['language']) || empty($_POST['id_library'])) : ?>
                <script>alert("Todos los campos son obligatorios")</script>;
            <?php else : ?>
                <?php
                    $update_query = "UPDATE book SET title = '" . $_POST['title'] . "', author = '" . $_POST['author'] . "', isbn = '" . $_POST['isbn'] . "', language = '" . $_POST['language'] . "', id_library = '" . $_POST['id_library'] . "' WHERE id = '" . $_POST['id'] . "'";
                    $update_result = mysqli_query($conn, $update_query);
                    header('Location: indexLibros.php');
                ?>
            <?php endif; ?>
        <?php endif; ?>
</body>
</html>