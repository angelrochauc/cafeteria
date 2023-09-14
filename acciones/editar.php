<?php
$conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = pg_escape_string($_POST["nombre"]);
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $peso = $_POST["peso"];
    $referencia = $_POST["referencia"];
    $categoria = pg_escape_string($_POST["categoria"]);
    $fecha_creacion = $_POST["fecha_creacion"];

    $query = "UPDATE productos SET nombre = '$nombre', precio = $precio, stock = $stock, peso = $peso, referencia = '$referencia', categoria = '$categoria', fecha_creacion = '$fecha_creacion' WHERE id = $id";
    
    $result = pg_query($conn, $query);

    if ($result) {
        // La actualización se realizó correctamente
        echo '<script>alert("Producto actualizado correctamente.");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
        exit();
    } else {
        // Error en la actualización
        echo '<script>alert("Error al actualizar el producto.");</script>';
    }
}
?>
