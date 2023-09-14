LA base de datos la llame konecta_cafe

CREATE TABLE productos (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    referencia VARCHAR(50) NOT NULL,
    precio INTEGER NOT NULL,
    peso INTEGER NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    stock INTEGER NOT NULL,
    fecha_creacion DATE NOT NULL
);


CREATE TABLE ventas (
    id SERIAL PRIMARY KEY,
    id_producto INTEGER NOT NULL,
    cantidad_vendida INTEGER NOT NULL,
    fecha_venta DATE NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES productos (id)
);


Producto con más stock:

SELECT nombre, stock
FROM productos
ORDER BY stock DESC
LIMIT 1;


Producto más vendido:
SELECT p.nombre, total_vendido
FROM productos p
JOIN (
    SELECT id_producto, SUM(cantidad_vendida) as total_vendido
    FROM ventas
    GROUP BY id_producto
    ORDER BY total_vendido DESC
    LIMIT 1
) v ON p.id = v.id_producto;
