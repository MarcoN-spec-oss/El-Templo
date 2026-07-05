<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>EL TEMPLO GYM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

background:#111;

height:100vh;

display:flex;

justify-content:center;

align-items:center;

}

.card{

width:400px;

background:#1f1f1f;

color:white;

border:3px solid #FFC107;

border-radius:15px;

}

.btn-warning{

font-weight:bold;

}

h2{

color:#FFC107;

text-align:center;

}

</style>

</head>

<body>

<div class="card shadow">

<div class="card-body">

<h2>EL TEMPLO</h2>

<h5 class="text-center mb-4">Iniciar Sesión</h5>

<?php if(isset($error)){ ?>

<div class="alert alert-danger">

<?= $error ?>

</div>

<?php } ?>

<form method="POST" action="index.php?page=login">

<div class="mb-3">

<label>Usuario</label>

<input
type="text"
name="usuario"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Contraseña</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="d-grid">

<button class="btn btn-warning">

Ingresar

</button>

</div>

</form>

</div>

</div>

</body>

</html>