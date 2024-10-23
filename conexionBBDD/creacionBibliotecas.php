<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Creació de la Biblioteca</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>Formulario</h1>
    <form method="post">
        <label for="name">Nom de la Biblioteca: </label><input type="text" name="name"><br><br>
        <label for="address">Address: </label><input type="text" name="address"><br><br>
        <label for="phone">Número de telèfon: </label><input type="number" name="phone"><br><br>
        
        <input type="submit" action="crearBiblioteca.php" value="Crear"> <!-- El formaction hace lo mismo que el action pero utiliza en botones de envío (como <button> o <input type="submit">) para especificar una URL -->
    </form>
</body>
</html>