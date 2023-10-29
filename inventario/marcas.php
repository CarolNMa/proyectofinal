<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="\emoji\assets\bootstrap-5\boot\css\bootstrap.min.css">

    <title>Inventario</title>
    <link rel="stylesheet" href="../css/marcas.css">
  </head>
    <script> 
      var productos = [] 
      
    </script>
        <body class="body"> 

          <ul class="menu">
            <li><a href="../php/movimiento/index.php">Movimiento</a></li>
          </ul>  
          <div class="titulo w-50 mh-100 ">
            <h1>Movimientos de Productos</h1>
            <form class="form-container" action="../php/movimiento/movimiento.php" method="post">
          <div class="mb-3">  
            <label for="idpro">Seleccione el producto:</label>
            <select class=" mh-100 form-control " id="idpro" name="idpro" required onchange="mostrarProducto(this)">
            <option value="">Seleccione una opcion</option>
            <?php
               include("../php/conexion.php");
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
                ?>
                  <script>
                    productos.push(JSON.parse('<?=json_encode($row)?>'))
                  </script>
                <?php
                   echo "<option value='$row[idProducto]'>$row[descripMarca]</option>";
               }
            ?>
            </select><br>
            <div id="informacionProducto">

            </div>
            <br>
            <label for="tipomov">Tipo de movimiento:</label>
            <select class="form-control  text-aling" id="tipomov" name="tipomov" required>
              <option value="1">Entrada</option>
              <option value="2">Salida</option>
            </select><br><br>
            <label  for="exampleInputEmail1">Cantidad:</label>
            <input class="form-control text-center" placeholder="ingresar cantidad" type="number" id="cantmov" name="cantmov" required><br><br>
            <input type="submit" value="Enviar">
          </div>
          
      </form>

      <script>

        function mostrarProducto(select){
          productoEncontrado = productos.filter(producto => producto.idProducto == select.value)
          if(productoEncontrado.lenght == 0){
            alert("No se encontro el producto")
            informacionProducto.innerHTML = "No se encontro";
          }else{
            html = "Id: " + productoEncontrado[0]["idProducto"] + " <br> Nombre: " + productoEncontrado[0]["nomProducto"] + "<br> Marca: " + productoEncontrado[0]["descripMarca"] + "<br> Presentación: " + productoEncontrado[0]["descPresentacion"] + "<br> Stock: " + productoEncontrado[0]["stockProducto"] + "<br> Precio: $" + productoEncontrado[0]["preProducto"]
            informacionProducto.innerHTML = html;
          }

        }
      </script>
  </body>
</html>
