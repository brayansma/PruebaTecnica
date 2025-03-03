<?php

require_once 'db/conexion.php';

function crearRol($nombre) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO roles (nombre) VALUES (?)");
        $stmt->execute([$nombre]);
        $roles_id = $pdo->lastInsertId();
        return [
            'roles_id' => $roles_id,
            'mensaje' => 'Registro Exitoso'
        ];
    } catch (PDOException $e) {
        echo "Error Creado Rol: " . $e->getMessage();
        return false;
    }
}

function buscarRol($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM roles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error Buscando Rol: " . $e->getMessage();
        return false;
    }
}

function updateRol($id, $nombre) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("UPDATE roles SET nombre = ? WHERE id = ?");
        $stmt->execute([$nombre, $id]);
        return true;
    } catch (PDOException $e) {
        echo "Error Actualizando Rol: " . $e->getMessage();
        return false;
    }
}

function deleteRol($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM roles WHERE id = ?");
        $stmt->execute([$id]);
        return true;
    } catch (PDOException $e) {
        echo "Error Eliminando Rol: " . $e->getMessage();
        return false;
    }
}

function listRoles() {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM roles");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error Listando Roles: " . $e->getMessage();
        return false;
    }
}

?>
