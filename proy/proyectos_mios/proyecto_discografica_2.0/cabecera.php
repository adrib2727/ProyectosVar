<header>
    <link rel="stylesheet" href="estilos/cabecera_estilo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <div class="container-fluid" id="contenedor">
        <div class="row">
            <div class="text-right mt-1 mb-1 ml-1">
                <a class="btn btn-light" href="principal.php">Página principal</a>
            </div>
            <div class="col mt-2 text-center text-white">
                <!-- Muestra el usuario con el que la sesión está iniciada -->
                <h4>Usuario: <?php print_r($_SESSION["usuario"]["usuario"]);?></h4> 
            </div>
            <div class="text-right mt-1 mb-1 ml-1">
                <a class="btn btn-danger justify-content-end mr-2" href="logout.php">Cerrar sesión</a>
            </div>
        </div>
    </div>
</header>


