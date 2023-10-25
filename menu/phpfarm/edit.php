<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mavala";
 
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $id = "";
    $nomFarm =""; 
    $barFarm = ""; 
    $dirFarm = ""; 
    $telFarm ="";


    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del usuario

        if (!isset($_GET["id"])) {
            header("location: /MAVALA/phpfarm/otro.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del cliente seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM farma WHERE id='$id'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location:/mavala/menu/phpfarm/otro.php");
            exit;
        }

        $nomFarm = $row["nomFarm"]; 
        $barFarm = $row["barFarm"];
        $dirFarm = $row["dirFarm"];
        $telFarm = $row["telFarm"];
    }
    else {
        // Método POST: Actualizar los datos del usuario

        $id = $_POST["id"];
        $nomFarm = $_POST["nomFarm"];
        $barFarm =$_POST["barFarm"];
        $dirFarm =$_POST["dirFarm"];
        $telFarm =$_POST["telFarm"];

        do {

            if (empty($id) || empty($nomFarm) || empty($barFarm) || empty($dirFarm) || empty($telFarm)){
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE farma " .
                   "SET nomFarm = '$nomFarm', barFarm = '$barFarm', 
                    dirFarm = '$dirFarm', telFarm = '$telFarm' " .
                   "WHERE id = $id";

            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $successMessage = "farmacia actualizada correctamente";

            header("location: /MAVALA/phpfarm/otro.php");
            exit;

        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mavala</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nueva farmacia</h2>

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
                    <input disabled type="text"  class="form-control" name="id" value="<?php echo $_GET["id"]; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nomFarm" value="<?php echo $nomFarm; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Direccion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dirFarm" value="<?php echo $dirFarm; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">telefono</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="telFarm" value="<?php echo $telFarm; ?>">
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
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/MAVALA/phpfarm/otro.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>