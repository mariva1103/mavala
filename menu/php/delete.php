<?php
    if (isset($_GET["id"])) {
        $idProduc = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "mavala";
    
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM productos WHERE idProduc=$idProduc";
    $connection->query($sql);
    }

    header('Location:otro.php');
 
    exit;
?>