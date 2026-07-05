<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<h2>Editar Membresía</h2>

<hr>

<form
method="POST"
action="index.php?page=membresias&accion=actualizar">

<input
type="hidden"
name="idMembresia"
value="<?= $membresia["idMembresia"] ?>">

<div class="row">

<div class="col-md-6">

<label>Socio</label>

<select
name="idSocio"
class="form-control">

<?php foreach($socios as $s){ ?>

<option
value="<?= $s["idSocio"] ?>"
<?= ($membresia["idSocio"]==$s["idSocio"])?"selected":""; ?>>

<?= $s["nombres"]." ".$s["apellidos"] ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-6">

<label>Tipo</label>

<select
name="tipo"
class="form-control">

<option <?=($membresia["tipo"]=="Mensual")?"selected":""?>>Mensual</option>

<option <?=($membresia["tipo"]=="Trimestral")?"selected":""?>>Trimestral</option>

<option <?=($membresia["tipo"]=="Semestral")?"selected":""?>>Semestral</option>

<option <?=($membresia["tipo"]=="Anual")?"selected":""?>>Anual</option>

</select>

</div>

<div class="col-md-6 mt-3">

<label>Fecha Inicio</label>

<input
type="date"
name="fechaInicio"
value="<?= $membresia["fechaInicio"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Fecha Fin</label>

<input
type="date"
name="fechaFin"
value="<?= $membresia["fechaFin"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Costo</label>

<input
type="number"
step="0.01"
name="costo"
value="<?= $membresia["costo"] ?>"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Estado</label>

<select
name="estado"
class="form-control">

<option <?=($membresia["estado"]=="Vigente")?"selected":""?>>

Vigente

</option>

<option <?=($membresia["estado"]=="Vencida")?"selected":""?>>

Vencida

</option>

</select>

</div>

<div class="col-md-12 mt-4">

<button class="btn btn-warning">

Actualizar

</button>

<a
href="index.php?page=membresias"
class="btn btn-secondary">

Cancelar

</a>

</div>

</div>

</form>

</div>

<?php

include "../app/views/layout/footer.php";

?>