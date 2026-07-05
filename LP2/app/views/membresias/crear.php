<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<h2>Nueva Membresía</h2>

<hr>

<form
method="POST"
action="index.php?page=membresias&accion=guardar">

<div class="row">

<div class="col-md-6">

<label>Socio</label>

<select
name="idSocio"
class="form-control"
required>

<option value="">Seleccione...</option>

<?php foreach($socios as $s){ ?>

<option value="<?= $s["idSocio"] ?>">

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

<option>Mensual</option>

<option>Trimestral</option>

<option>Semestral</option>

<option>Anual</option>

</select>

</div>

<div class="col-md-6 mt-3">

<label>Fecha Inicio</label>

<input
type="date"
name="fechaInicio"
class="form-control"
required>

</div>

<div class="col-md-6 mt-3">

<label>Fecha Fin</label>

<input
type="date"
name="fechaFin"
class="form-control"
required>

</div>

<div class="col-md-6 mt-3">

<label>Costo</label>

<input
type="number"
step="0.01"
name="costo"
class="form-control"
required>

</div>

<div class="col-md-6 mt-3">

<label>Estado</label>

<select
name="estado"
class="form-control">

<option>Vigente</option>

<option>Vencida</option>

</select>

</div>

<div class="col-md-12 mt-4">

<button class="btn btn-warning">

Guardar

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