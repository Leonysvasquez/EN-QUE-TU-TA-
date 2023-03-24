
<?php
session_start();
require 'conexion.php';

?>
<doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="../css/siderbar.css">
    <title>Productos CRUD</title>
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
    :root
{
    --primary: #2279A7;
    --secondary: #3498db;
    --dark: #06151d;
    --gray: #424949;
    --lightgray: #a0a0a0;
    --light: #f0f4f6;
    --white: #FBFCFC;
}

        /* Estilos para la cabecera */
header {
  background-color: #ffffff;
  height: 60px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  color: #ffffff;
}
.btn-back-venta{
    color: #ffffff;
}
#reload {
  text-decoration: none;
  color: #212529;
  font-weight: bold;
}

/* Estilos para la barra lateral */
.sidenav {
  background-color: #212529;
  color: #ffffff;
  height: 100%;
  width: 200px;
  position: fixed;
  top: 0;
  left: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav-option {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
}

.sidenav-option:hover {
  cursor: pointer;
  background-color: #343a40;
  color: #3498db;
}

.active {
  background-color: #343a40;
  color: #2279A7;
}

.material-symbols-outlined {
  margin-right: 10px;
}

.arrow-right {
  margin-left: 10px;
}

/* Estilos para el contenedor principal */
.container {
  margin-top: 60px;
  margin-left: 200px;
  padding: 20px;
}

.card-header {
  background-color: #343a40;
  color: #ffffff;
}

.card-body {
  background-color: #ffffff;
}

    </style>
</head>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<body>
    <header>
        <a href="../../PUNTO DE VENTA/index.php" id="reload" class="btn btn-primary float-end">Volver a Punto de Ventas</a>
    </header>


    <!-- LEFT NAVIGATION BAR -->
    <aside class="sidenav">
        <div class="toggle-menu" id="toggleMenu">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="so1 sidenav-option">
            <span class="material-symbols-outlined">storefront</span>
            <span class="sidenav-option-name">Tablero Principal</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so2 sidenav-option">
            <span class="material-symbols-outlined">paid</span>
            <span class="sidenav-option-name">Caja</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so3 sidenav-option ">
            <span class="material-symbols-outlined">point_of_sale</span>
            <span class="sidenav-option-name">Ventas</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so4 sidenav-option">
            <span class="material-symbols-outlined">shopping_bag</span>
            <span class="sidenav-option-name">Compras</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so5 sidenav-option">
            <span class="material-symbols-outlined">shopping_cart</span>
            <a href="../php/productos.php" class="sidenav-option-name"><span class="sidenav-option-name">Productos</span></a>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so6 sidenav-option">
            <span class="material-symbols-outlined">lab_profile</span>
            <span class="sidenav-option-name">Reportes</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so7 sidenav-option">
            <span class="material-symbols-outlined">group</span>
            <span class="sidenav-option-name">Usuarios</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>  
        <div class="so8 sidenav-option">
            <span class="material-symbols-outlined">settings</span>
            <span class="sidenav-option-name">Configuracion</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>      
        <div class="so9 sidenav-option">
            <span class="material-symbols-outlined">manage_accounts</span>
            <span class="sidenav-option-name">Roles y Perfiles</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
        <div class="so10 sidenav-option">
            <span class="material-symbols-outlined">exit_to_app</span>
            <span class="sidenav-option-name">Salir</span>
            <span class="material-symbols-outlined arrow-right">arrow_right</span>
        </div>
    </aside> 
    
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Productos Details
                            <a href="create.php" class="btn btn-primary float-end">Crear Productos</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Productos</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Categoria</th>
                                <th>Fotos</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    
                                <?php 
                                    $query = "SELECT * FROM productos";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $producto)
                                        {
                                            ?>
                                            <tr>
                                                <td><?=  $producto['id']; ?></td>
                                                <td><?=  $producto['nombreProductos']; ?></td>
                                                <td><?=  $producto['descripcion']; ?></td>
                                                <td><?=  $producto['precio']; ?></td>
                                                <td><?=  $producto['Stock']; ?></td>
                                                <td><?=  $producto['Categoria']; ?></td>              
                                                <td><?=  $producto['imagen']; ?></td>
                                                <td>
                                                    <a href="productos-view.php?id=<?= $producto['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-eye-fill">View</i></a>
                                                    <a href="productos-edit.php?id=<?= $producto['id']; ?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-square">Edit</i></a>
                                                    <form action="productos-guardar2.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_productos" value="<?=$producto['id'];?>" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill">Delete</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                               
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Sección de JavaScript para el menú desplegable -->

                                 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>