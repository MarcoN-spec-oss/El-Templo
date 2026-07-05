<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<h2>Registrar Pago</h2>

<hr>

<form method="POST"
action="index.php?page=pagos&accion=guardar">

<div class="row">

<div class="col-md-6">

<label>Socio</label>

<select name="idSocio" class="form-control" required>

<option value="">Seleccione...</option>

<?php foreach($socios as $s){ ?>

<option value="<?= $s["idSocio"] ?>">

<?= $s["nombres"]." ".$s["apellidos"] ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-6">

<label>Fecha Pago</label>

<input
type="date"
name="fechaPago"
class="form-control"
required>

</div>

<div class="col-md-6 mt-3">

<label>Monto</label>

<input
type="number"
step="0.01"
name="monto"
class="form-control"
required>

</div>

<div class="col-md-6 mt-3">

<label>Método de Pago</label>

<select
name="metodoPago"
class="form-control">

<option>Efectivo</option>
<option>Yape</option>
<option>Plin</option>
<option>Transferencia</option>
<option>Tarjeta</option>

</select>

</div>

<div class="col-md-6 mt-3">

<label>Estado</label>

<select
name="estado"
class="form-control">

<option>Pagado</option>
<option>Pendiente</option>

</select>

</div>

<div class="col-md-12 mt-4">

<button class="btn btn-warning">

Guardar

</button>

<a href="index.php?page=pagos"
class="btn btn-secondary">

Cancelar

</a>

</div>

</div>

</form>

</div>

<?php include "../app/views/layout/footer.php"; ?>