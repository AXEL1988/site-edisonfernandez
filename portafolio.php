<?php
// Proyectos de ejemplo: reemplazar por los reales
$proyectos = [
    [
        'nombre' => 'Proyecto de ejemplo 1',
        'descripcion' => 'Descripción breve del proyecto, el problema que resuelve y tu rol.',
        'tecnologias' => ['Angular', 'TypeScript'],
    ],
    [
        'nombre' => 'Proyecto de ejemplo 2',
        'descripcion' => 'Descripción breve del proyecto, el problema que resuelve y tu rol.',
        'tecnologias' => ['PHP', 'Bootstrap'],
    ],
    [
        'nombre' => 'Proyecto de ejemplo 3',
        'descripcion' => 'Descripción breve del proyecto, el problema que resuelve y tu rol.',
        'tecnologias' => ['Arquitectura', 'APIs'],
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Site Edison Fernandez</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<main class="container py-5">
    <h1 class="mb-4">Portafolio</h1>

    <div class="row g-4">
        <?php foreach ($proyectos as $proyecto): ?>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="h5 card-title"><?php echo htmlspecialchars($proyecto['nombre']); ?></h2>
                        <p class="card-text"><?php echo htmlspecialchars($proyecto['descripcion']); ?></p>
                        <?php foreach ($proyecto['tecnologias'] as $tecnologia): ?>
                            <span class="badge text-bg-secondary"><?php echo htmlspecialchars($tecnologia); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
