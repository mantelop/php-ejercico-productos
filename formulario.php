<?php
// Incluir los archivos de las clases
require_once 'models/Producto.php';
require_once 'models/Alimento.php';
require_once 'models/Utensilio.php';
require_once 'models/Compra.php';

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtener los datos del formulario
  $alimentosData = $_POST['alimentos'] ?? [];
  $utensiliosData = $_POST['utensilios'] ?? [];

  // Convertir los datos del formulario en objetos
  $alimentos = [];
  foreach ($alimentosData as $data) {
    $alimentos[] = new Alimento($data['id'], $data['nombre'], $data['precio'], $data['tieneCaducidad'], new DateTime($data['fechaCaducidad']));
  }

  $utensilios = [];
  foreach ($utensiliosData as $data) {
    $utensilios[] = new Utensilio($data['id'], $data['nombre'], $data['precio'], $data['material']);
  }

  // Crear la compra
  $compra = new Compra($alimentos, $utensilios);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Formulario de compra</title>
  <style>
    /* Estilos para la tabla de productos */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #ddd;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h1>Formulario de compra</h1>

  <!-- Formulario para añadir productos -->
  <form method="post">
    <fieldset>
      <legend>Añadir alimentos</legend>
      <p>
        <label for="alimentoId">ID:</label>
        <input type="text" id="alimentoId" name="alimentos[0][id]" required>
      </p>
      <p>
        <label for="alimentoNombre">Nombre:</label>
        <input type="text" id="alimentoNombre" name="alimentos[0][nombre]" required>
      </p>
      <p>
        <label for="alimentoPrecio">Precio:</label>
        <input type="number" id="alimentoPrecio" name="alimentos[0][precio]" min="0" step="0.01" required>
      </p>
      <p>
        <label for="alimentoTieneCaducidad">Tiene caducidad:</label>
        <input type="checkbox" id="alimentoTieneCaducidad" name="alimentos[0][tieneCaducidad]">
      </p>
      <p>
        <label for="alimentoFechaCaducidad">Fecha de caducidad:</label>
        <input type="date" id="alimentoFechaCaducidad" name="alimentos[0][fechaCaducidad]">
      </p>
    </fieldset>

    <fieldset>
      <legend>Añadir utensilios</legend>
      <p>
        <label for="utensilioId">ID:</label>
        <input type="text" id="utensilioId" name="utensilios[0][id]" required>
      </p>
      <p>
        <label for="utensilioNombre">Nombre:</label>
        <input type="text" id="utensilioNombre" name="utensilios[0][nombre]" required>
      </p>
      <p>
        <label for="utensilioPrecio">Precio:</label>
        <input type="number" id="utensilioPrecio" name="utensilios[0][precio]" min="0" step="0.01" required>
      </p>
      <p>
        <label for="utensilioMaterial">Material:</label>
        <input type="text" id="utensilioMaterial" name="utensilios[0][material]" required>
      </p>
    </fieldset>

    <p>
      <input type="submit" value="Añadir productos">
    </p>
  </form>

  <!-- Tabla con los productos añadidos -->
  <?php if (isset($compra)): ?>
    <fieldset>
      <legend>Productos añadidos</legend>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($compra->getProductos() as $producto): ?>
            <tr>
              <td><?= $producto->getId() ?></td>
              <td><?= $producto->getNombreProducto() ?></td>
              <td><?= $producto->getPrecio() ?></td>
              <td><?= get_class($producto) ?></td>              
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </fieldset>
  <?php endif ?>
</body>
</html>