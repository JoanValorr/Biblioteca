<?php

include_once 'baseDatos.php';

$id = $_POST['id'];
$datosBiblioteca = "SELECT * FROM library WHERE id = '$id'";
$biblioteca = mysqli_query($conn, $datosBiblioteca);
$tituloBiblioteca = mysqli_fetch_assoc($biblioteca);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/borrar.css">
    <title>Bibliotecas</title>
</head>
<body>
<h2>Estás borrando: "<?php echo $tituloBiblioteca['name']; ?>", ¿estas seguro de que quieres continuar?</h2>
    <div class="confirmDeleteContainer">
        <a class="btn" href="indexBibliotecas.php">Volver</a>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
            <button type="submit" name="borrarbiblio" class="confirmDelete">Eliminar</button>
        </form>
    </div>
    <?php
    if (isset($_POST['borrarbiblio'])) {
        $queryDelete = "DELETE FROM library WHERE id = '" . $_POST['id'] . "'";
        $resultDelete = mysqli_query($conn, $queryDelete);
        header('Location: indexBibliotecas.php');
    }
    ?>    
</body>
</html>