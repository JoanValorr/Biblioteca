<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Página Principal</title>
</head>
<body>
    <h1>Gestión Bibliotecas</h1>
    <nav>
        <ul>
            <li><a href="conexionBBDD/indexBibliotecas.php">Ver Bibliotecas</a></li>
            <li><a href="conexionBBDD/indexLibros.php">Ver Libros</a></li>
        </ul>
    </nav>
    <!-- Formulario de Búsqueda -->
    <form action="buscar.php" method="GET">
        <label for="search">Buscar libro o Biblioteca:</label>
        <input type="text" id="search" name="query" placeholder="Nombre de Libro o Biblioteca">
        <button type="submit">Buscar</button>
    </form>
</body>
</html>
