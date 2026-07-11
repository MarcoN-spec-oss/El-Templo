<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>El Templo Gym | Acceso Socio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>
<body>

<div class="auth-wrapper">
<div class="auth-card">

    <div class="auth-header">
        <h1><i class="bi bi-person-badge-fill"></i> EL TEMPLO</h1>
        <p>Portal del socio</p>
    </div>

    <div class="auth-tabs">
        <a href="index.php?page=login">Administrador</a>
        <a href="index.php?page=login-socio" class="active">Soy Socio</a>
    </div>

    <div class="auth-body">

        <?php if (isset($error)) { ?>
        <div class="alert alert-danger py-2">
            <i class="bi bi-exclamation-triangle-fill"></i> <?= $error ?>
        </div>
        <?php } ?>

        <form method="POST" action="index.php?page=login-socio" class="needs-validation" novalidate>

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <div class="input-icon-group">
                    <i class="bi bi-person-fill field-icon"></i>
                    <input type="text" name="usuario" class="form-control" required autofocus placeholder="Tu DNI o usuario">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <div class="input-icon-group">
                    <i class="bi bi-lock-fill field-icon"></i>
                    <input type="password" name="password" id="passwordSocio" class="form-control" required>
                    <button type="button" class="toggle-password" data-target="passwordSocio">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <div class="d-grid mt-4">
                <button class="btn btn-gold">
                    <i class="bi bi-box-arrow-in-right"></i> Ingresar
                </button>
            </div>

        </form>

        <div class="auth-footer-link">
            ¿Aún no tienes acceso? Pide tus credenciales en recepción.
        </div>

    </div>
</div>
</div>

<script src="js/app.js"></script>
</body>
</html>
