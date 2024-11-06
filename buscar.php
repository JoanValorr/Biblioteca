<?php
// buscar.php
include_once 'conexionBBDD/baseDatos.php';

// Verificar si se recibió el término de búsqueda
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($query)) :
    ?>
    <p>Por favor ingresa un nombre.</p>
    <?php
    exit;
endif;

// Preparar la búsqueda como coincidencia parcial
$query = '%' . $query . '%';

// Buscar en ambas tablas según el tipo de consulta
$sql = "SELECT 'biblioteca' AS tipo, name AS name, address AS info1, phone AS info2, '' AS info3, '' AS info4 
        FROM library 
        WHERE name LIKE ?
        UNION
        SELECT 'libro' AS tipo, title AS name, author AS info1, isbn AS info2, language AS info3, id_library AS info4 
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
                    (Dirección: <?= htmlspecialchars($row['info1']) ?>, 
                    Teléfono: <?= htmlspecialchars($row['info2']) ?>)
                </li>
            <?php else : ?>
                <li>
                    Libro: <?= htmlspecialchars($row['name']) ?> 
                    Autor: <?= htmlspecialchars($row['info1']) ?>, 
                    ISBN: <?= htmlspecialchars($row['info2']) ?>, 
                    Idioma: <?= htmlspecialchars($row['info3']) ?>, 
                    Biblioteca: <?= htmlspecialchars($row['info4']) ?>
                </li>
            <?php endif; ?>
        <?php endwhile; ?>
    </ul>
<?php else : ?>
    <p>No se encontraron resultados para '<?= htmlspecialchars($_GET['query']) ?>'.</p>
<?php endif; ?>

<?php
// Cerrar conexión
$stmt->close();
$conn->close();
