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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $nomFarm = $_POST["nombre"];
        $barFarm = $_POST["barrio"];
        $dirFarm = $_POST["direccion"];
        $telFarm = $_POST["telefono"];


        do {
            if (empty($id)  ||(empty($nomFarm)|| empty($barFarm)|| empty($dirFarm)||empty($telFarm))) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo usuario a la base de datos
            $sql = "INSERT INTO farma (id, nomFarm, barFarm, dirFarm, telFarm) " . 
                   "VALUES ('$id', '$nomFarm', '$barFarm', '$dirFarm', '$telFarm')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $id = "";
            $nomFarm =""; 
            $barFarm = ""; 
            $dirFarm = ""; 
            $telFarm ="";
        

            $successMessage = "Farmacia agregada correctamente";

            header("location: otro.php");
            exit;

        } while (false);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nueva farmacia </h2>

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
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nomFarm; ?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Barrio</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="barrio" value="<?php echo $barFarm; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Direccion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="direccion" value="<?php echo $dirFarm; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telefono</label>
                <div class="col-sm-6">
                <input  class="form-control" type="number" name="telefono" value="<?php echo $telFarm; ?>">
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
                    <a class="btn btn-outline-primary" href="/mavala/menu/phpfarm/otro.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>