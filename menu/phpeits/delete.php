<?php
    if (isset($_GET["id"])) {
        $idEits = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "mavala";
    
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM eits WHERE idEits='$idEits'";
    $connection->query($sql);
    }

    header('Location:../otro.php');
 
    exit;
?>