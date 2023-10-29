<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="\emoji\assets\bootstrap-5\boot\css\bootstrap.min.css">
    <link rel="stylesheet" href="\emoji/css/lista.css">
</head>
<body class="body">
    
    <div class="container my-5">
        <div class="w-100 d-flex justify-content-center opacity-75">
           <h2 class="text-center p-6 mb-1 bg-secondary text-white  w-25 m-20 ">Productos<h2>
           </div>    
           <a class="btn btn-success" href="../produc/create.php" role="button">Nuevo producto</a>
           <br>
           <br>
            <table class=" table opacity-75 , border border-secondary">
                <thead>
                <tr>
                    <th>Id del producto</th>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Presentacion</th>
                    <th>Precios</th>
                    <th>Stock de Productos</th>
                    <th>Modificar</th>

                </tr>
            </thead>
            <tbody>
                <?php
                   include("../conexion.php");
                    // Leer todas las filas de la base de datos
                    $sql = "SELECT idProducto , nomProducto , descripMarca , descPresentacion , preProducto, stockProducto FROM productos 
                    INNER JOIN marca ON productos.idMarca = marca.idMarca 
                    INNER JOIN presentacion ON presentacion.idPresentacion = productos.idPresentacion;";
                    $result = $conex->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $conex->error);
                    }

                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idProducto]</td>
                            <td>$row[nomProducto]</td>
                            <td>$row[descripMarca]</td>
                            <td>$row[descPresentacion]</td>
                            <td>$row[preProducto]</td>
                            <td>$row[stockProducto]</td>


                            <td>
                                <a class='btn btn-primary btn-sm' href='../produc/edit.php?id=$row[idProducto]'>Editar</a>
                                <a class='btn btn-danger btn-sm' onclick='confirmAction($row[idProducto])'>Eliminar</a>
                                <a class='btn btn-success' href='/emoji/inventario/index.php' role='button'>Volver </a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
            <script>

                function confirmAction(idProducto){
                    var result = confirm("¿Estás seguro de que quieres ejecutar esta acción?");
                    if (result) {
                        location.href = "../produc/delete.php?id=" + idProducto;
                    }
                }
            </script>
        </table>
    </div>
</body>
</html>