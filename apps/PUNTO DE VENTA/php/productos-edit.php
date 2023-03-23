<?php
session_start();
require 'conexion.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Productos Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Productos Edit 
                            <a href="productos.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                           echo "<h5>ID:</h5>".  
                            $producto_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM productos WHERE id='$producto_id'";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                               $producto = mysqli_fetch_array($query_run);
                            
                                ?>
                                <form action="productos-guardar2.php" method="POST">
                                   <input type="hidden" name="producto_id" value="<?=$producto['id']; ?>">
 
                                    <div class="mb-3">
                                        <label><strong>Nombre Producto</strong> </label>
                                        <input type="text" name="nombreProductos" value="<?=$producto['nombreProductos'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label><strong>Descripcion</strong> </label>
                                        <input type="text" name="descripcion" value="<?=$producto['descripcion'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label><strong>Precio</strong> </label>
                                        <input type="number" name="precio" value="<?=$producto['precio'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label><strong>Categoria</strong> </label>
                                        <input type="text" name="Categoria" value="<?=$producto['Categoria'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label><strong>Cantidad</strong> </label>
                                        <input type="number" name="Stock" value="<?=$producto['Stock'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                    <label><strong>Imagen</strong> </label>
                                        <input type="file" name="imagen" value="<?=$producto['imagen'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_productos" class="btn btn-primary">
                                            Update Productos
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>