<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<div class="d-flex justify-content-between align-items-center">

<h2>Pagos</h2>

<a href="index.php?page=pagos&accion=crear" class="btn btn-warning">

<i class="bi bi-plus-circle"></i>

Nuevo Pago

</a>

</div>

<hr>

<table class="table table-dark table-hover table-bordered">

<thead class="table-warning text-dark">

<tr>

<th>ID</th>
<th>Socio</th>
<th>Fecha</th>
<th>Monto</th>
<th>Método</th>
<th>Estado</th>
<th width="180">Acciones</th>

</tr>

</thead>

<tbody>

<?php foreach($pagos as $p){ ?>

<tr>

<td><?= $p["idPago"] ?></td>

<td><?= $p["socio"] ?></td>

<td><?= $p["fechaPago"] ?></td>

<td>S/. <?= number_format($p["monto"],2) ?></td>

<td><?= $p["metodoPago"] ?></td>

<td>

<?php if($p["estado"]=="Pagado"){ ?>

<span class="badge bg-success">Pagado</span>

<?php }else{ ?>

<span class="badge bg-danger">Pendiente</span>

<?php } ?>

</td>

<td>

<a href="index.php?page=pagos&accion=editar&id=<?= $p["idPago"] ?>"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

</a>

<a href="index.php?page=pagos&accion=eliminar&id=<?= $p["idPago"] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar este pago?')">

<i class="bi bi-trash-fill"></i>

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include "../app/views/layout/footer.php"; ?>