<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mavala";
 
    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $idProduc = "";
    $nomProduc= "";
    $desProduc= "";
    $precioProduc="";
    $fotoProduc="";


    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del usuario

        if (!isset($_GET["id"])) {
            header("location: /mavala/php/otro.php");
            exit;
        }

        $idProduc = $_GET["id"];

        // Leer la fila del cliente seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM productos WHERE idProduc=$idProduc";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location:mavala/php/otro.php");
            exit;
        }

        $nomProduc = $row["nomProduc"]; 
        $desProduc = $row["desProduc"];
        $precioProduc = $row["precioProduc"];
        $fotoProduc = $row["fotoProduc"];
    }
    else {
        // Método POST: Actualizar los datos del usuario

        $idProduc = $_POST["id"];
        $nomProduc = $_POST["nomProduc"];
        $desProduc =$_POST["desProduc"];
        $precioProduc =$_POST["precioProduc"];
        $fotoProduc =$_POST["fotoProduc"];

        do {

            if (empty($idProduc) || empty($nomProduc) || empty($desProduc) || empty($precioProduc) || empty($fotoProduc)){
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE productos " .
                   "SET idProduc = '$idProduc' , nomProduc = '$nomProduc', desProduc = '$desProduc', 
                    precioProduc = '$precioProduc', fotoProduc = '$fotoProduc' " .
                   "WHERE idProduc = $idProduc";

            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $successMessage = "Producto actualizado correctamente";

            header("location: /mavala/php/otro.php");
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
        <h2>Nuevo producto</h2>

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
                    <input type="text" class="form-control" name="id" value="<?php echo $idProduc; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nomProduc" value="<?php echo $nomProduc; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="desProduc" value="<?php echo $desProduc; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Precio</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="precioProduc" value="<?php echo $precioProduc; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">foto</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fotoProduc" value="<?php echo $fotoProduc; ?>">
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
                    <a class="btn btn-outline-primary" href="/mavala/php/otro.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>