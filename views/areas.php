<div class="container">
    <!-- <div class="well"> -->
    <h2>Crear Areas</h2>
    <div class="alert alert-info" role="alert">
        Los campos con asteriscos (*) son obligatorios
    </div>
    <!-- </div> -->
    <div class="col-md-12">
        <div class="form-horizontal">
<?php
require_once 'config/data_area.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $data = buscarArea($id);
    if (!$data) {
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>Area no encontrada<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['txt_nombre'];

    if (isset($_POST['txt_id']) && !empty($_POST['txt_id'])) {
        $id = $_POST['txt_id'];
        $result = updateArea($id, $nombre);
        if ($result) {
            header("Location: index.php?m=lista_areas");
            exit();
        }
    } else {
        $result = crearArea($nombre);

        if ($result && $result['area_id'] !== null) {
            header("Location: index.php?m=lista_areas");
            exit();
        } else {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>" . $result['mensaje'] . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        }
    }
}


?>

            <form id="areaForm" action="index.php?m=area" method="post">
        
                    <div class="form-group" style="display: none;">
                        <label class=" col-sm-2 control-label" for="txt_id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="txt_id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-2 control-label" for="txt_nombre">Nombre Area *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" value="<?php echo isset($data['nombre']) ? $data['nombre'] : ''; ?>" placeholder="Nombre Area">
                        </div>
                    </div>

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
<script src="libs/js/areas.js"></script>
