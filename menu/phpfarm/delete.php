<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "mavala";
    
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM farma WHERE id='$id'";
    $connection->query($sql);
    }

    header('Location:otro.php');
 
    exit;
?>