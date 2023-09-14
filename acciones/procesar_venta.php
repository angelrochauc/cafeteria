<?php
$conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_producto = pg_escape_string($_POST["nombre_producto"]);
    $cantidad_vendida = $_POST["cantidad_vendida"];
    $id = $_POST["id"];

    $query = "SELECT id, stock FROM productos WHERE nombre = '$nombre_producto'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);

    if ($row) {
        $id = $row["id"];
        $stock = $row["stock"];

        if ($stock >= $cantidad_vendida) {
            $nuevo_stock = $stock - $cantidad_vendida;
            $query = "UPDATE productos SET stock = $nuevo_stock WHERE nombre = '$nombre_producto'";
            pg_query($conn, $query);

            $query = "INSERT INTO ventas (id_producto, cantidad_vendida, fecha_venta) VALUES ($id, $cantidad_vendida,  NOW())";

            pg_query($conn, $query);

            // Añadir un alert y redirigir a la página principal
            echo '<script>alert("Venta realizada correctamente."); window.location.href = "../index.php";</script>';
        } else {
            // Añadir un alert y redirigir a la página principal
            echo '<script>alert("No hay suficiente stock para realizar la venta."); window.location.href = "../index.php";</script>';
        }
    } else {
        // Añadir un alert para indicar que el producto no fue encontrado
        echo '<script>alert("Producto no encontrado."); window.location.href = "../index.php";</script>';
    }
}
?>
