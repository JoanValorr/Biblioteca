<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Creació de la Biblioteca</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Formulario</h1>
    <form method="post" action="crearLibros.php">
        <label for="title">Nombre del Libro: </label><input type="text" name="title"><br><br>
        <label for="author">Autor: </label><input type="text" name="author"><br><br>
        <label for="isbn">ISBN: </label><input type="text" name="isbn"><br><br>
        <label for="language">Lengua/Idioma: </label><input type="text" name="language"><br><br>
        <label for="id_library">Biblioteca: </label><input type="text" name="id_library"><br><br>
       
        <input class="btn" type="submit" value="Crear"> <!-- El formaction hace lo mismo que el action pero utiliza en botones de envío (como <button> o <input type="submit">) para especificar una URL -->
    </form>
</body>
</html>