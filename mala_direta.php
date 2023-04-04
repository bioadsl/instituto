<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>BRAVOS CAP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- JS Comportament -->
    <script src="./assets/js/comportamento.js"></script>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" src="./assets/css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <!-- Styles Galeria -->
</head>
    <div class="row">
        <div class="col-lg-4">
            <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS' style="margin-left:100px;">
        </div>
        <div class="col-lg-8" style="margin-top: 30px;">
            <h1>Mala Direta</h1>
        </div>
    </div>
    <hr>
    <div class="container">
        <form action="envio.php" method="post">
                <label for="assunto">Assunto: </label>
                <input class="form-control" required name="assunto" type="text">
            </fieldset>
            <fieldset>
                <label for="mensagem_md">Mensagem: </label>
                <textarea style="height:auto!important" class="form-control" required name="mensagem_md" rows="100"></textarea>
            </fieldset>
            <fieldset>
                <a href='' class="btn btn-danger">Cancelar</a>
                <button class="btn btn-success" type="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
</html>