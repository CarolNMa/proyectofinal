<!DOCTYPE html>
<html>
    <head>
       <title></title>
       <link rel="stylesheet" href="../css/log.css">
       <link rel="stylesheet" href="\emoji\assets\bootstrap-5\boot\css\bootstrap.min.css">
    </head>
    <body>
    <div>
            <img src="../emoji/imagenes/logo4.png"  class="imagen" alt="">
        </div>
     <form class="form" action="../php/includes.php" method="POST" >
     <h2 class="form__title">Iniciar Sesion</h2>
     <img src="../imagenes/descarga1.jpg"  class="img22 rounded-circle" alt="">
        <div class="mb-3">
        <label id="usua" name="usua" for="exampleInputEmail1" class="form-label" placeholder="nombre">Nombre</label>
        <input type="text" name="usua" id="usua" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div class="form-text">Tu informacion esta segura
        </div>
        <br>
        </div>
        <div class="mb-3">
        <label id="contra" name="contra" for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" name="contra" id="contra" class="form-control" id="exampleInputPassword1">  
        </div>
  
        <input type="submit" class="btn btn-outline-success" value="Ingresar"></input>

        <a class="btn btn-outline-primary"  href="../index.php">Volver</a>
      </form>
      
</body>
</html> 