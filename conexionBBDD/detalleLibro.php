<?php

include_once 'baseDatos.php';

$id = $_POST['id'];

$consultaDetalle = "SELECT * FROM book WHERE id = '$id'";
$resultadoDetalle = mysqli_query($conn, $consultaDetalle);
$array_detalle = mysqli_fetch_array($resultadoDetalle);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Biblioteca</title>
</head>
<body>

    <h2>Detalles de la <?php echo $array_detalle['title']?></h2>
    <p>ID: <?php echo $array_detalle['id']?></p>
    <p>Autor: <?php echo $array_detalle['author']?></p>
    <p>ISBN: <?php echo $array_detalle['isbn']?></p>
    <p>Idioma: <?php echo $array_detalle['language']?></p>
    <p>Biblioteca: <?php echo $array_detalle['id_library']?></p>

    <form action="borrarLibro.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
        <input class="btn" type="submit" value="Borrar">
    </form>
   
    <form action="editarLibro.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
        <input class="btn" type="submit" value="Editar">
    </form>

    <form action="indexLibros.php" method="POST">
        <input class="btn" type="submit" value="Volver">
    </form>
    
</body>
</html>