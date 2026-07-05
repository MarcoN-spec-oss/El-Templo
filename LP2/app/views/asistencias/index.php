<?php
include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";
?>
<div class="content">
<div class="d-flex justify-content-between align-items-center">
<h2>Asistencias</h2>
<a href="index.php?page=asistencias&accion=crear" class="btn btn-warning">
    <i class="bi bi-plus-circle"></i> Registrar
</a>
</div>
<hr>
<table class="table table-dark table-hover table-bordered">
<thead class="table-warning text-dark">
<tr>
<th>ID</th>
<th>Socio</th>
<th>Fecha</th>
<th>Hora Entrada</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php foreach($asistencias as $a){ ?>
<tr>
<td><?= $a["idAsistencia"] ?></td>
<td><?= $a["socio"] ?></td>
<td><?= $a["fecha"] ?></td>
<td><?= $a["horaEntrada"] ?></td>
<td>
<a href="index.php?page=asistencias&accion=eliminar&id=<?= $a["idAsistencia"] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar registro?')">
<i class="bi bi-trash"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php include "../app/views/layout/footer.php"; ?>