<?php
include "../app/views/layout/header.php";
include "../app/views/layout/sidebar.php";

?>
<div class="content">
<h2>
Bienvenido,
<?= $_SESSION["nombre"]; ?>
👋
</h2>
<hr>
<div class="row">
<div class="col-md-3">
<div class="card card-dashboard">
<div class="card-body">
<h5>

<i class="bi bi-people-fill"></i>
Socios
</h5>
<h1><?= $socios ?></h1>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card card-dashboard">
<div class="card-body">
<h5>
<i class="bi bi-award-fill"></i>

Membresías
</h5>
<h1><?= $membresias ?></h1>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card card-dashboard">
<div class="card-body">
<h5>
<i class="bi bi-cash-stack"></i>

Pagos
</h5>
<h1>S/. <?= $pagos ?></h1>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card card-dashboard">
<div class="card-body">
<h5>
<i class="bi bi-calendar-check-fill"></i>
<i class="bi bi-cash-stack"></i>

Asistencias
</h5>
<h1><?= $asistencias ?></h1>
</div>
</div>
</div>
</div>
</div>
<?php
include "../app/views/layout/footer.php";
?>