<?php
$hoy = date("Y-m-d");
$membresiaVigente = false;
$diasRestantes = null;

if ($membresiaActiva && !empty($membresiaActiva["fechaFin"])) {
    $diasRestantes = (strtotime($membresiaActiva["fechaFin"]) - strtotime($hoy)) / 86400;
    $membresiaVigente = ($diasRestantes >= 0) && (strtolower($membresiaActiva["estado"]) !== "cancelada");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>El Templo Gym | Mi cuenta</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>
<body>

<nav class="portal-navbar">
    <div class="brand"><i class="bi bi-lightning-charge-fill"></i>EL TEMPLO</div>
    <div class="user-chip">
        <div class="avatar"><?= strtoupper(substr($socio["nombres"], 0, 1)) ?></div>
        <span><?= htmlspecialchars($socio["nombres"] . " " . $socio["apellidos"]) ?></span>
        <a href="index.php?page=logout-socio" class="btn btn-sm btn-outline-light ms-2">
            <i class="bi bi-box-arrow-right"></i> Salir
        </a>
    </div>
</nav>

<div class="portal-container">

    <div class="portal-hero">
        <div>
            <h2>Hola, <?= htmlspecialchars($socio["nombres"]) ?> 👋</h2>
            <p>Este es tu resumen como socio de El Templo Gym.</p>
        </div>
        <div>
            <?php if ($socio["estado"] === "Activo") { ?>
                <span class="status-pill activo"><i class="bi bi-check-circle-fill"></i> Socio activo</span>
            <?php } else { ?>
                <span class="status-pill inactivo"><i class="bi bi-x-circle-fill"></i> Socio inactivo</span>
            <?php } ?>
        </div>
    </div>

    <div class="portal-tabs">
        <button class="active" data-tab="tab-perfil"><i class="bi bi-person-fill"></i>Mi perfil</button>
        <button data-tab="tab-membresia"><i class="bi bi-award-fill"></i>Membresía</button>
        <button data-tab="tab-pagos"><i class="bi bi-cash-stack"></i>Pagos</button>
        <button data-tab="tab-asistencia"><i class="bi bi-calendar-check-fill"></i>Asistencia</button>
    </div>

    <!-- ================= PERFIL ================= -->
    <div class="portal-panel active" id="tab-perfil">
        <div class="info-grid">
            <div class="info-item">
                <span class="label">DNI</span>
                <span class="value"><?= htmlspecialchars($socio["dni"]) ?></span>
            </div>
            <div class="info-item">
                <span class="label">Nombres</span>
                <span class="value"><?= htmlspecialchars($socio["nombres"] . " " . $socio["apellidos"]) ?></span>
            </div>
            <div class="info-item">
                <span class="label">Teléfono</span>
                <span class="value"><?= htmlspecialchars($socio["telefono"] ?: "No registrado") ?></span>
            </div>
            <div class="info-item">
                <span class="label">Dirección</span>
                <span class="value"><?= htmlspecialchars($socio["direccion"] ?: "No registrada") ?></span>
            </div>
            <div class="info-item">
                <span class="label">Total de asistencias</span>
                <span class="value"><?= count($asistencias) ?></span>
            </div>
            <div class="info-item">
                <span class="label">Total de pagos registrados</span>
                <span class="value"><?= count($pagos) ?></span>
            </div>
        </div>
    </div>

    <!-- ================= MEMBRESÍA ================= -->
    <div class="portal-panel" id="tab-membresia">

        <?php if ($membresiaActiva) { ?>

            <div class="info-grid">
                <div class="info-item">
                    <span class="label">Estado</span>
                    <span class="value">
                        <?php if ($membresiaVigente) { ?>
                            <span class="status-pill activo"><i class="bi bi-check-circle-fill"></i> Vigente</span>
                        <?php } else { ?>
                            <span class="status-pill inactivo"><i class="bi bi-x-circle-fill"></i> Vencida</span>
                        <?php } ?>
                    </span>
                </div>
                <div class="info-item">
                    <span class="label">Tipo de membresía</span>
                    <span class="value"><?= htmlspecialchars($membresiaActiva["tipo"]) ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Costo</span>
                    <span class="value">S/. <?= number_format($membresiaActiva["costo"], 2) ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Inicio</span>
                    <span class="value"><?= date("d/m/Y", strtotime($membresiaActiva["fechaInicio"])) ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Vencimiento</span>
                    <span class="value"><?= date("d/m/Y", strtotime($membresiaActiva["fechaFin"])) ?></span>
                </div>
                <div class="info-item">
                    <span class="label"><?= $membresiaVigente ? "Días restantes" : "Vencida hace" ?></span>
                    <span class="value"><?= abs(floor($diasRestantes)) ?> días</span>
                </div>
            </div>

        <?php } ?>

        <h5 class="mt-4 mb-3"><i class="bi bi-clock-history"></i> Historial de membresías</h5>

        <?php if (count($membresias) > 0) { ?>
            <div class="table-responsive">
                <table class="table table-dark table-hover table-bordered align-middle">
                    <thead class="table-warning text-dark">
                        <tr>
                            <th>Tipo</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Costo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($membresias as $m) { ?>
                            <tr>
                                <td><?= htmlspecialchars($m["tipo"]) ?></td>
                                <td><?= date("d/m/Y", strtotime($m["fechaInicio"])) ?></td>
                                <td><?= date("d/m/Y", strtotime($m["fechaFin"])) ?></td>
                                <td>S/. <?= number_format($m["costo"], 2) ?></td>
                                <td><?= htmlspecialchars($m["estado"]) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="empty-state">
                <i class="bi bi-award"></i>
                Aún no tienes membresías registradas.
            </div>
        <?php } ?>
    </div>

    <!-- ================= PAGOS ================= -->
    <div class="portal-panel" id="tab-pagos">
        <?php if (count($pagos) > 0) { ?>
            <div class="table-responsive">
                <table class="table table-dark table-hover table-bordered align-middle">
                    <thead class="table-warning text-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Método</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagos as $p) { ?>
                            <tr>
                                <td><?= date("d/m/Y", strtotime($p["fechaPago"])) ?></td>
                                <td>S/. <?= number_format($p["monto"], 2) ?></td>
                                <td><?= htmlspecialchars($p["metodoPago"]) ?></td>
                                <td>
                                    <?php if (strtolower($p["estado"]) === "pagado") { ?>
                                        <span class="badge bg-success">Pagado</span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary"><?= htmlspecialchars($p["estado"]) ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="empty-state">
                <i class="bi bi-cash-stack"></i>
                Aún no tienes pagos registrados.
            </div>
        <?php } ?>
    </div>

    <!-- ================= ASISTENCIA ================= -->
    <div class="portal-panel" id="tab-asistencia">
        <?php if (count($asistencias) > 0) { ?>
            <div class="table-responsive">
                <table class="table table-dark table-hover table-bordered align-middle">
                    <thead class="table-warning text-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Hora de ingreso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($asistencias as $a) { ?>
                            <tr>
                                <td><?= date("d/m/Y", strtotime($a["fecha"])) ?></td>
                                <td><?= date("h:i A", strtotime($a["horaEntrada"])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="empty-state">
                <i class="bi bi-calendar-x"></i>
                Aún no tienes asistencias registradas.
            </div>
        <?php } ?>
    </div>

</div>

<script src="js/app.js"></script>
</body>
</html>
