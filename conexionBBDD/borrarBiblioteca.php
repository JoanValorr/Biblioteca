
<?php

include_once 'baseDatos.php';

$library_datos = "SELECT * FROM library WHERE id = '" . $_POST['id'] . "'";
$library_resultado = mysqli_query($conn, $library_datos);
$library_array = mysqli_fetch_assoc($library_resultado);

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
<h2>Estás borrando la biblioteca "<?php echo $library_array['name']; ?>", ¿estas seguro de que quieres continuar?</h2>
    <div>
        <a href="indexBibliotecas.php">Volver</a>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
            <button type="submit" name="confirm" class="confirmDelete">Eliminar</button>
        </form>
    </div>
    <?php
    if (isset($_POST['confirm'])) {
        $queryDelete = "DELETE FROM library WHERE id = '" . $_POST['id'] . "'";
        $resultDelete = mysqli_query($conn, $queryDelete);
        header('Location: indexBibliotecas.php');
    }
    ?>
</body>
</html>