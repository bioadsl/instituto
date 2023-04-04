<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "1");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
//$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
//if (!empty($id_produto) && is_numeric($id_produto)):


   // $pdo = null;
    



?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Loja BRAVOS</title>
    <!--<link rel="stylesheet" href="css/pure-min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
    <div class="row">
        <div class="col-lg-4">
            <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS' style="margin-left:100px;">
        </div>
        <div class="col-lg-8" style="margin-top: 30px;">
            <h1>Loja BRAVOS</h1>
        </div>
    </div>
    <hr>


    <div class='container'>
        <fieldset>
        
            
        <?php

            $conexao = conexao::getInstance();
            $sql = 'SELECT * FROM tb_produto';
            $stm = $conexao->prepare($sql);
            $stm->execute();
            $registros = $stm->fetchAll(PDO::FETCH_OBJ);
        ?>
        <?php if(!empty($registros)):?>
        <?php foreach($registros as $registro):?>
                
 <!--inicio produtos-->           
 
        <div class="row">

                <div class="col-sm-4">
                    <img src="<?=$registro->foto_produto?>" height="" width="80%" id="foto-produto" class="img-responsive">
                    <p style="font-size: 14px; margin-top: 15px;"><b>Código:</b> <span>00<?=$registro->id_produto?> <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Preço:</b> <span><?=$registro->preco?> <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Nome:</b> <span><?=$registro->nome_produto?> <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Descrição:</b> <span><?=$registro->descricao?> <span></p>
                </div>

                <?php endforeach;?>
                
                    
 </div>

<legend>Pedido do Uniforme</legend>

 <form class="form-group" action="action_pedido.php" method="post" id='form-contato'   enctype='multipart/form-data'>


        <div class="row">
    
                 <div class="col-lg-2">
                        <div class="form-group">
                            <label for="data_pedido">Data</label>
                            <input type="text" class="form-control"  placeholder="Informe a data" value="<?php echo date('d/m/Y');?>" disabled>
                        </div>
                    </div>


                <div class="col-lg-4">
                    <div class="form-group">     
                    <label for="id_produto">Produto: </label>
                        <select class="form-control" name="id_produto" id="id_produto">
                            <option value="">Selecione o Produto</option>
                            <option value="1">Camiseta Uniforme Basica</option>
                            <option value="2">Camiseta Manga Cumprida Camuflada</option>
                            <option value="3">Camiseta Manga Curta Camuflada</option>
                        </select>
                        <span class='msg-erro msg-tp-id_produto'></span>
                    </div>
                 </div>  
                 
                 <div class="col-lg-4">          
                       <label for="tamanho_pedido">Tamanho</label>
                        <select class="form-control" name="tamanho_pedido" id="tamanho_pedido">
                            <option value="">Selecione o Tamanho</option>
                            <option value="P">P</option>
                            <option value="M">M</option>
                            <option value="G">G</option>
                            <option value="XG">XG</option>
                            <option value="6 anos">6 anos</option>
                            <option value="8 anos">8 anos</option>
                            <option value="10 anos">10 anos</option>
                            <option value="12 anos">12 anos</option>
                        </select>
                        <span class='msg-erro msg-tamanho_pedido'></span>
                    </div>
                    
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="numer" class="form-control" id="quantidade" name="quantidade"
                            placeholder="Informe a Quantidade">
                        <span class='msg-erro msg-quantidade'></span>
                    </div>
                </div>        


        </div>

            <div class="row">
                <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome_pedido">Nome completo</label>
                            <input type="text" class="form-control nome" id="nome_pedido" name="nome_pedido" value""
                                sinc="sinc1" placeholder="Infome o Nome">
                            <span class='msg-erro msg-nome_pedido'></span>
                        </div>
                    </div>

  
                   
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cel_pedido">Celular</label>
                            <input type="text" class="form-control" id="cel_pedido" maxlength="13" name="cel_pedido"
                                placeholder="Informe o Celular com Whatsapp">
                            <span class='msg-erro msg-cel_pedido'></span>
                        </div>
                    </div>



                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email_pedido">E-mail</label>
                            <input type="text" class="form-control" id="email_pedido" name="email_pedido"
                                placeholder="Informe o E-mail">
                            <span class='msg-erro msg-email_pedido'></span>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-2">
                        <img src="images/pix.png" height="" width="80%">
                        <p style="font-size:14px; margin-top: 8px; "><b>bravoscap@gmail.com</b></p>
                        <p style="font-size:14px; margin-top:-8px; "><b></b></p>
                    </div>
                    
                
                    <div class="col-lg-4">
                        <label for="comprovante">Enviar o comprovante</label>
                        <input type="file" name="comprovante" id="comprovante" accept="image/png, image/jpeg, image/jpg, image/svg">
                    </div>

                
          
                    <div class="col-lg-12" >
                    <div class="form-group">
                    
                    <label for="observacao">Observação</label>
                        <textarea class="form-control" type="text" name="observacao" id="observacao" rows="5"></textarea>
                       
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <input type="hidden" name="acao" value="incluir_pedido">
                        <input type="hidden" name="remessa" value="<?php echo date('m-Y');?>">
                        <input type="hidden" name="data_pedido" value="<?php echo date('d/m/Y');?>">
                        <button type="submit" class="btn btn-primary" id='botao'>
                            Gravar
                        </button>
                        <a href='index.php' class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
            <?php else: ?>
                <h3 class="text-center text-danger">Produto não encontrado!</h3>
        <?php endif; ?> 
<!---fim dos produtos-->           
        </fieldset>
</html>