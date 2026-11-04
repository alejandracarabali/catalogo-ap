<?php
// catalogo.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .grid-productos { display: flex; gap: 20px; flex-wrap: wrap; margin: 20px; }
        .card-producto { border: 1px solid #ccc; border-radius: 8px; padding: 15px; width: 220px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1); }
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
        .modal-contenido { background: #fff; width: 350px; margin: 12% auto; padding: 20px; border-radius: 8px; position: relative; }
    </style>
</head>
<body>
    <h1 style="margin-left: 20px;">Catálogo de Productos</h1>

    <?php
    $productos = [
        ['id' => 1, 'nombre' => 'Laptop Gamer', 'precio' => 3500000, 'descripcion' => 'Intel Core i7, 16GB RAM, SSD 512GB, RTX 3060.'],
        ['id' => 2, 'nombre' => 'Teclado Mecánico', 'precio' => 250000, 'descripcion' => 'Switches Red silenciosos, retroiluminación RGB.'],
        ['id' => 3, 'nombre' => 'Monitor 24 IPS', 'precio' => 780000, 'descripcion' => 'Resolución Full HD, tasa de refresco 144Hz, 1ms.']
    ];
    ?>

    <div class="grid-productos">
        <?php foreach ($productos as $prod): ?>
            <div class="card-producto">
                <h3><?php echo htmlspecialchars($prod['nombre']); ?></h3>
                <p><strong>Precio:</strong> $<?php echo number_format($prod['precio']); ?></p>
                
                <!-- Botón Reparado con Atributos de Datos -->
                <button class="btn-detalles"
                        data-nombre="<?php echo htmlspecialchars($prod['nombre']); ?>"
                        data-precio="<?php echo number_format($prod['precio']); ?>"
                        data-descripcion="<?php echo htmlspecialchars($prod['descripcion']); ?>"
                        onclick="mostrarModal(this)"
                        style="padding: 8px 12px; cursor: pointer;">
                    Ver detalles
                </button>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Modal de Información -->
    <div id="modalDetalles" class="modal">
        <div class="modal-contenido">
            <h2 id="modalNombre"></h2>
            <p><strong>Precio:</strong> $<span id="modalPrecio"></span></p>
            <p id="modalDescripcion" style="color: #555;"></p>
            <button onclick="cerrarModal()" style="padding: 6px 12px; margin-top: 10px; cursor: pointer;">Cerrar</button>
        </div>
    </div>

    <script>
    function mostrarModal(boton) {
        document.getElementById('modalNombre').innerText = boton.getAttribute('data-nombre');
        document.getElementById('modalPrecio').innerText = boton.getAttribute('data-precio');
        document.getElementById('modalDescripcion').innerText = boton.getAttribute('data-descripcion');
        document.getElementById('modalDetalles').style.display = 'block';
    }

    function cerrarModal() {
        document.getElementById('modalDetalles').style.display = 'none';
    }
    </script>
</body>
</html>