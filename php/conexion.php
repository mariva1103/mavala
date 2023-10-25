<?php

$server="localhost";
$user="root";
$contra="";
$db="mavala";

$conexion = new mysqli ($server,$user,$contra,$db);

if($conexion->connect_error){
    die("connexion fallida:". $conexion->connect_error);
}
echo "connexion exitosa";
?>   