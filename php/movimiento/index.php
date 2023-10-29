<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos</title>
    <link rel="stylesheet" href="\emoji\assets\bootstrap-5\boot\css\bootstrap.min.css">
    <link rel="stylesheet" href="\emoji/css/lista.css">
</head>
<body class="body">
    <div class="container my-5">
        <div class="w-100 d-flex justify-content-center opacity-75">
           <h2 class="text-center p-6 mb-1 bg-secondary text-white  w-25 m-20 ">Movimiento</h2>
        </div>
        <br>
        <br>
        <table class=" table opacity-75 , border border-secondary">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Tipo de Movimiento</th>
                    <th>Producto</th>
                    <th>Marcas</th>
                    <th>Presentacion</th> 
                    <th>Cantidad</th>
                    <th>Admin</th>

                    <th>
                        <td>
                            <a class='btn btn-success' href='/emoji/inventario/index.php' role='button'>Volver</a>
                        </td>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                   include("../conexion.php");
                    // Leer todas las filas de la base de datos
                    $sql = "SELECT movimientos.idMovimiento , movimientos.fechaMovimiento , productos.nomProducto , marca.descripMarca , presentacion.descPresentacion ,IF(movimientos.tipoMovimiento = 1 , 'Entrada' , 'Salida') as tipoMovimiento , movimientos.cantMovimiento , usuario.usuaAdmin FROM movimientos 
                    INNER JOIN productos ON productos.idProducto = movimientos.idProducto
                    INNER JOIN usuario ON usuario.idAdmin = movimientos.idAdmin
                    INNER JOIN marca ON marca.idMarca = productos.idMarca 
                    INNER JOIN presentacion ON presentacion.idPresentacion = productos.idPresentacion;";
                    $result = $conex->query($sql);

                    if (!$result) {
                        die("Consulta invalida: " . $conex->error);
                    }

                    
                    // Leer datos de cada fila
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[idMovimiento]</td>
                            <td>$row[fechaMovimiento]</td>
                            <td>$row[tipoMovimiento]</td>
                            <td>$row[nomProducto]</td>
                            <td>$row[descripMarca]</td>
                            <td>$row[descPresentacion]</td>
                            <td>$row[cantMovimiento]</td>
                            <td>$row[usuaAdmin]</td>
                            
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>