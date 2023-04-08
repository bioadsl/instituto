<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Upload de arquivo</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>

        /* Table Base */
        
        table {
          font-family: arial;
          max-width: 100%;
          background-color: transparent;
          border-collapse: collapse;
          border-spacing: 0;
        }
        
        .table { 
          width: 100%;
          margin-bottom: 20px;
        }
        
        .table th,
        .table td {
          font-weight: normal;
          font-size: 12px;
          padding: 8px 15px;
          line-height: 20px;
          text-align: left;
          vertical-align: middle;
          border-top: 1px solid #dddddd;
        }
        .table thead th {
          background: #eeeeee;
          vertical-align: bottom;
        }   
        .table tbody > tr:nth-child(odd) > td,
        .table tbody > tr:nth-child(odd) > th {
          background-color: #fafafa;
        }    
        .table .t-small {
          width: 5%;
        }
        .table .t-medium {
          width: 15%;
        }
        .table .t-status {
          font-weight: bold;
        }
        .table .t-active {
          color: #46a546;
        }
        .table .t-inactive {
          color: #e00300;
        }
        .table .t-draft {
          color: #f89406;
        }
        .table .t-scheduled {
          color: #049cdb;
        }
        
        /* Small Sizes */
        @media (max-width: 480px) { 
          .table-action thead {
            display: none;
          }
          .table-action tr {
            border-bottom: 1px solid #dddddd;
          }
          .table-action td {
            border: 0;
          }
          .table-action td:not(:first-child) {
            display: block;
          }
        }
        
        
        </style>
</head>
<?php include 'menu.php';?>
<div class="container">
    
<div class="row">
    <div class="col-lg-8" style="margin-top: 30px;">
        <h1>Prestação de Contas</h1>
    </div>
</div>
<hr>


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