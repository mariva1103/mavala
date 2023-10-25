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
        <h2>Lista de productos</h2>
        <a class="btn btn-primary" href="/MAVALA/php/create.php" role="button">Nuevo producto</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "mavala";

                    // Crear conexion
                    $connection = new mysqli($servername, $username, $password, $database);

                    // Verificar conexion
                    if ($connection->connect_error) {
                        die("Conexion fallida: " . $connection->connect_error);
                    } 

                    // Leer todas las filas de la base de datos
                    $sql = "SELECT * FROM productos";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $connection->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idProduc]</td>
                            <td>$row[nomProduc]</td>
                            <td>$row[desProduc]</td>
                            <td>$row[precioProduc]</td>
                            <td>$row[fotoProduc]</td>

                            <td>
                                <a class='btn btn-primary btn-sm' href='/mavala/php/edit.php?id=$row[idProduc]'>Editar</a>
                                <a class='btn btn-danger btn-sm' href='/mavala/php/delete.php?id=$row[idProduc]'>Eliminar</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
        </table>
    </div>
</body>
</html>
