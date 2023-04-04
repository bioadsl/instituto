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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    .cont {
    width: 27vw;
    height: 20vh;
      display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center
    }
    .box {
    width: 300px;
    height: 300px;
    background: #fff;
    }
    body {
    margin: 0px;
    }
    </style>
    
</head>
<div class="row">
    <div class="col-lg-4">
        <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS' style="margin-left:100px;">
    </div>
    <div class="col-lg-8" style="margin-top: 30px;">
        <h1>Prestação de Contas</h1>
    </div>
</div>
<hr>

<div class="container">


<div id="row" class="row  row-fluid ">

<div class=" column_container col-sm-2">
</div>
    <div class=" column_container col-sm-5">
        <div class="column-inner ">
            <div class="wwrapper">
                <div class="textbox ">
                    <div class="textbox-inner" style="text-align: center;">
                        <div class="textbox-content" style="background-color: #f4f6f7;background-position: center top;padding-top: 45px;">
                        <div class="centered-box">
                            <div class="icon icon-pack-material icon-size-medium  icon-shape-square simple-icon" style="opacity: 1;">
                            <div class="icon-inner" style="">
                            <span class="glyphicon" style='font-size:36px;'>&#xe032;</span>
                            </div>
                        </div>
                    </div>
                    <div class="clearboth">

                    </div>
                    <div class="divider" style="margin-top: 19px;">
                </div>
                    <div class="row  inner row-fluid ">
                                <h4 style="text-align: center;">
                                     <strong>UPLOAD DA PLANILHA EM CSV</strong>
                                 </h4>

                        <div class="column column_container col-sm-3">

                            <div class="column-inner ">
                                <div class="wrapper">

                                        <div class="text_column content_element">
                                            <div class="cont">
                                             
                                                
                                                    <form method="post" action="recebe_upload.php" enctype="multipart/form-data">
                                                        <label>Arquivo:</label>
                                                        <input type="file" name="arquivo" />
                                                        <input type="submit" value="Enviar" />
                                                    </form>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container btn-position-center">
                        <a style="margin-top:10px; margin-bottom:10px" href="?pagina=transparencia" class="btn btn-default
                                btn-lg" >Voltar</a>
                        </div> 
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class=" column_container col-sm-2">
        </div>
        
   
 
        
        












    </div>

</div>


</html>