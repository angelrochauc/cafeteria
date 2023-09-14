
# Proyecto de Cafetería

**Herramientas Utilizadas:**
- Descarga PostgreSQL, (https://www.postgresql.org/download/)
- Descarga pgAdmin 4, (https://www.pgadmin.org/download/pgadmin-4-windows/)
- Despliegue utilizando Xampp, (https://www.apachefriends.org/es/index.html)

Asegúrense de verificar que Xampp tenga PostgreSQL habilitado. Para hacerlo, sigan estos pasos:

1. En la fila de Apache, seleccionen la opción de configuración PHP (PHP.ini).
2. En la sección de extensiones, verifiquen que las siguientes tres líneas no tengan un punto y coma ";" al principio:

   extension=pdo_pgsql
   extension=pdo_sqlite
   extension=pgsql


Coloquen la carpeta principal del proyecto en la carpeta "htdocs", ubicada dentro de la carpeta de Xampp.

Adicionalmente, deben configurar la conexión a la base de datos en cada archivo.

El archivo "cafe.sql" contiene las tablas utilizadas y las consultas solicitadas.

