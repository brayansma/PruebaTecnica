<div class="container" style="margin-top: 80px">

        <h2>Lista de Roles</h2>
        
    <div class="container">
<div class="text-right">
    <a type="button" href="index.php?m=roles" class="btn btn-primary"><i class="fas fa-user-plus"></i> Crear</a>
</div>

        <table class="table table-striped ">
            <thead>
                <tr>
                    <!-- <th>id</th> -->
                    <th><i class="fas fa-user"></i> Nombre Roles</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once("config/data_roles.php");
                    $query = listRoles();
                    foreach($query as $data):
                ?>
                    <tr>
                        <td><?php echo $data['nombre']; ?></td>
                        <td><a id="btn_modificar_roles" href="index.php?m=roles&id=<?php echo $data['id']; ?>"><i class="far fa-edit"></i></a></td>
                        <td><a id="btn_borrar_roles" data-id="<?php echo $data['id']; ?>" onclick="borrarRoles(<?php echo $data['id']; ?>)" ><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>

<script>
function borrarRoles(id_roles) {
    
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
                    url: 'config/data_area.php',
                    type: 'POST',
                    data: { codigo_area: id_roles },
                    success: function(response) {
                        console.log(response);
                        if (response === 'success') {
                            Swal.fire(
                                '¡Eliminado!',
                                'El area ha sido eliminado.',
                                'success'
                            ).then(() => {
                                window.location.href = 'index.php?m=lista_areas';
                            });
                        } else {
                            Swal.fire(
                                '¡Error!',
                                'Hubo un problema al eliminar el area.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            '¡Error!',
                            'Hubo un problema al eliminar el area.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>