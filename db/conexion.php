<?php

    static $dbName = 'prueba_tecnica' ;
    static $dbHost = 'localhost' ;
    static $dbUsername = 'root';
    static $dbUserPassword = 'root';

try {
    $dsn = "mysql:host=$dbHost;dbname=$dbName";
    $pdo = new PDO($dsn, $dbUsername, $dbUserPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

?>