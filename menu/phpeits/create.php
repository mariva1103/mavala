<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mavala";

    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $idEits = "";
    $nomEits =""; 
    $desEits = ""; 
    $imgEits = ""; 
   


    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idEits = $_POST["id"];
        $nomEits = $_POST["nombre"];
        $desEits = $_POST["descripcion"];
        $imgEits = $_FILES['file']['name'];


        do {
            if (empty($idEits)  ||(empty($nomEits)|| empty($desEits)|| empty($imgEits))) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            if(isset($imgEits) && $imgEits != ""){
                $tipo = $_FILES['file']['type'];
                $temp  = $_FILES['file']['tmp_name'];
        
               if( !((strpos($tipo,'png') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'jpg')))){
                    echo "<script>alert('el archivo tiene que ser de extension png, jpeg, webp y jpg'); </script>";
                    echo "<script> window.location.href='otro.php';</script>";
                    }else{
                 

                    // Agregar un nuevo usuario a la base de datos
                    $sql = "INSERT INTO eits (idEits, nomEits, desEits, imgEits) " . 
                    "VALUES ('$idEits', '$nomEits', '$desEits', '$imgEits')";
                    $result = $connection->query($sql);   

                    if ($result) {
                      move_uploaded_file($temp, '../img/'.$imgEits);
                      echo "<script>alert('se ha subido correctamente');</script>";
                      
                    
                    }else{
                      echo "<script>alert('ha ocurrido un error en el servidor');</script>";
                    
                    }
               }
            }
            

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $idEits = "";
            $nomEits =""; 
            $desEits = ""; 
            $imgEits = ""; 
        

            $successMessage = "Eits agregada correctamente";

            header("location: /MAVALA/menu/phpeits/otro.php");
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
        <h2>Nueva Eits</h2>

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

        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $idEits; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nomEits; ?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $desEits; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-6">
                <input  class="form-control mb-3" type="file" name="file" id="file" value="<?php echo $imgEits; ?>">
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
                    <a class="btn btn-outline-primary" href="/mavala/menu/phpeits/otro.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>