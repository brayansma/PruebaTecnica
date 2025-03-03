<?php

require_once __DIR__ . '/../db/conexion.php';

function crearArea($nombre)
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO areas (nombre) VALUES (?)");
        $stmt->execute([$nombre]);
        $area_id = $pdo->lastInsertId();
        return [
            'area_id' => $area_id,
            'mensaje' => 'Registro Exitoso'
        ];
    } catch (PDOException $e) {
        echo "Error Creado Area: " . $e->getMessage();
        return false;
    }
}

function buscarArea($id)
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM areas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error Buscando Area: " . $e->getMessage();
        return false;
    }
}

function updateArea($id, $nombre)
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("UPDATE areas SET nombre = ? WHERE id = ?");
        $stmt->execute([$nombre, $id]);
        return true;
    } catch (PDOException $e) {
        echo "Error Actualizando Area: " . $e->getMessage();
        return false;
    }
}


$codigo_area = isset($_POST['codigo_area']) ? $_POST['codigo_area'] : null;
function deleteArea($codigo_area)
{
    if ($codigo_area !== null) {
        global $pdo;
        try {
            $stmt = $pdo->prepare("DELETE FROM areas WHERE id = ?");
            $stmt->execute([$codigo_area]);
            echo "success";
        } catch (PDOException $e) {
            echo "Error Eliminando Area: " . $e->getMessage();
            return false;
        }
    }
}

deleteArea($codigo_area);


function listAreas()
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM areas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error Listando Areas: " . $e->getMessage();
        return false;
    }
}
