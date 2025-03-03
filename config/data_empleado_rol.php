<?php

include 'db/conexion.php';

function crearEmpleadoRol($empleado_id, $rol_id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO empleado_rol (empleado_id, rol_id) VALUES (?, ?)");
        $stmt->execute([$empleado_id, $rol_id]);
        return true;
    } catch (PDOException $e) {
        echo "Error Creado Empleado Rol: " . $e->getMessage();
        return false;
    }
}

function buscarEmpleadoRol($empleado_id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT rol_id FROM empleado_rol WHERE empleado_id = ?");
        $stmt->execute([$empleado_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        echo "Error Buscando Empleado Rol: " . $e->getMessage();
        return false;
    }
}

function deleteEmpleadoRol($empleado_id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM empleado_rol WHERE empleado_id = ?");
        $stmt->execute([$empleado_id]);
        return true;
    } catch (PDOException $e) {
        echo "Error Eliminando Empleado Rol: " . $e->getMessage();
        return false;
    }
}

function listEmpleadoRol() {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM empleado_rol");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error Listando Empleado Rol: " . $e->getMessage();
        return false;
    }
}

?>
