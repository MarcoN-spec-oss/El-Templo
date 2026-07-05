<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<h2>Registrar Asistencia</h2>

<hr>

<form method="POST"
action="index.php?page=asistencias&accion=guardar">

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

<div class="col-md-3">

<label>Fecha</label>

<input type="date" name="fecha" class="form-control" required>

</div>

<div class="col-md-3">

<label>Hora Entrada</label>

<input type="time" name="horaEntrada" class="form-control" required>

</div>

<div class="col-md-12 mt-4">

<button class="btn btn-warning">Guardar</button>

<a href="index.php?page=asistencias" class="btn btn-secondary">Cancelar</a>

</div>

</div>

</form>

</div>

<?php include "../app/views/layout/footer.php"; ?>