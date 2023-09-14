<?php
$conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST["id"];

    // Eliminar registros de ventas relacionados
    $query_ventas = "DELETE FROM ventas WHERE id_producto = $id_producto";
    $result_ventas = pg_query($conn, $query_ventas);

    if (!$result_ventas) {
        echo "Error al eliminar registros de ventas.";
        exit();
    }

    // Una vez que se eliminaron los registros de ventas, ahora puedes eliminar el producto
    $query_producto = "DELETE FROM productos WHERE id = $id_producto";
    $result_producto = pg_query($conn, $query_producto);

    if ($result_producto) {
        // Producto eliminado correctamente
        echo '<script>alert("Producto eliminado");</script>';
        header("Location: ../index.php"); // Redireccionar a la página principal
        exit();
    } else {
        echo "Error al eliminar el producto.";
    }
}
?>
