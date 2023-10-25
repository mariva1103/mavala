<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mavala";

    // Crear conexion
    $connection = new mysqli($servername, $username, $password, $database);

    $idProduc = "";
    $nomProduc =""; 
    $desProduc = ""; 
    $precioProduc = ""; 
    $fotoProduc ="";


    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $idProduc = $_POST["id"];
        $nomProduc = $_POST["nombre"];
        $desProduc = $_POST["descripcion"];
        $precioProduc = $_POST["precio"];
        $fotoProduc = $_POST["foto"];


        do {
            if (empty($idProduc)  ||(empty($nomProduc)|| empty($desProduc)|| empty($precioProduc)||empty($fotoProduc))) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo usuario a la base de datos
            $sql = "INSERT INTO productos (idProduc, nomProduc, desProduc, precioProduc, fotoProduc) " . 
                   "VALUES ('$idProduc', '$nomProduc', '$desProduc', '$precioProduc', '$fotoProduc')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $connection->error;
                break;
            }

            $idProduc = "";
            $nomProduc =""; 
            $desProduc = ""; 
            $precioProduc = ""; 
            $fotoProduc ="";
        

            $successMessage = "Producto agregado correctamente";

            header("location: otro.php");
            exit;

        } while (false);
    }


    if(isset($foto) && $foto != ""){
        $tipo = $_FILES['foto']['type'];
        $temp  = $_FILES['foto']['tmp_name'];

       if( !((strpos($tipo,'png') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'jpg')))){
            echo "<script>alert('el archivo tiene que ser de extension png, jpeg, webp y jpg'); </script>";
            echo "<script>window.location.href='otro.php';</script>";
            }else{
         $query = "INSERT INTO productos (id,nombre,descripcion,precio,foto) values('$idProduc','$nomProduc','$desProduc','$precioProduc', '$fotoProduc')";
         $resultado = mysqli_query($con,$query);
         if ($resultado) {
             move_uploaded_file($temp, '../../img/'.$foto);
          echo "<script>alert('se ha subido correctamente');</script>";
          echo "<script>window.location.href='mavala/otro.php';</script>";

         }else{
          echo "<script>alert('ha ocurrido un error en el servidor');</script>";
            
         }
       }
    }


    if (!$result) {
        $errorMessage = "Consulta inválida: " . $connection->error;
        
    }

    $idEits = "";
    $nomEits =""; 
    $desEits = ""; 
    $imgEits = ""; 


    $successMessage = "Eits agregada correctamente";

    header("location: /MAVALA/phpeits/otro.php");
    exit;



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
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nomProduc; ?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $desProduc; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Precio</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="precio" value="<?php echo $precioProduc; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-6">
                <input  class="form-control mb-3" type="file" name="foto" value="<?php echo $fotoProduc; ?>">
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