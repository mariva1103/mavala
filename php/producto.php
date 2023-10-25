<?php

  include('conexion.php');

  $sql="SELECT * FROM productos";
  $result=$conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head></head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.27font/bootstrap-icons.css">

    <title>PRODUCTOS</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="../index.html" class="navbar-brand"> <span class="text-rosado" class="text-pink">MAV</span>ALA</a>
        </div>
    </nav>
    <br><br><br>
    <h1>Los Productos de tu Interes</h1>
    <div class="gallery w-100 h-100">
    <?php
      while ($row=$result->fetch_assoc()) {
        
        $nombre=$row['nomProduc'];
        $precio=$row['precioProduc'];
        $imagen=$row['fotoProduc'];
        $descripcion = $row['desProduc']
    
      ?>
       <div class="content ">
            <img class="" src="../img/<?php echo $imagen ?>">
            <h3><?php echo $nombre ?></h3>
            <h6><?php echo $precio ?></h6>
            <button  class="buy-1 "><?php echo $descripcion  ?></button>
        </div>
      <?php 
      }
      ?>
  </div>
    </body>
</html> 