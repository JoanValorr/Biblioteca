<?php
// buscar.php
include_once 'conexionBBDD/baseDatos.php';

// Verificar si se recibió el término de búsqueda
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($query)) :
    ?>
    <p>Por favor ingresa un nombre.</p>
    <a class="btn" href="index.php">Volver</a>
    <?php
    exit;
endif;

// Preparar la búsqueda como coincidencia parcial
$query = '%' . $query . '%';

// Buscar en ambas tablas según el tipo de consulta
$sql = "SELECT 'biblioteca' AS tipo, name AS name, address AS address, phone AS phone, '' AS info3, '' AS info4 
        FROM library 
        WHERE name LIKE ?
        UNION
        SELECT 'libro' AS tipo, title AS name, author AS author, isbn AS isbn, language AS language, id_library AS id_library 
        FROM book 
        WHERE title LIKE ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $query, $query);
$stmt->execute();
$result = $stmt->get_result();
?>

<?php if ($result->num_rows > 0) : ?>
    <h2>Resultados de búsqueda:</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <?php if ($row['tipo'] === 'biblioteca') : ?>
                <li>
                    Biblioteca: <?= htmlspecialchars($row['name']) ?> 
                    (Dirección: <?= htmlspecialchars($row['address']) ?>, 
                    Teléfono: <?= htmlspecialchars($row['phone']) ?>)
                </li>
            <?php else : ?>
                <li>
                    Libro: <?= htmlspecialchars($row['name']) ?> 
                    Autor: <?= htmlspecialchars($row['author']) ?>, 
                    ISBN: <?= htmlspecialchars($row['isbn']) ?>, 
                    Idioma: <?= htmlspecialchars($row['language']) ?>, 
                    Biblioteca: <?= htmlspecialchars($row['id_library']) ?>
                </li>
            <?php endif; ?>
        <?php endwhile; ?>
    </ul>
    <a class="btn" href="index.php">Volver</a>
<?php else : ?>
    <p>No se encontraron resultados para '<?= htmlspecialchars($_GET['query']) ?>'.</p>
<?php endif; ?>

<?php
// Cerrar conexión
$stmt->close();
$conn->close();
