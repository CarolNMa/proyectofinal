<?php
     include("../conexion.php");
 

    $id = "";
    $presentacion = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Método GET: Mostrar los datos del usuario

        if (!isset($_GET["id"])) {
            header("location: ../presen/index.php");
            exit;
        }

        $id = $_GET["id"];

        // Leer la fila del cliente seleccionado de la tabla de la base de datos
        $sql = "SELECT * FROM presentacion WHERE idPresentacion=$id";
        $result = $conex->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) {
            header("location: ../presen/index.php");
            exit;
        }

        $presentacion = $row["descPresentacion"];
    }
    else {
        // Método POST: Actualizar los datos del usuario

        $id = $_POST["id"];
        $presentacion = $_POST["name"];

        do {
            if (empty($id) || empty($presentacion)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            $sql = "UPDATE presentacion " .
                   "SET descPresentacion = '$presentacion'" . 
                   "WHERE idPresentacion = $id";

            $result = $conex->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conex->error;
                break;
            }

            $successMessage = "Presentacion actualizado correctamente";

            header("location: ../presen/index.php");
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
    <script src="/emoji\assets\bootstrap-5\boot\js\bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/emoji/css/indexm.css">
</head>
<body class="body">
    <div class="container my-5">
        <div class=" w-100 d-flex justify-content-center text-center text-white ">
          <h2 class="text-center w-25 bg-secondary text-light">Editar Presentacion</h2>
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
        <form class=" color bg-dark w-50 p-4  rounded-5 " method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label text-light text-center">Tipo de presentacion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $presentacion; ?>">
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
                    <a class="btn btn-outline-primary" href="../presen/index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>