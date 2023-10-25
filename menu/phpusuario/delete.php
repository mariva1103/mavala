<?php
    if (isset($_GET["id"])) {
        $idAdmin = $_GET["id"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "mavala";
    
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM usuario WHERE idAdmin='$idAdmin'";
    $connection->query($sql);
    }

    header('Location:../otro.php');
 
    exit;
?>