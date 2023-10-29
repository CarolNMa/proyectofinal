<?php
    
    include("../php/conexion.php");
     
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "DELETE FROM usuario WHERE idAdmin=$id";
            $conex->query($sql);
    }

    header("location: ../usuario/index.php");
    exit;
?>