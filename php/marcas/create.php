<?php
    include("../conexion.php");
    
    $des = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $des = $_POST["des"];

        do {
            if (empty($des)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo usuario a la base de datos
            $sql = "INSERT INTO marca (descripMarca) " . 
                   "VALUES ('$des')";
            $result = $conex->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conex->error;
                break;
            }

            $des = "";

            $successMessage = "Marca agregada correctamente";

            header("location: ../marcas/index.php");
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
    <link rel="stylesheet" href="\emoji\assets\bootstrap-5\boot\css\bootstrap.min.css">
    <link rel="stylesheet" href="\emoji/css/nueva.css">
    <script src="\emoji\assets\bootstrap-5\boot\js/bootstrap.bundle.min.js"></script>
</head>
<body class="body">
    <div class="container my-5">
        <div class=" w-100 d-flex justify-content-center text-center text-white">
         <h2 class="text-center w-25 bg-secondary text-light">Nueva Marca</h2>
        </div>


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
        <div class="d-flex justify-content-center text-white">
            <form  class="bg-dark w-50 p-4 mt-5 rounded-5" method="post">
             <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-white">Descripcion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="des" value="<?php echo $des; ?>">
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
                    <a class="btn btn-outline-primary" href="../marcas/index.php" role="button">Cancelar</a>
                </div>
             </div>
            </form>
        </div>
    </div>
</body>
</html>