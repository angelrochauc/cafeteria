<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>KONECTA Café - Menú Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1, h2 {
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            margin: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #0056b3;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>KONECTA Café - Menú Principal</h1>
    <div class="container">
        <h2>Acciones de Producto</h2>
        <ul>
            <li><a href="formularios/crear_producto.html">Crear Producto</a></li>
            <li><a href="formularios/editar_producto.html">Editar Producto</a></li>
            <li><a href="formularios/eliminar_producto.html">Eliminar Producto</a></li>
            <li><a href="acciones/producto_mas_vendido.php">Producto Mas Vendido</a></li>
            <li><a href="acciones/producto_con_mas_stock.php">Producto Con Mas Stock</a></li>
        
        </ul>

        <h2>Acciones de Venta</h2>
        <ul>
            <li><a href="formularios/realizar_venta.html">Realizar Venta</a></li>
        </ul>

        <h2>Productos</h2>
    
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Referencia</th>
                <th>Precio</th>
                <th>Peso</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Fecha de Creación</th>
            </tr>
            <?php
                $conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");
                $query = "SELECT * FROM productos";
                $result = pg_query($conn, $query);

                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['nombre']}</td>";
                    echo "<td>{$row['referencia']}</td>";
                    echo "<td>{$row['precio']}</td>";
                    echo "<td>{$row['peso']}</td>";
                    echo "<td>{$row['categoria']}</td>";
                    echo "<td>{$row['stock']}</td>";
                    echo "<td>{$row['fecha_creacion']}</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>
