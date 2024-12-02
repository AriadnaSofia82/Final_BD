
<?php
try {
    $host = "DESKTOP-042E0QD\\MSSQLSERVER01"; // Cambia esto por tu instancia de SQL Server
    $dbname = "restaurant"; // Nombre de tu base de datos
    $dsn = "sqlsrv:Server=$host;Database=$dbname;TrustServerCertificate=true";
    
    // Crear la conexión PDO
    $bd = new PDO($dsn);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "¡Conexión exitosa a la base de datos con autenticación de Windows!";
} catch (PDOException $error) {
    echo "Ha ocurrido un error en la conexión: " . $error->getMessage();
    exit;
}
?>
