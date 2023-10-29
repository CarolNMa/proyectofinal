<?php
    
    include("../conexion.php");
     
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "DELETE FROM presentacion WHERE idPresentacion=$id";
            $conex->query($sql);
    }

    header("location: ../presen/index.php");
    exit;
?>