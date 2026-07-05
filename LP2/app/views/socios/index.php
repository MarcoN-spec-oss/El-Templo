<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

    <div class="d-flex justify-content-between align-items-center">

        <h2>Socios</h2>

        <a href="index.php?page=socios&accion=crear" class="btn btn-warning">
            Nuevo Socio
        </a>

    </div>

    <hr>

    <table class="table table-dark table-hover table-bordered">

        <thead class="table-warning text-dark">

            <tr>

                <th>ID</th>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Estado</th>
                <th width="180">Acciones</th>

            </tr>

        </thead>

        <tbody>

        <?php foreach($socios as $s){ ?>

            <tr>

                <td><?= $s["idSocio"] ?></td>

                <td><?= $s["dni"] ?></td>

                <td><?= $s["nombres"] ?></td>

                <td><?= $s["apellidos"] ?></td>

                <td>

                    <?php if($s["estado"]=="Activo"){ ?>

                        <span class="badge bg-success">Activo</span>

                    <?php }else{ ?>

                        <span class="badge bg-danger">Inactivo</span>

                    <?php } ?>

                </td>

                <td>

                    <a href="index.php?page=socios&accion=editar&id=<?= $s["idSocio"] ?>"
                    class="btn btn-warning btn-sm">

                        <i class="bi bi-pencil-square"></i> Editar

                    </a>

                    <a href="index.php?page=socios&accion=eliminar&id=<?= $s["idSocio"] ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('¿Está seguro de eliminar este socio?')">

                        <i class="bi bi-trash-fill"></i> Eliminar

                    </a>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

<?php

include "../app/views/layout/footer.php";

?>