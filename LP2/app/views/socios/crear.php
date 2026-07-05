<?php

include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>

<div class="content">

<h2>Nuevo Socio</h2>

<hr>

<form method="POST"
action="index.php?page=socios&accion=guardar">

<div class="row">

<div class="col-md-6">

<label>DNI</label>

<input
type="text"
name="dni"
class="form-control"
required>

</div>

<div class="col-md-6">

<label>Teléfono</label>

<input
type="text"
name="telefono"
class="form-control">

</div>

<div class="col-md-6 mt-3">

<label>Nombres</label>

<input
type="text"
name="nombres"
class="form-control"
required>

</div>

<div class="col-md-6 mt-3">

<label>Apellidos</label>

<input
type="text"
name="apellidos"
class="form-control"
required>

</div>

<div class="col-md-12 mt-3">

<label>Dirección</label>

<input
type="text"
name="direccion"
class="form-control">

</div>

<div class="col-md-12 mt-4">

<button class="btn btn-warning">

Guardar

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