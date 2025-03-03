<?php

require_once __DIR__ . '/../db/conexion.php';

//
function crearEmpleado($nombre, $email, $sexo, $area_id, $boletin, $descripcion) {
    global $pdo;
    try {
        // Check if the email is already registered
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM empleados WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            return [
                'empleado_id' => null,
                'mensaje' => 'Error: Correo ya registrado.'
            ];
        }

        // Insert new employee
        $stmt = $pdo->prepare("INSERT INTO empleados (nombre, email, sexo, area_id, boletin, descripcion) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $email, $sexo, $area_id, $boletin, $descripcion]);
        $empleado_id = $pdo->lastInsertId();
        return [
            'empleado_id' => $empleado_id,
            'mensaje' => 'Registro Exitoso'
        ];
    } catch (PDOException $e) {
        echo "Error Creando Empleado: " . $e->getMessage();
        return false;
    }
}


function buscarEmpleado($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error obteniendo Empleado: " . $e->getMessage();
        return false;
    }
}



function updateEmpleado($id, $nombre, $email, $sexo, $area_id, $boletin, $descripcion) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("UPDATE empleados SET nombre = ?, email = ?, sexo = ?, area_id = ?, boletin = ?, descripcion = ? WHERE id = ?");
        $stmt->execute([$nombre, $email, $sexo, $area_id, $boletin, $descripcion, $id]);
        return true;
    } catch (PDOException $e) {
        echo "Error Actualizando Empleado: " . $e->getMessage();
        return false;
    }
}


function listEmpleados() {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT e.id, e.nombre, e.email, e.sexo, e.boletin, e.descripcion, e.area_id , a.id as id_areas, a.nombre as nombre_areas FROM empleados e, areas a WHERE e.area_id = a.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error Listando Empleados: " . $e->getMessage();
        return false;
    }
}

$codigo_empleado = isset($_POST['codigo_empleado']) ? $_POST['codigo_empleado'] : null; 



function deleteEmpleado($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM empleados WHERE id = ?");
        $stmt->execute([$id]);
        try {
            $stmt = $pdo->prepare("DELETE FROM empleado_rol WHERE empleado_id = ?");
            $stmt->execute([$id]);
            echo "success";
        } catch (PDOException $e) {
            echo "Error Eliminando Empleado Rol: " . $e->getMessage();
            return false;
        }
    } catch (PDOException $e) {
        echo "Error Eliminando Empleado: " . $e->getMessage();
        return false;
    }
}

deleteEmpleado($codigo_empleado);


?>
