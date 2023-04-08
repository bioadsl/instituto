<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
//$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
//if (!empty($id_produto) && is_numeric($id_produto)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT `id_produto`, `foto_produto`, `descricao`, `nome_produto`, `preco` FROM `tb_produto`'; 
    //WHERE id_produto = :id_produto';
	$stm = $conexao->prepare($sql);
	//$stm->bindValue(':id_produto', $id_produto);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);
    $pdo = null;
    
    
//---
require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
require_once('protege.php');
///////////////////



$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

if (@$_SESSION['idusuario'] != 1)
    header('Location: login.php');







?>



<!--DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Loja BRAVOS</title>
    <!--<link rel="stylesheet" href="css/pure-min.css">
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
<?php if(empty($cliente)):?>
				        <h3 class="text-center text-danger">Produto não encontrado!</h3>
			        <?php else:?>
 <!--inicio produtos-->           

                <!--div class="col-sm-4">
                    <img src="images/camiseta.jpg" height="" width="80%" id="foto-produto" class="img-responsive">
                    <p style="font-size: 10px; margin-top: 15px;"><b>Código:</b> <span>00<?=$cliente->id_produto?> <span></p>
                    <p style="font-size: 10px; margin-top:-10px;"><b>Preço:</b> <span><?=$cliente->preco?> <span></p>
                    <p style="font-size: 10px; margin-top:-10px;"><b>Nome:</b> <span><?=$cliente->nome_produto?> <span></p>
                    <p style="font-size: 10px; margin-top:-10px;"><b>Descrição:</b> <span><?=$cliente->descricao?> <span></p>
                </div       

                        

                <div class="col-sm-4">
                    <img src="images/camiseta.jpg" height="" width="80%" id="foto-produto" class="img-responsive">
                    <p style="font-size: 14px; margin-top: 15px;"><b>Código:</b> <span>00<?=$cliente->id_produto?> <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Preço:</b> <span><?=$cliente->preco?> <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Nome:</b> <span><?=$cliente->nome_produto?> <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Descrição:</b> <span><?=$cliente->descricao?> <span></p>
                </div>
               
   
                <div class="col-sm-4">
                    <img src="images/camiseta2.jpg" height="" width="80%" id="foto-produto" class="img-responsive">
                    <p style="font-size: 14px; margin-top: 15px;"><b>Código:</b> <span>002 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Preço:</b> <span> R$ 65,00 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Nome:</b> <span>Camiseta Manga Cumprida Camuflada <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Descrição:</b> <span>Camiseta Uniforme Manga Cumprida Camulfada<span></p>
                </div>


                
                <div class="col-sm-4">
                    
                    <label>PIX ou depósito bancário</--label><br>
                    <img src="images/camiseta3.jpg" height="" width="80%" id="foto-produto" class="img-responsive">
                    <p style="font-size: 14px; margin-top: 15px;"><b>Código:</b> <span>003 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Preço:</b> <span>R$ 50,00 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Nome:</b> <span>Camiseta Manga Curta Camuflada <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Descrição:</b> <span>Camiseta Uniforme Manga Curta Camulfada <span></p>
                </div> 



                
        
                
                
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    
                    <div class="carousel-inner">
                    
            
            
                <div class="item active">
                <div style="text-align:center">
                    <img src="images/camiseta.jpg" alt="Instrução de Abrigos" style="width:50%;">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Camiseta Uniforme Basica</h3>
                    <p style="font-size: 14px; margin-top: 15px;"><b>Código:</b> <span>001 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Preço:</b> <span> R$ 35,00 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Nome:</b> <span>Camiseta Uniforme Basica <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Descrição:</b> <span>Camiseta Uniforme Basica Preta Malha Fria<span></p>
                    
                    </div>
                </div>

                <div class="item">
                <div style="text-align:center">
                    <img src="images/camiseta2.jpg" alt="Instrução de Abrigos" style="width:50%;">
                    </div> 
                    <div class="carousel-caption d-none d-md-block">
                    <h3>Camiseta Manga Cumprida Camuflada</h3>
                    <p style="font-size: 14px; margin-top: 15px;"><b>Código:</b> <span>002 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Preço:</b> <span> R$ 65,00 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Nome:</b> <span>Camiseta Manga Cumprida Camuflada <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Descrição:</b> <span>Camiseta Uniforme Manga Cumprida Camulfada<span></p>
                    </div>
                </div>

                <div class="item">
                   <div style="text-align:center"> 
                   <img src="images/camiseta3.jpg" alt="Instrução de Abrigos" style="width:50%">
                   </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Camiseta Manga Curta Camuflada</h3>
                        
                        <!--img src="images/camiseta3.jpg" height="" width="80%" id="foto-produto" class="img-responsive"-->
                    <p style="font-size: 14px; margin-top: 15px;"><b>Código:</b> <span>003 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Preço:</b> <span>R$ 50,00 <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Nome:</b> <span>Camiseta Manga Curta Camuflada <span></p>
                    <p style="font-size: 14px; margin-top:-10px;"><b>Descrição:</b> <span>Camiseta Uniforme Manga Raglan Curta Camulfada <span></p>

                    </div>
                </div>


                </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Próximo</span>
            </a>

        </div>

                
            
            <?php endif; ?> 
<!---fim dos produtos-->  
           
<div class="row">
           
           
            <form class="form-group" action="action_pedido.php" method="post" id='form-contato'
                enctype='multipart/form-data'>
                <div class="row">



                    <legend style="margin-top:30px;">Pedidos</legend>


            <div class="row">
                 <div class="col-lg-6">
                    <div class="form-group">     

                       
                    <label for="id_produto">Codigo do Produto: </label>
                        <select class="form-control" name="id_produto" id="id_produto">
                            <option value="">Selecione o Tamanho</option>
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



                    <div class="col-lg-4">
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

                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="col-lg-6">

                        <div class="col-sm-6">
                            <img src="images/pix.png" height="" width="50%">
                            <p style="font-size:14px; margin-top: 8px; ">Chaves PIX: <b>61998531189</b></p>
                            <p style="font-size:14px; margin-top:-8px; "><b>markim.nva@gmail.com</b></p>

                        </div>
                        <div class="col-sm-6">
                            <label for="comprovante">Enviar o comprovante</label>
                            <input type="file" name="comprovante" id="comprovante"
                                accept="image/png, image/jpeg, image/jpg, image/svg">
                        
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12" >
                    <div class="form-group">
                    
                    <label for="observacao">Observação</label>
                        <input class="form-control" type="text" name="observacao" id="observacao">
                       
                    </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <input type="hidden" name="acao" value="incluir_pedido">
                        <input type="hidden" name="data_pedido" value="<?=date("d/m/Y");?>"/>

                        <button type="submit" class="btn btn-primary" id='botao'>
                            Gravar
                        </button>
                        <a href='index.php' class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
            
        </fieldset>
</html>