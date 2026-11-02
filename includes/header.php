<?php
// Nombre del archivo actual (ej: "index.php") para marcar el enlace activo
$paginaActual = basename($_SERVER['SCRIPT_NAME']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Site Edison Fernandez</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $paginaActual === 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $paginaActual === 'portafolio.php' ? 'active' : ''; ?>" href="portafolio.php">Portafolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $paginaActual === 'calculadora.php' ? 'active' : ''; ?>" href="calculadora.php">Calculadora</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
