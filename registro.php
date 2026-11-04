<?php
// registro.php
$errores = [];
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$ciudad = $_POST['ciudad'] ?? '';
$pais = $_POST['pais'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty(trim($nombre))) {
        $errores['nombre'] = "El campo nombre es obligatorio.";
    }
    if (empty(trim($email)) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = "Ingrese un correo electrónico válido.";
    }
    if (empty($ciudad)) {
        $errores['ciudad'] = "Debe seleccionar una ciudad.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <style>
        .campo-error { border: 2px solid red !important; }
        .mensaje-error { color: red; font-size: 13px; display: block; margin-top: 4px; }
        .form-group { margin-bottom: 15px; }
    </style>
</head>
<body>
    <div style="max-width: 450px; margin: 40px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2>Formulario de Inscripción</h2>

        <form method="POST" action="registro.php">
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label><br>
                <input type="text" id="nombre" name="nombre" 
                       value="<?php echo htmlspecialchars($nombre); ?>" 
                       class="<?php echo isset($errores['nombre']) ? 'campo-error' : ''; ?>" style="width: 100%; padding: 8px;">
                <?php if (isset($errores['nombre'])): ?>
                    <span class="mensaje-error"><?php echo $errores['nombre']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label><br>
                <input type="text" id="email" name="email" 
                       value="<?php echo htmlspecialchars($email); ?>" 
                       class="<?php echo isset($errores['email']) ? 'campo-error' : ''; ?>" style="width: 100%; padding: 8px;">
                <?php if (isset($errores['email'])): ?>
                    <span class="mensaje-error"><?php echo $errores['email']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad:</label><br>
                <select id="ciudad" name="ciudad" onchange="autocompletarPais()" 
                        class="<?php echo isset($errores['ciudad']) ? 'campo-error' : ''; ?>" style="width: 100%; padding: 8px;">
                    <option value="">-- Seleccione una ciudad --</option>
                    <option value="Bogotá" <?php echo ($ciudad === 'Bogotá') ? 'selected' : ''; ?>>Bogotá</option>
                    <option value="Cali" <?php echo ($ciudad === 'Cali') ? 'selected' : ''; ?>>Cali</option>
                    <option value="Medellín" <?php echo ($ciudad === 'Medellín') ? 'selected' : ''; ?>>Medellín</option>
                    <option value="Roma" <?php echo ($ciudad === 'Roma') ? 'selected' : ''; ?>>Roma</option>
                    <option value="Milán" <?php echo ($ciudad === 'Milán') ? 'selected' : ''; ?>>Milán</option>
                    <option value="París" <?php echo ($ciudad === 'París') ? 'selected' : ''; ?>>París</option>
                    <option value="Lyon" <?php echo ($ciudad === 'Lyon') ? 'selected' : ''; ?>>Lyon</option>
                </select>
                <?php if (isset($errores['ciudad'])): ?>
                    <span class="mensaje-error"><?php echo $errores['ciudad']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="pais">País (Autocompletado):</label><br>
                <input type="text" id="pais" name="pais" value="<?php echo htmlspecialchars($pais); ?>" readonly style="width: 100%; padding: 8px; background-color: #e9ecef;">
            </div>

            <button type="submit" style="padding: 10px 20px; cursor: pointer;">Registrarse</button>
        </form>
    </div>

    <script>
    function autocompletarPais() {
        const mapaPaises = {
            'Bogotá': 'Colombia',
            'Cali': 'Colombia',
            'Medellín': 'Colombia',
            'Roma': 'Italia',
            'Milán': 'Italia',
            'París': 'Francia',
            'Lyon': 'Francia'
        };
        const ciudadSeleccionada = document.getElementById('ciudad').value;
        document.getElementById('pais').value = mapaPaises[ciudadSeleccionada] || '';
    }
    document.addEventListener("DOMContentLoaded", autocompletarPais);
    </script>
</body>
</html>