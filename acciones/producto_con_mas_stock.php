<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Producto con Más Stock</title>
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
        <h1>Producto con Más Stock</h1>
        <table>
            <tr>
                <th>Nombre del Producto</th>
                <th>Stock</th>
            </tr>
            <?php
              $conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");


            if (!$conn) {
                die("La conexión falló: " . pg_last_error());
            }

            $sql = "SELECT nombre, stock
                    FROM productos
                    ORDER BY stock DESC
                    LIMIT 1";

            $result = pg_query($conn, $sql);

            if (pg_num_rows($result) > 0) {
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["stock"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
            }

            pg_close($conn);
            ?>
        </table>
        <a href="../index.php">Regresar a la Página Principal</a> <!-- Agregado -->
    </div>
</body>
</html>
