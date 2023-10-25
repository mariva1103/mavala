<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ADMINISTRADORES </title>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Administradores</h2>
        <a class="btn btn-primary" href="/mavala/menu/phpusuario/create.php" role="button">Nuevo administrador</a>
        <a class="btn btn-success" href="/mavala/menu/trabajo.html" role="button">Regresar </a>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Numero</th>
                    <th>Genero</th>
                    <th>Tipo</th>
                    
                </tr>
            </thead>
            
              <?php
                 $servername="localhost";
                 $username="root";
                 $password="";
                 $database="mavala";
                
                 $conexion = new mysqli ($servername,$username,$password,$database);
                
                 if($conexion->connect_error){
                    die("connexion fallida:". $conexion->connect_error);
                 }
                 echo "conexion exitosa";

                 $sql = "SELECT * FROM usuario";
                 $result = $conexion->query($sql);
                
                 if (!$result) {
                    die("consulta invalida: " . $connection->error);
                 }
 
                 while($row = $result->fetch_assoc()) {
                    echo"
                
                  <tr>
                      
                         <td>$row[idAdmin]</td>;
                         <td>$row[nomAdmin]</td>;
                         <td>$row[emailAdmin]</td>;
                         <td>$row[passAdmin]</td>;
                         <td>$row[numAdmin]</td>;
                         <td>$row[generoAdmin]</td>;
                         <td>$row[tipoAdmin]</td>;
                      
                      <td>
                         <a class='btn btn-primary btn-sm' href='/mavala/menu/phpusuario/edit.php?id=$row[idAdmin]'>Edit</a>;
                         <a class= 'btn btn-danger btn-sm' href='/mavala/menu/phpusuario/delete.php/?id=$row[idAdmin]'>Delete</a>;
                      </td>
                 </tr>
                 ";

                 }
               ?>
               
            
        </table>
    </div>
</body>
</html>