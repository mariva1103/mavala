<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ETS Y ITS </title>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>ETS Y ITS</h2>
        <a class="btn btn-primary" href="/mavala/menu/phpeits/create.php" role="button">Nueva EITS</a>
        <a class="btn btn-success" href="/mavala/menu/trabajo.html" role="button">Regresar</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Foto</th>
                </tr>
            </thead>
            
              <?php
                 $servername="localhost";
                 $username="root";
                 $password="";
                 $database="mavala";
                
                 $conexion = new mysqli ($servername,$username,$password,$database);
                
                 if($conexion->connect_error){
                    die("conexion fallida:". $conexion->connect_error);
                 }
                 echo "connexion exitosa";

                 $sql = "SELECT * FROM eits";
                 $result = $conexion->query($sql);
                
                 if (!$result) {
                    die("consulta invalida: " . $connection->error);
                 }
 
                 while($row = $result->fetch_assoc()) {
                    echo"
                
                  <tr>
                      
                         <td>$row[idEits]</td>;
                         <td>$row[nomEits]</td>;
                         <td>$row[desEits]</td>;
                         <td>$row[imgEits]</td>;
                      
                      <td>
                         <a class='btn btn-primary btn-sm' href='/MAVALA/menu/phpeits/edit.php/?id=$row[idEits]'>Edit</a>;
                         <a class= 'btn btn-danger btn-sm' href='/MAVALA/menu/phpeits/delete.php/?id=$row[idEits]'>Delete</a>;
                      </td>
                 </tr>
                 ";

                 }
               ?>
               
            
        </table>
    </div>
</body>
</html>