Views/usuarios/usuario_index.php

<?= $this->extend('layout/dashboard' ); ?>



<?= $this->section('content') ?>

<section class="col-12">
    <div class="card">
        <h4 class="fw-bold mb-3">
            
        LISTA DE USUARIOS</h4>

        <a href="/usuarios/create" class="btn btn-sm btn-primary mb-3"><i class="bi bi-plus-circle"></i> Nuevo Usuario</a>




        <table class="table table-responsive">
        
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Status</th>
            </tr>

        </thead>


    

        <tbody>
        <?php foreach ($usuarios as $usuario){ ?>
            <tr> <!-- renglon -->
                <th><?= $usuario['id'] ?></th>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><?= $usuario['status'] ?></td>
                <td>
                    <a href="/usuarios/<?= $usuario['id'] ?>" class=" btn btn-sm btn-success"><i class="bi bi-eye"></i></a>
                    <a href="/usuarios/editar/<?= $usuario['id'] ?>"class=" btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                    <button onclick="eliminar(<?= $usuario['id'] ?>)" class=" btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
                </td>
            </tr> <!-- Fin renglon -->
        <?php    }   ?>
 
        </tbody>
    </table>
<script>
    function eliminar(id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, elimínalo!"
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "/usuarios/delete/" + id;
            }
        });
    }
</script>


<?= $this->endSection() ?>