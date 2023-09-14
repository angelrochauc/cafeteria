<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Producto Más Vendido</title>
    <style>
        body {
    font-family: Arial, sans-serif;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
}

h1 {
    font-size: 24px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
}

th {
    background-color: #f2f2f2;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Producto Más Vendido</h1>
        <table>
            <tr>
                <th>Nombre del Producto</th>
                <th>Total Vendido</th>
            </tr>
            <?php
            $conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");

            // Comprobar la conexión
            if (!$conn) {
                die("La conexión falló: " . pg_last_error());
            }

            // Consulta SQL
            $sql = "SELECT p.nombre, total_vendido
                    FROM productos p
                    JOIN (
                        SELECT id_producto, SUM(cantidad_vendida) as total_vendido
                        FROM ventas
                        GROUP BY id_producto
                        ORDER BY total_vendido DESC
                        LIMIT 1
                    ) v ON p.id = v.id_producto";

            $result = pg_query($conn, $sql);

            if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["total_vendido"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
            }

            // Cerrar la conexión
            pg_close($conn);
            ?>
        </table>
        <a href="../index.php">Regresar a la Página Principal</a> <!-- Agregado -->
        <table>
    </div>
</body>
</html>
