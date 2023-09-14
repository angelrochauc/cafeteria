<?php
$conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $idProducto = $_GET["id"];

    $query = "SELECT nombre, referencia, precio, peso, categoria, stock, fecha_creacion FROM productos WHERE id = $idProducto";
    $result = pg_query($conn, $query);

    if ($result) {
        $producto = pg_fetch_assoc($result);
        echo json_encode($producto);
    } else {
        echo json_encode(["error" => "No se pudo obtener la información del producto"]);
    }
} else {
    echo json_encode(["error" => "Parámetros incorrectos"]);
}
?>
