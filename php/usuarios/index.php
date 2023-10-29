<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de CRUD</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="\emoji/css/lista.css">
</head>
<body>
    <div class="container my-5">
        <div class="w-100 d-flex justify-content-center opacity-75">
           <h2 class="text-center p-6 mb-1 bg-secondary text-white  w-25 m-20 ">Usuarios</h2>
        </div>
        <a class="btn btn-success" href="../usuarios/create.php" role="button">Nuevo usuario</a>
        <br>
        <br>
        <table class=" table opacity-75 , border border-secondary">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Email</th>
                    <th>Configurar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   include("../php/conexion.php");
                    // Leer todas las filas de la base de datos
                    $sql = "SELECT * FROM usuario";
                    $result = $conex->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $conex->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idAdmin]</td>
                            <td>$row[usuaAdmin]</td>
                            <td>$row[passAdmin]</td>
                            <td>$row[correoAdmin]</td>

                            <td>
                                <a class='btn btn-primary btn-sm' href='../usuarios/edit.php?id=$row[idAdmin]'>Editar</a>
                                <a class='btn btn-danger btn-sm' onclick='confirmAction($row[idAdmin])'>Eliminar</a>
                                <a class='btn btn-success' href='/emoji/inventario/index.php' role='button'>Volver </a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
            <script>

                function confirmAction(idAdmin){
                    var result = confirm("¿Estás seguro de que quieres ejecutar esta acción?");
                    if (result) {
                        location.href = "../usuario/delete.php?id=" + idAdmin;
                    }
                }
            </script>
        </table>
    </div>
</body>
</html>