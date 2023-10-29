<?php
    include("../conexion.php");
    

    $name = "";
    $marca = "";
    $presen = "";
    $precio = "";
    $stock = "";


    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST["name"];
        $marca = $_POST["marca"];
        $presen = $_POST["presen"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];

        do {
            if (empty($name) || empty($marca) || empty($presen) || empty($precio) || empty($stock)) {
                $errorMessage = "Todos los campos son requeridos";
                break;
            }

            // Agregar un nuevo usuario a la base de datos
            $sql = "INSERT INTO productos (nomProducto, idMarca, idPresentacion, preProducto, stockProducto)" . 
                   "VALUES ('$name', '$marca', '$presen', '$precio', '$stock')";
            $result = $conex->query($sql);

            if (!$result) {
                $errorMessage = "Consulta inválida: " . $conex->error;
                break;
            }

            $name = "";
            $marca = "";
            $presen = "";
            $precio = "";
            $stock = "";

            $successMessage = "Usuario agregado correctamente";

            header("location: ../produc/index.php");
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
    <script src="/emoji\assets\bootstrap-5\boot\js\bootstrap.bundle.min.js"></script>
</head>
<body class="body">
    <div class="container my-5">
        <div class=" w-100 d-flex justify-content-center text-center text-white">
         <h2 class="text-center w-25 bg-secondary text-light">Nuevo Producto</h2>
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
            <form class="bg-dark w-50 p-4 mt-5 rounded-5" method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Producto</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Marca</label>
                <div class="col-sm-6">
                    <select id="marca" class="form-select" name="marca" required value="<?php echo $marca; ?>">
                        <option value="">Seleccione una opcion</option>
                        <?php
                        // Leer todas las filas de la base de datos
                        $sql = "SELECT * FROM marca";
                        $result = $conex->query($sql);

                        if (!$result) {
                            die("Consulta invalida: " . $conex->error);
                        }

                        // Leer datos de cada fila
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='$row[idMarca]'>$row[descripMarca]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Presentacion</label>
                <div class="col-sm-6">
                    <select id="marca" class="form-select" name="presen" required value="<?php echo $presen; ?>">
                        <option value="">Seleccione una opcion</option>
                        <?php
                        // Leer todas las filas de la base de datos
                        $sql = "SELECT * FROM presentacion";
                        $result = $conex->query($sql);

                        if (!$result) {
                            die("Consulta invalida: " . $conex->error);
                        }

                        // Leer datos de cada fila
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='$row[idPresentacion]'>$row[descPresentacion]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Precio</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="precio" value="<?php echo $precio; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Stock</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="stock" value="<?php echo $stock; ?>">
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
                    <a class="btn btn-outline-primary" href="../produc/index.php" role="button">Cancelar</a>
                </div>
            </div>
         </form>
        </div>
    </div>
</body>
</html>