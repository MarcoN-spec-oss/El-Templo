<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<h2>Editar Pago</h2>

<hr>

<form method="POST"
action="index.php?page=pagos&accion=actualizar">

<input
type="hidden"
name="idPago"
value="<?= $pago["idPago"] ?>">

<div class="row">

<div class="col-md-6">

<label>Socio</label>

<select
name="idSocio"
class="form-control">

<?php foreach($socios as $s){ ?>

<option
value="<?= $s["idSocio"] ?>"
<?= ($pago["idSocio"]==$s["idSocio"])?"selected":"" ?>>

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
value="<?= $pago["fechaPago"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Monto</label>

<input
type="number"
step="0.01"
name="monto"
value="<?= $pago["monto"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Método Pago</label>

<select
name="metodoPago"
class="form-control">

<option <?=($pago["metodoPago"]=="Efectivo")?"selected":""?>>Efectivo</option>

<option <?=($pago["metodoPago"]=="Yape")?"selected":""?>>Yape</option>

<option <?=($pago["metodoPago"]=="Plin")?"selected":""?>>Plin</option>

<option <?=($pago["metodoPago"]=="Transferencia")?"selected":""?>>Transferencia</option>

<option <?=($pago["metodoPago"]=="Tarjeta")?"selected":""?>>Tarjeta</option>

</select>

</div>

<div class="col-md-6 mt-3">

<label>Estado</label>

<select
name="estado"
class="form-control">

<option <?=($pago["estado"]=="Pagado")?"selected":""?>>Pagado</option>

<option <?=($pago["estado"]=="Pendiente")?"selected":""?>>Pendiente</option>

</select>

</div>

<div class="col-md-12 mt-4">

<button class="btn btn-warning">

Actualizar

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