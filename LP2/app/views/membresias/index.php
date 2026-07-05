<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<div class="d-flex justify-content-between align-items-center">

<h2>Membresías</h2>

<a href="index.php?page=membresias&accion=crear"
class="btn btn-warning">

<i class="bi bi-plus-circle"></i>

Nueva Membresía

</a>

</div>

<hr>

<table class="table table-dark table-hover table-bordered">

<thead class="table-warning text-dark">

<tr>

<th>ID</th>

<th>Socio</th>

<th>Tipo</th>

<th>Inicio</th>

<th>Fin</th>

<th>Costo</th>

<th>Estado</th>

<th width="180">Acciones</th>

</tr>

</thead>

<tbody>

<?php foreach($membresias as $m){ ?>

<tr>

<td><?= $m["idMembresia"] ?></td>

<td><?= $m["socio"] ?></td>

<td><?= $m["tipo"] ?></td>

<td><?= $m["fechaInicio"] ?></td>

<td><?= $m["fechaFin"] ?></td>

<td>S/. <?= number_format($m["costo"],2) ?></td>

<td>

<?php if($m["estado"]=="Vigente"){ ?>

<span class="badge bg-success">Vigente</span>

<?php }else{ ?>

<span class="badge bg-danger">Vencida</span>

<?php } ?>

</td>

<td>

<a
href="index.php?page=membresias&accion=editar&id=<?= $m["idMembresia"] ?>"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

</a>

<a
href="index.php?page=membresias&accion=eliminar&id=<?= $m["idMembresia"] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar esta membresía?')">

<i class="bi bi-trash"></i>

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