<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mavala";
 
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $idAdmin = "";
    $nomAdmin =""; 
    $emailAdmin = ""; 
    $passAdmin = ""; 
    $numAdmin = "";
    $generoAdmin = "";
    $tipoAdmin = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del usuario

        if (!isset($_GET["id"])) {
            header("location: /MAVALA/phpusuario/otro.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del cliente seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM usuario WHERE idAdmin='$id'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location:/MAVALA/phpusuario/otro.php");
            
        }

        $nomAdmin = $row["nomAdmin"];
        $emailAdmin = $row["emailAdmin"];
        $passAdmin = $row["passAdmin"];
        $numAdmin = $row["numAdmin"];
        $generoAdmin = $row["generoAdmin"];
        $tipoAdmin = $row["tipoAdmin"];

    }
    else {
        // Método POST: Actualizar los datos del usuario

        $idAdmin = $_GET["id"];
        $nomAdmin = $_POST["nomAdmin"];
        $emailAdmin = $_POST["emailAdmin"];
        $passAdmin = $_POST["passAdmin"];
        $numAdmin = $_POST["numAdmin"];
        $generoAdmin = $_POST["generoAdmin"];
        $tipoAdmin = $_POST["tipoAdmin"];
        

        do {
            if (empty($idAdmin)  ||(empty($nomAdmin)|| empty($emailAdmin)|| empty($passAdmin)|| 
                empty($numAdmin)|| empty($generoAdmin)|| empty($tipoAdmin))) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE usuario " .
                   "SET idAdmin = '$idAdmin', nomAdmin ='$nomAdmin', emailAdmin = '$emailAdmin',
                    passAdmin = '$passAdmin', numAdmin = '$numAdmin', generoAdmin = '$generoAdmin', tipoAdmin = '$tipoAdmin' " . 
                   "WHERE idAdmin = $idAdmin";

            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $successMessage = "usuario actualizado correctamente";

            header("location:/MAVALA/phpusuario/otro.php");
            exit;

        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar mavala</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo categoría</h2>

        <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input disabled type="text"  class="form-control" name="idAdmin" value="<?php echo $_GET["id"]; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nomAdmin" value="<?php echo $nomAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="emailAdmin" value="<?php echo $emailAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="passAdmin" value="<?php echo $passAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Numero</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="numAdmin" value="<?php echo $numAdmin; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Genero</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="generoAdmin" value="<?php echo $generoAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tipo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipoAdmin" value="<?php echo $tipoAdmin; ?>">
                </div>
            </div>


            <?php
                if (!empty($successMessage)) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success añert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Enviar</button>;
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/MAVALA/phpusuario/otro.php" role="button">Cancelar</a>;
                </div>
            </div>
        </form>
    </div>
</body>
</html>