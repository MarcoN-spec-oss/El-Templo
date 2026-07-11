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
<hr>
<h5><i class="bi bi-key-fill"></i> Acceso al portal del socio</h5>
<p class="text-muted" style="font-size:.85rem;">
Si dejas estos campos vacíos, se usará el DNI como usuario y como contraseña por defecto.
</p>
</div>

<div class="col-md-6">

<label>Usuario (opcional)</label>

<input
type="text"
name="usuario"
class="form-control"
placeholder="Por defecto: el DNI">

</div>

<div class="col-md-6">

<label>Contraseña (opcional)</label>

<input
type="text"
name="password"
class="form-control"
placeholder="Por defecto: el DNI">

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