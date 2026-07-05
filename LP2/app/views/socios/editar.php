<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<h2>Editar Socio</h2>

<hr>

<form method="POST"
action="index.php?page=socios&accion=actualizar">

<input
type="hidden"
name="idSocio"
value="<?= $socio["idSocio"] ?>">

<div class="row">

<div class="col-md-6">

<label>DNI</label>

<input
class="form-control"
name="dni"
value="<?= $socio["dni"] ?>">

</div>

<div class="col-md-6">

<label>Teléfono</label>

<input
class="form-control"
name="telefono"
value="<?= $socio["telefono"] ?>">

</div>

<div class="col-md-6 mt-3">

<label>Nombres</label>

<input
class="form-control"
name="nombres"
value="<?= $socio["nombres"] ?>">

</div>

<div class="col-md-6 mt-3">

<label>Apellidos</label>

<input
class="form-control"
name="apellidos"
value="<?= $socio["apellidos"] ?>">

</div>

<div class="col-md-6 mt-3">

<label>Dirección</label>

<input
class="form-control"
name="direccion"
value="<?= $socio["direccion"] ?>">

</div>

<div class="col-md-6 mt-3">

<label>Estado</label>

<select
class="form-control"
name="estado">

<option
<?=($socio["estado"]=="Activo")?"selected":""?>>

Activo

</option>

<option
<?=($socio["estado"]=="Inactivo")?"selected":""?>>

Inactivo

</option>

</select>

</div>

<div class="col-md-12 mt-4">

<button class="btn btn-warning">

Actualizar

</button>

<a href="index.php?page=socios"
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