<?php
$nombre = 'Edison Fernandez';
$titulo = 'Arquitecto y desarrollador de software';
$ubicacion = 'Quito, Ecuador';
$linkedin = 'https://www.linkedin.com/in/edisonfernandez';
$x = 'https://x.com/edisonfernandez';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Site Edison Fernandez</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<main class="container py-5">
    <div class="row align-items-center g-5">
        <div class="col-md-4 text-center">
            <div class="foto-perfil mx-auto">EF</div>
        </div>
        <div class="col-md-8">
            <h1 class="display-5 fw-bold"><?php echo $nombre; ?></h1>
            <p class="lead text-secondary"><?php echo $titulo; ?></p>
            <p class="mb-3">📍 <?php echo $ubicacion; ?></p>
            <a class="icono-red text-primary me-3" href="<?php echo $linkedin; ?>" target="_blank" rel="noopener"
               aria-label="LinkedIn" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a class="icono-red text-dark" href="<?php echo $x; ?>" target="_blank" rel="noopener"
               aria-label="X (antes Twitter)" title="X (antes Twitter)"><i class="bi bi-twitter-x"></i></a>
        </div>
    </div>

    <section class="mt-5">
        <h2 class="h4">Sobre mí</h2>
        <p>
            Con más de 10 años de trayectoria profesional, mi enfoque se centra en el diseño,
            desarrollo e implementación de aplicaciones de software. En Nisum Latam, aplico
            diariamente mis habilidades en diseño arquitectónico de software, asegurando soluciones
            de alta calidad que satisfacen las necesidades de los clientes.
        </p>
        <p>
            Como fundador de Community Angular Quito, mi pasión por el aprendizaje y la enseñanza
            se refleja en mi contribución al Grupo de Desarrolladores de Google - GDG Quito. Mi
            compromiso con la excelencia se manifiesta en cada proyecto, donde el detalle y los
            resultados medibles son mi firma profesional.
        </p>
    </section>

    <section class="mt-4">
        <h2 class="h4">Experiencia</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Nisum Latam</strong> — Diseño arquitectónico de software
            </li>
            <li class="list-group-item">
                <strong>Community Angular Quito</strong> — Fundador
            </li>
            <li class="list-group-item">
                <strong>GDG Quito</strong> — Contribuyente en la comunidad de desarrolladores de Google
            </li>
        </ul>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
