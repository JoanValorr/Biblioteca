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
        <title>Libros</title>
        <link rel="stylesheet" href="../css/borrar.css">
    </head>
    <body>
        <h2>Estás borrando el libro "<?php echo $tituloLibro['title']; ?>", ¿estas seguro de que quieres continuar?</h2>
        <div class="confirmDeleteContainer">
            <a class="btn" href="indexLibros.php">Volver</a>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                <button type="submit" name="borrarLibro" class="confirmDelete">Eliminar</button>
            </form>
        </div>
        <?php
        if (isset($_POST['borrarLibro'])) {
            $delete_query = "DELETE FROM book WHERE id = '" . $_POST['id'] . "'";
            $delete_result = mysqli_query($conn, $delete_query);
            header('Location: indexLibros.php');
        }
        ?>
        </div>
    </body>
</html>