
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <?php require "cabecera.php";?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <p>
                <div class="col">
                    <p class="display-4 text-center bg-warning">
                        COMPAÑ
                    </p>
                </div>
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 text-center">
                <div class="form-group">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> "method="POST">
                        <label for="estado">Consulta las grabaciones con el <strong>estado</strong> que desees</label>
                        <input id="estado" type="text" placeholder="Bueno, Malo o Regular">
                        <input type="submit" value="Consultar estado">
                    </form>
                    <br>
                    <form action="">
                        <label for="formato">Consulta las grabaciones con el <strong>formato</strong> que desees</label>
                        <input type="text" id="formato" placeholder="cd, mp3 o wav">
                        <input type="submit" value="Consultar formato">
                    </form>
                    <br>
                    <form action="">
                        <label for="estilo">Consulta las grabaciones con los siguientes <strong>estilos</strong> (Rock, Piano, Blues, Heavy, Thrash o Clasica)</label>
                        <input type="text" id="formato" placeholder="Estilos">
                        <input type="submit" value="Consultar estilo">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>
</html>