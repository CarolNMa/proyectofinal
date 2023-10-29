<?php
    
    include("../conexion.php");
     
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "DELETE FROM productos WHERE idProducto=$id";
            $conex->query($sql);
    }

    header("location: ../produc/index.php");
    exit;
?>