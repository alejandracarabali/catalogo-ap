<?php
// catalogo.php
require_once 'config/database.php';

// Productos de prueba para el catálogo
$productos = [
    [
        'id' => 1,
        'nombre' => 'Portátil Pro 15',
        'descripcion' => 'Procesador i7, 16GB RAM, 512GB SSD. Ideal para trabajo pesado y desarrollo.',
        'precio' => '1200.00',
        'imagen' => 'https://via.placeholder.com/300x200?text=Laptop'
    ],
    [
        'id' => 2,
        'nombre' => 'Monitor 4K UHD',
        'descripcion' => 'Pantalla de 27 pulgadas con resolución 3840x2160 y panel IPS de alta precisión.',
        'precio' => '350.00',
        'imagen' => 'https://via.placeholder.com/300x200?text=Monitor'
    ],
    [
        'id' => 3,
        'nombre' => 'Teclado Mecánico RGB',
        'descripcion' => 'Switches Red silenciosos, retroiluminación personalizable y estructura de aluminio.',
        'precio' => '85.00',
        'imagen' => 'https://via.placeholder.com/300x200?text=Teclado'
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">Catálogo de Productos</h1>
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach($productos as $producto): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                            <p class="card-text text-primary fw-bold">$<?php echo htmlspecialchars($producto['precio']); ?></p>
                            
                            <!-- Botón configurado con data-attributes para el Modal Dinámico -->
                            <button type="button" 
                                    class="btn btn-outline-primary btn-detalles" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalDetalles"
                                    data-nombre="<?php echo htmlspecialchars($producto['nombre']); ?>"
                                    data-descripcion="<?php echo htmlspecialchars($producto['descripcion']); ?>"
                                    data-precio="<?php echo htmlspecialchars($producto['precio']); ?>"
                                    data-imagen="<?php echo htmlspecialchars($producto['imagen']); ?>">
                                Ver detalles
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal Dinámico Único -->
    <div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="modalDetallesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNombre">Detalles del Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImagen" src="" class="img-fluid mb-3 rounded" alt="Imagen del producto">
                    <p id="modalDescripcion" class="text-muted"></p>
                    <h4 id="modalPrecio" class="text-success fw-bold"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y Script Dinámico -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalDetalles = document.getElementById('modalDetalles');
        if (modalDetalles) {
            modalDetalles.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                
                // Extraer información de los atributos data-*
                const nombre = button.getAttribute('data-nombre');
                const descripcion = button.getAttribute('data-descripcion');
                const precio = button.getAttribute('data-precio');
                const imagen = button.getAttribute('data-imagen');

                // Inyectar la información en los elementos del modal
                document.getElementById('modalNombre').textContent = nombre;
                document.getElementById('modalDescripcion').textContent = descripcion;
                document.getElementById('modalPrecio').textContent = '$' + precio;
                document.getElementById('modalImagen').setAttribute('src', imagen);
            });
        }
    });
    </script>
</body>
</html>