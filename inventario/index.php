<html>
    <head>
        <title>EMOJI COFFE BAR</title>
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="\emoji\assets\bootstrap-5\boot\css\bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="body">
        <ul class="menu">
            
            <li><a href="../php/marcas/index.php">Marcas</a></li>
            <li><a href="../php/presen/index.php">Presentacion</a></li>
            <li><a href="../php/produc/index.php">Productos</a></li>
            <li><a href="../inventario/marcas.php">Movimientos</a></li>
            <button class="col-3 rounded-pill  btn btn-outline-ligh text-light btn-xs" style="menu" onclick="alerta()">Cerrar Sesion</button>
            <script>
                function alerta() {
                    Swal.fire({
                        title: 'Desea cerrar sesión?',
                        text: "Si la cierras deberás volver a iniciar sesión",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'SI',
                        cancelButtonText:'NO',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Sesión cerrada',
                                'Vuelve pronto',
                                'success',
                            )     
                            window.location.assign("http://localhost/emoji/index.php");                       
                        }
                    })
                }
            </script>
            
        </ul>
        <div>
        <img src="../imagenes/logo4.png"  class="imagen" alt="">
        </div>        
                <div class="alerta">
                    <p>Bienvenido a nuestro inventario.</p>
                </div>
        
        
    </body>

    
</html>