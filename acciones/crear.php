<?php
$conn = pg_connect("host=localhost dbname=konecta_cafe user=postgres password=1234");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $referencia = $_POST["referencia"];
    $precio = $_POST["precio"];
    $peso = $_POST["peso"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];
    $fecha_creacion = $_POST["fecha_creacion"];

    $query = "INSERT INTO productos (nombre, referencia, precio, peso, categoria, stock, fecha_creacion) VALUES ('$nombre', '$referencia', $precio, $peso, '$categoria', $stock, '$fecha_creacion')";
    $result = pg_query($conn, $query);

    if ($result) {
        // Inserción exitosa, muestra un mensaje de alerta y redirecciona al usuario a la página principal
        echo '<script>alert("Producto creado con éxito");</script>';
        echo '<script>window.location.href =  "../index.php";</script>';
    } else {
        // Ocurrió un error en la inserción, muestra un mensaje de alerta de error
        echo '<script>alert("Error al crear el producto");</script>';
    }
}
?>
