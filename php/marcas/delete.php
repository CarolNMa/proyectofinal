<?php
    
    include("../conexion.php");
     
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        $sql = "DELETE FROM marca WHERE idMarca=$id";
            $conex->query($sql);
    }

    header("location: ../marcas/index.php");
    exit;
?>