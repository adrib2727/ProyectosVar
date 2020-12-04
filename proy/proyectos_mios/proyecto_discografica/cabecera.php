<header>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <style>
        h5{
            font-family: 'Playfair Display', serif;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
        <div class="text-right mt-1 mb-1 ml-1">
            <a class="btn btn-danger" href="logout.php">Cerrar sesión</a>
        </div>
        <div class="col mt-2">
            <h5>Usuario: <?php print_r($_SESSION["usuario"]["usuario"]);?></h5>
        </div>
        </div>
    </div>
</header>


