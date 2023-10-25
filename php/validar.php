<?php
// Conectar a la base de datos (Asegúrate de usar tus propias credenciales de conexion)
$server="localhost";
$user="root";
$contra="";
$db="mavala";

$conexion = new mysqli ($server,$user,$contra,$db);

$id = "";
$name = "";
$password = "";
$tipo = "";

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];

if($conexion->connect_error){
    die("connexion fallida:". $conexion->connect_error);
}

// Buscar el usuario en la base de datos
$sql = "SELECT * FROM usuario WHERE idAdmin = '$id' AND nomAdmin= '$name' AND passAdmin='$password' AND 
tipoAdmin='$tipo'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado, verificar la contraseña
    $row = $result->fetch_assoc();
    if($row['tipoAdmin'] == 1){
        header ("Location: /mavala/menu/trabajo.html");
    } 
} else{
    echo "Este usuario esta en la base de datos";
}

$conexion->close();
?>








