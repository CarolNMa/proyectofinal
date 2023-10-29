<?php
     include("../conexion.php");
 

    $id = "";
    $des = "";
    

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del usuario

        if (!isset($_GET["id"])) {
            header("location: /marcas/index.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del cliente seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM marca WHERE idMarca=$id";
        $result = $conex->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: /marca/index.php");
            exit;
        }

        $id= $row["idMarca"];
        $des = $row["descripMarca"];
       
    }
    else {
        // Método POST: Actualizar los datos del usuario

        $id = $_POST["id"];
        $des = $_POST["name"];
        

        do {
            if (empty($id) || empty($des) ) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE marca " .
                   "SET descripMarca = '$des'" . 
                   "WHERE idMarca = $id";

            $result = $conex->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conex->error;
                break;
            }

            $successMessage = "Usuario actualizado correctamente";

            header("location: ../marcas/index.php");
            exit;

        } while (true);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CRUD</title>
    <link rel="stylesheet" href="\emoji\assets\bootstrap-5\boot\css\bootstrap.min.css">
    <script src="\emoji\assets\bootstrap-5\boot/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/emoji/css/indexm.css">
</head>
<body class="body">         
    <div class="container my-5 ">
        <div class=" w-100 d-flex justify-content-center text-center text-white  ">
          <h2 class="text-center w-25 bg-secondary text-light">Editar Marca</h2>
        </div>
        <br>

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
        <div  class="d-flex justify-content-center">
            <form  class=" color bg-dark w-50 p-4  rounded-5 "method="post">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="row mb-3">
                  <label class="col-sm-3 col-form-label text-light text-center   ">Nombre</label>
                 <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $des; ?>">
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
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-success" href="../marcas/index.php" role="button">Cancelar</a>
                </div>
              </div>
           </form>
         </div>
        <div>
    </div>
</body>
</html>