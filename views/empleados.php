<div class="container">
    <!-- <div class="well"> -->
    <h2>Crear Empleado</h2>
    <div class="alert alert-info" role="alert">
        Los campos con asteriscos (*) son obligatorios
    </div>
    <!-- </div> -->
    <div class="col-md-12">
        <div class="form-horizontal">
<?php
require_once 'config/data_empleado.php';
require_once 'config/data_empleado_rol.php';
$data = []; // Initialize $data

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $data = buscarEmpleado($id);
    $data_rol = buscarEmpleadoRol($id);
    // echo "<pre>. var_dump: " . var_dump($data) . ".</pre>";
    // echo "<pre>. var_dump: " . var_dump($data_rol) . ".</pre>";
    if (!$data) {
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>Empleado no encontrado<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['txt_nombre'];
    $email = $_POST['txt_correo'];
    $sexo = isset($_POST['select_sexo']) ? $_POST['select_sexo'] : '';
    $area_id = $_POST['select_area'];
    $boletin = isset($_POST['chk_boletin']) ? 1 : 0;
    $descripcion = $_POST['txt_descripcion'];

    if (isset($_POST['txt_id']) && !empty($_POST['txt_id'])) {
        $id = $_POST['txt_id'];
        $result = updateEmpleado($id, $nombre, $email, $sexo, $area_id, $boletin, $descripcion);
        if ($result) {
            if (isset($_POST['roles']) && is_array($_POST['roles'])) {
                require_once 'config/data_empleado_rol.php';
                deleteEmpleadoRol($id);
                foreach ($_POST['roles'] as $rol_id) {
                    crearEmpleadoRol($id, $rol_id);
                }
            }
            header("Location: index.php");
            exit();
        }
    } else {
        $result = crearEmpleado($nombre, $email, $sexo, $area_id, $boletin, $descripcion);

        if ($result && $result['empleado_id'] !== null) {
            $empleado_id = $result['empleado_id'];
            if (isset($_POST['roles']) && is_array($_POST['roles'])) {
                require_once 'config/data_empleado_rol.php';
                foreach ($_POST['roles'] as $rol_id) {
                    crearEmpleadoRol($empleado_id, $rol_id);
                }
            }
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>" . $result['mensaje'] . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }
}
?>

            <form id="empleadoForm" action="index.php?m=empleado" method="post">
        
                    <div class="form-group" style="display: none;">
                        <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="txt_id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="txt_nombre">Nombre Completo *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" value="<?php echo isset($data['nombre']) ? $data['nombre'] : ''; ?>" placeholder="Nombre completo del empleado">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="txt_correo">Correo Electronico *</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="txt_correo" name="txt_correo" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" placeholder="Correo electrónico">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="select_sexo">Sexo *</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" id="select_sexo" name="select_sexo" value="M" <?php echo isset($data['sexo']) && $data['sexo'] == 'M' ? 'checked' : ''; ?>>
                                    Masculino
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" id="select_sexo" name="select_sexo" value="F" <?php echo isset($data['sexo']) && $data['sexo'] == 'F' ? 'checked' : ''; ?>>
                                    Femenino
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="select_area">Area *</label>
                        <div class="col-sm-10">

                            <select class="form-control" name="select_area" id="select_area">
                                <?php
                                require_once 'config/data_area.php';
                                $areas = listAreas();
                                foreach ($areas as $area) {
                                    $selected = isset($data['area_id']) && $data['area_id'] == $area['id'] ? 'selected' : '';
                                    echo "<option value='" . $area['id'] . "' $selected>" . $area['nombre'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="txt_descripcion">Descripcion *</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="txt_descripcion" name="txt_descripcion" rows="3"><?php echo ($data ?? [])['descripcion'] ?? ''; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="chk_boletin">Boletin:</label>
                        <div class="col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="chk_boletin" name="chk_boletin" <?php echo (isset($data['boletin']) && $data['boletin'] == 1) ? 'checked' : ''; ?>>
                                    Deseo recibir boletín informativo
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="roles">Roles *</label>
                        <div class="col-sm-10">
                            <?php
                            require_once 'config/data_roles.php';
                            $roles = listRoles();
                            foreach ($roles as $rol) {
                                $checked = '';
                                if (isset($data_rol) && in_array($rol['id'], $data_rol)) {
                                    $checked = 'checked';
                                }
                                echo "<div class='checkbox'>";
                                echo "<label>";
                                echo "<input type='checkbox' class='role-checkbox' name='roles[]' value='" . $rol['id'] . "' $checked>" . $rol['nombre'];
                                echo "</label>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('.role-checkbox').click(function() {
                                $('.role-checkbox').not(this).prop('checked', false);
                            });
                        });
                    </script>

                    <div class="form-group">
                        <div class="col-md-12 col-md-off-set-3">
                            <?php if (!isset($data['id'])) { ?>
                                <input type="submit" class="btn btn-primary form-control" name="btn_guardar" id="btn_guardar" value="Guardar">
                            <?php }  ?>
                            <?php if (isset($data['id'])) { ?>
                                <input type="submit" class="btn btn-primary form-control" name="btn_actualizar" id="btn_actualizar" value="Actualizar">
                            <?php }  ?>
                        </div>
                    </div>
                    </form>

        </div>
    </div>

</div>

<script type="text/javascript" src="libs/js/jquery.validate.min.js"></script>
<script src="libs/js/empleados.js"></script>
