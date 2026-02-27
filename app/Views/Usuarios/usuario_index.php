Views/usuarios/usuario_index.php

<?= $this->extend('layout/dashboard' ); ?>



<?= $this->section('content') ?>

<section class="col-12">
    <div class="card">
        <h4 class="fw-bold mb-3">LISTA DE USUARIOS</h4>

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
                    <a href="/usuarios/eliminar/<?= $usuario['id'] ?>"class=" btn btn-sm btn-danger"><i class="bi bi-trash3"></i></a>
                </td>
            </tr> <!-- Fin renglon -->
        <?php    }   ?>
 
        </tbody>
    </table>



<?= $this->endSection() ?>