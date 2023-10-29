<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentacion</title>
    <link rel="stylesheet" href="\emoji\assets\bootstrap-5\boot\css\bootstrap.min.css">
    <link rel="stylesheet" href="\emoji/css/lista.css">
</head>
<body class="body">
    <div class="container my-5">
    <div class="w-100 d-flex justify-content-center opacity-75">
        <h2 class="text-center p-6 mb-1 bg-secondary text-white  w-25 m-20">Lista de presentacion</h2>
    </div>
        <a class="btn btn-success" href="../presen/create.php" role="button">Nueva Descripcion</a>
        <br>
        <br>
        <table class=" table opacity-75 , border border-secondary">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Modificar</th>


                </tr>
            </thead>
            <tbody>
                <?php
                   include("../conexion.php");
                    // Leer todas las filas de la base de datos
                    $sql = "SELECT * FROM presentacion";
                    $result = $conex->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $conex->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idPresentacion]</td>
                            <td>$row[descPresentacion]</td>

                            <td>
                                <a class='btn btn-primary btn-sm' href='../presen/edit.php?id=$row[idPresentacion]'>Editar</a>
                                <a class='btn btn-danger btn-sm' onclick='confirmAction($row[idPresentacion])'>Eliminar</a>
                                <a class='btn btn-success' href='/emoji/inventario/index.php' role='button'>Volver </a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
            <script>

                function confirmAction(idPresentacion){
                    var result = confirm("¿Estás seguro de que quieres ejecutar esta acción?");
                    if (result) {
                        location.href = "../presen/delete.php?id=" + idPresentacion;
                    }
                }
            </script>
        </table>
    </div>
</body>
</html>