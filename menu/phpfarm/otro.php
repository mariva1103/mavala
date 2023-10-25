<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mavala</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Lista de farmacias</h2>
        <a class="btn btn-primary" href="/mavala/menu/phpfarm/create.php" role="button">Nueva farmacia</a>
        <a class="btn btn-success" href="/mavala/menu/trabajo.html" role="button">Regresar</a>
  
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Barrio</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "mavala";

                    // Crear conexion
                    $conexion = new mysqli($servername, $username, $password, $database);

                    // Verificar conexion
                    if ($conexion->connect_error) {
                        die("Conexion fallida: " . $conexion->connect_error);
                    } 

                    // Leer todas las filas de la base de datos
                    $sql = "SELECT * FROM farma";
                    $result = $conexion->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $connection->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[nomFarm]</td>
                            <td>$row[barFarm]</td>
                            <td>$row[dirFarm]</td>
                            <td>$row[telFarm]</td>
                           

                            <td>
                                <a class='btn btn-primary btn-sm' href='/mavala/menu/phpfarm/edit.php?id=$row[id]'>Editar</a>
                                <a class='btn btn-danger btn-sm' href='/mavala/menu/phpfarm/delete.php?id=$row[id]'>Eliminar</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
        </table>
    </div>
</body>
</html>
