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

    <title>Productos View</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Producto View 
                            <a href="productos.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                             echo $producto_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM productos WHERE id='$producto_id'";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                               $producto = mysqli_fetch_array($query_run);
                            
                                ?>
                                <form action="productos-guardar2.php" method="POST">
                                    <input type="hidden" name="producto_id" value="<?=$producto['producto_id']; ?>">

                                    <div class="mb-3">
                                    <label><strong>Nombre del Producto</strong> </label>
                                        <p class=form-control>
                                        <?=$producto['nombreProductos'];?>
                                        </p>
                                       
                                    </div>
                                    <div class="mb-3">
                                    <label><strong>Descripcion</strong> </label>
                                        <p class=form-control>
                                        <?=$producto['descripcion'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                    <label><strong>Precio</strong> </label>
                                        <p class=form-control>
                                            <?=$producto['precio'];?>
                                        </p>
                            

                                    </div>
                                    
                                    <div class="mb-3">
                                    <label><strong>Cantidad</strong> </label>
                                        <p class=form-control>
                                            <?=$producto['Stock'];?>
                                        </p>
                

                                    </div>
                                    <div class="mb-3">
                                    <label><strong>Categoria</strong> </label>
                                        <p class=form-control>
                                        <?=$producto['Categoria'];?>
                                        </p>
                        

                                    </div>
                                    
                                    <div class="mb-3">
                                    <label><strong>Imagen</strong> </label>
                                        <div>
                                            <?=$producto['imagen'];?>
                                        </div>
                                      
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