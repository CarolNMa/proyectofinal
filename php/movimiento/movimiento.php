<?php 
include("../conexion.php");
session_start();
$idProducto = $_POST["idpro"];
$tipoMovimiento = $_POST["tipomov"];
$cantidad = $_POST["cantmov"];

// Iniciar una transacción
$conex->begin_transaction();

// Intentar ejecutar una consulta
$idUsuario =  $_SESSION["idUsuario"];
$sqlMovimiento = "INSERT INTO `movimientos`(`idProducto`, `tipoMovimiento`, `cantMovimiento`, idAdmin) VALUES ($idProducto,$tipoMovimiento,$cantidad,$idUsuario )";

if($conex->query($sqlMovimiento)){
    $sql = "SELECT stockProducto FROM productos WHERE idProducto = $idProducto ";
    $result = $conex->query($sql);

    if($tipoMovimiento == 1){ //1 = entrada
        $stockProducto = $result->fetch_assoc()["stockProducto"] + $cantidad;
    }else{
        $cantidadActual = $result->fetch_assoc()["stockProducto"];
        if($cantidadActual == 0){
            $conex->rollback();
            echo "
            <script>
                alert('Fondos insuficientes');
                location.href = '../../inventario/marcas.php';
            </script>";
        }else{
            if($cantidadActual < $cantidad){
                $conex->rollback();
                echo "
                <script>
                    alert('Fondos insuficientes');
                    location.href = '../../inventario/marcas.php';
                </script>";
            }else{
                $stockProducto = $cantidadActual - $cantidad;
                if($stockProducto < 0){
                    $stockProducto = 0;
                }
            }
        }
    }

    try {
        $sqlStock ="UPDATE productos SET stockProducto = $stockProducto WHERE idProducto = $idProducto";
        if($conex->query($sqlStock)){
            $conex->commit();
            echo "
            <script>
                alert('Movimiento realizado con exito');
                location.href = 'index.php';
            </script>";
        }else{
            $conex->rollback();
            echo "
            <script>
                alert('Ocurrio un problema al realizar el movimiento');
                location.href = '../../inventario/marcas.php';
            </script>";
        }
    } catch (\Throwable $th) {
        $conex->rollback();
            echo "
            <script>
                alert('Ocurrio un problema al realizar el movimiento');
                location.href = '../../inventario/marcas.php';
            </script>";
    }
}

$conex->close();
?>