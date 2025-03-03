<?php require_once 'views/header.php'; ?>

<?php 
$ruta = isset($_GET['m']) ? $_GET['m'] : 'lista_empleado';

switch ($ruta) {
    case 'empleado':
        require_once 'views/empleados.php';
        break;
    case 'lista_areas':
        require_once 'views/lista_areas.php';
        break;
    case 'lista_roles':
        require_once 'views/lista_roles.php';
        break;
    case 'area':
        require_once 'views/areas.php';
        break;
    case 'roles':
        require_once 'views/roles.php';
        break;
    default:
        require_once 'views/lista_empleados.php';
        break;
}

?>

<?php require_once 'views/footer.php'; ?>
