<?php
session_start();
require 'conexion.php';

if(isset($_POST['update_productos']))
{
    $producto_id = mysqli_real_escape_string($conn, $_POST['producto_id']);
    $nombreProductos = mysqli_real_escape_string($conn, $_POST['nombreProductos']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $Precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $Categoria = mysqli_real_escape_string($conn, $_POST['Categoria']);
    $Stock = mysqli_real_escape_string($conn, $_POST['Stock']);
    $Imagen = mysqli_real_escape_string($conn, $_POST['imagen']);


    $query = "UPDATE  productos SET nombreProductos='$nombreProductos', descripcion='$descripcion', precio='$Precio',
    Categoria='$Categoria' ,Stock='$Stock' ,imagen='$Imagen' WHERE id='$producto_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Producto Updated Successfully";
        header("Location: productos.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Producto Not Updated";
        header("Location: productos.php");
        exit(0);
    }
}


if(isset($_POST['save_productos']))
{

    $nameProductos = mysqli_real_escape_string($conn, $_POST['nombreProductos']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $Precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $Stock = mysqli_real_escape_string($conn, $_POST['Stock']);
    $Categoria = mysqli_real_escape_string($conn, $_POST['Categoria']);
    $Imagen = mysqli_real_escape_string($conn, $_POST['imagen']);



    $query = "INSERT INTO productos (nombreProductos,descripcion,precio,Stock,Categoria,imagen)
     VALUES ('$nameProductos','$descripcion','$Precio','$Stock','$Categoria','Imagen')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Productos Created Successfully";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Productos No Createado";
        header("Location: create.php");
        exit(0);
    }
}


if(isset($_POST['delete_productos']))
{
    $productos_id = mysqli_real_escape_string($conn, $_POST['delete_productos']);

    $query = "DELETE FROM productos WHERE id='$productos_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Productos Deleted Successfully";
        header("Location: productos.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Productos Not Deleted";
        header("Location: productos.php");
        exit(0);
    }
}





?>