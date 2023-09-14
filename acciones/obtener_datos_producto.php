<?php
$conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_producto = $_GET["id"];

    $query = "SELECT nombre, precio FROM productos WHERE id = $id_producto";
    $result = pg_query($conn, $query);

    if ($row = pg_fetch_assoc($result)) {
        $datos_producto = array(
            "nombre" => $row["nombre"],
            "precio" => $row["precio"]
        );

        echo json_encode($datos_producto);
    } else {
        echo json_encode(array("error" => "Producto no encontrado"));
    }
}
?>
