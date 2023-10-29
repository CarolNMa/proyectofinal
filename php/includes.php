<?php
include("conexion.php");


     $usua = $_POST['usua'];
     $pass = $_POST['contra'];
     
     session_start();
     $_SESSION['usua']=$usua;
     
     $consulta="SELECT * FROM usuario WHERE usuaAdmin='$usua' AND passAdmin='$pass'";
     $resultado=mysqli_query($conex, $consulta);
     $tabla=mysqli_fetch_array($resultado);
     
     $_SESSION["idUsuario"] = $tabla["idAdmin"];
     if ($tabla) {
     echo "<script>window.location.href='../inventario/index.php'; </script>";
} else {
     echo "<script>alert('USTED NO ES USUARIO'); </script>";

     echo "<script>window.location.href='../html/log.php';</script>";

     mysqli_free_result($resultado);
     mysqli_close($conex);
}

?>