<div class="container" style="margin-top: 80px">

        <h2>Lista de empleados</h2>
        
    <div class="container">
<div class="text-right">
    <a type="button" href="index.php?m=empleado" class="btn btn-primary"><i class="fas fa-user-plus"></i> Crear</a>
</div>

        <table class="table table-striped ">
            <thead>
                <tr>
                    <!-- <th>id</th> -->
                    <th><i class="fas fa-user"></i> Nombre</th>
                    <th><i class="fas fa-at"></i> Email</th>
                    <th><i class="fas fa-venus-mars"></i> Sexo</th>
                    <th><i class="fas fa-briefcase"></i> Area</th>
                    <th><i class="fas fa-envelope"></i> Boletin</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once("config/data_empleado.php");
                    $query = listEmpleados();
                    foreach($query as $data):
                ?>
                    <tr>
                        <td><?php echo $data['nombre']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['sexo'] == 'M' ? 'Masculino' : 'Femenino'; ?></td>
                        <td><?php echo $data['nombre_areas']; ?></td>
                        <td><?php echo $data['boletin'] == 1 ? 'Si' : 'No'; ?></td>
                        <td><a id="btn_modificar" href="index.php?m=empleado&id=<?php echo $data['id']; ?>"><i class="far fa-edit"></i></a></td>
                        <td><a id="btn_borrar" data-id="<?php echo $data['id']; ?>" ><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>


<script>
$(document).ready(function() {
    $('#btn_borrar').click(function(e) {
        e.preventDefault();
        var employeeId = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'config/data_empleado.php',
                    type: 'POST',
                    data: { codigo_empleado: employeeId },
                    success: function(response) {
                        console.log(response);
                        if (response === 'success') {
                            Swal.fire(
                                '¡Eliminado!',
                                'El empleado ha sido eliminado.',
                                'success'
                            ).then(() => {
                                window.location.href = 'index.php?m=lista_empleados';
                            });
                        } else {
                            Swal.fire(
                                '¡Error!',
                                'Hubo un problema al eliminar el empleado.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            '¡Error!',
                            'Hubo un problema al eliminar el empleado.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
