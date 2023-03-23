<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Productos Create</title>
</head>
<body>
  
<section class="products-container">
    
   
    <div class="container mt-5">

    <?php include('message.php'); ?>

        <h1>Registro de productos
            <a href="productos.php" class="btn btn-danger float-end">GO BACK</a>
        </h1>
        <!-- Creamos el formulario para ingresar los datos del producto -->
        <form method="post" action="productos-guardar2.php">

            <div class="form-group">
                <label for="nombre">Nombre del producto</label>
                <input type="text" class="form-control" id="nombre" name="nombreProductos" required>
            </div>
            <div class="form-group">
                <label for="tipo">Descripcion</label>
                <input type="text" class="form-control" id="tipo" name="descripcion" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" class="form-control" id="categoria" name="Categoria" required>
            </div>
            <div class="form-group">
                <label for="stock">Cantidad</label>
                <input type="number" class="form-control" id="stock" name="Stock" required>
            </div>
            <div class="form-group">
                <label for="stock">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required>
            </div>
            <button type="submit" class="btn btn-primary" name="save_productos">Guardar </button>
        </form>
    </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>