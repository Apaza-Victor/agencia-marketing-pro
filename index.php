<?php require_once 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing PRO | Agencia Elite</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav>
        <div class="logo">MARKETING.PRO</div>
        <div class="menu">
            <a href="#inicio">Inicio</a>
            <a href="#servicios">Servicios</a>
            <a href="#tienda">Tienda</a>
            <a href="#contacto">Contacto</a>
        </div>
    </nav>

    <header id="inicio" class="hero">
        <div class="hero-content">
            <h1 class="reveal">Estrategia Digital<br>Sin Límites</h1>
            <p class="reveal">Elevamos tu marca al siguiente nivel con diseño de élite.</p>
            <a href="#tienda" class="btn-buy" style="width: auto; display: inline-block;">VER SERVICIOS</a>
        </div>
    </header>

    <section id="servicios">
        <h2 class="section-title reveal">Por qué elegirnos</h2>
        <div class="features-grid">
            <div class="feat-card reveal">
                <div class="icon">🚀</div>
                <h3>Innovación</h3>
                <p>Implementamos las últimas tendencias digitales para que tu marca nunca quede atrás.</p>
            </div>
            <div class="feat-card reveal">
                <div class="icon">🎯</div>
                <h3>Impacto</h3>
                <p>No solo creamos contenido, generamos conversiones y resultados medibles.</p>
            </div>
            <div class="feat-card reveal">
                <div class="icon">✨</div>
                <h3>Elegancia</h3>
                <p>Tu marca merece una estética premium que transmita confianza y autoridad.</p>
            </div>
        </div>
    </section>

    <section id="tienda">
        <h2 class="section-title reveal">Servicios Premium</h2>
        <div class="product-grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM productos");
            while ($row = $stmt->fetch()):
                ?>
                <div class="product-card reveal">
                    <img src="<?php echo $row['imagen']; ?>" alt="Servicio">
                    <h3><?php echo $row['nombre']; ?></h3>
                    <p class="precio">$<?php echo number_format($row['precio'], 2); ?> USD</p>
                    <button class="btn-buy"
                        onclick="procesarPago(<?php echo $row['id']; ?>, '<?php echo $row['nombre']; ?>')">
                        PAGAR AHORA
                    </button>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section id="contacto" style="background: #0a0a0a; color: white; text-align: center;">
        <h2 class="reveal">¿Listo para empezar?</h2>
        <p class="reveal" style="margin-bottom: 2rem;">Hablemos de tu próximo gran proyecto.</p>
        <form id="contactForm" style="max-width: 500px; margin: 0 auto;">
            <input type="text" placeholder="Tu Nombre"
                style="width: 100%; padding: 15px; margin-bottom: 10px; border-radius: 5px; border: none;">
            <input type="email" placeholder="Tu Email"
                style="width: 100%; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: none;">
            <button type="button" class="btn-buy">ENVIAR CONSULTA</button>
        </form>
    </section>

    <script src="assets/js/app.js"></script>
</body>

</html>