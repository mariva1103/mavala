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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idAdmin = $_POST["id"];
        $nomAdmin = $_POST["nombre"];
        $emailAdmin = $_POST["email"];
        $passAdmin = $_POST["contraseña"];
        $numAdmin = $_POST["numero"];
        $generoAdmin = $_POST["genero"];
        $tipoAdmin = $_POST["tipo"];

        do {
            if (empty($idAdmin)  ||(empty($nomAdmin)|| empty($emailAdmin)|| empty($passAdmin)|| 
                empty($numAdmin)|| empty($generoAdmin)|| empty($tipoAdmin))) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo usuario a la base de datos
            $sql = "INSERT INTO usuario (idAdmin, nomAdmin, emailAdmin, passAdmin, numAdmin, generoAdmin, tipoAdmin) " . 
                   "VALUES ('$idAdmin', '$nomAdmin', '$emailAdmin', '$passAdmin', '$numAdmin', '$generoAdmin', '$tipoAdmin')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $idAdmin = "";
            $nomAdmin =""; 
            $emailAdmin = ""; 
            $passAdmin = ""; 
            $numAdmin = "";
            $generoAdmin = "";
            $tipoAdmin = "";
        

            $successMessage = "usuario agregado correctamente";

            header("location: /mavala/menu/phpusuario/otro.php");
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
        <h2>Nuevo administrador</h2>

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
                    <input type="text" class="form-control" name="id" value="<?php echo $idAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nomAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $emailAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contraseña" value="<?php echo $passAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Numero</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="numero" value="<?php echo $numAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Genero</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="genero" value="<?php echo $generoAdmin; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tipo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipo" value="<?php echo $tipoAdmin; ?>">
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
                    <a class="btn btn-outline-primary" href="/mavala/menu/phpusuario/otro.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>