<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
$id_pedido = (isset($_GET['id_pedido'])) ? $_GET['id_pedido'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_pedido) && is_numeric($id_pedido)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = "SELECT  
    pd.id_pedido, 
    pd.nome_pedido, 
    pd.tamanho_pedido, 
    pd.email_pedido, 
    pd.quantidade, 
    pd.cel_pedido, 
    pd.comprovante, 
    pd.id_produto, 
    pd.status, 
    pd.situacao, 
    pd.observacao,
    pd.data_pedido, 
    pdt.id_produto, 
    pdt.foto_produto, 
    pdt.descricao, 
    pdt.nome_produto, 
    pdt.preco
    FROM tb_pedido pd
    inner join
    tb_produto pdt
    on pd.id_produto=pdt.id_produto
    where pd.id_pedido = :id_pedido";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id_pedido', $id_pedido);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);

 //   echo var_dump($cliente) . "<br>";

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

//---

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Pedido</title>
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
                            <h1>Editar Pedido</h1>
                        </div>
                    </div>
    <hr>
    
    
    <div class='container'>
        <fieldset>
        <div class="row">
            <div class="col-sm-4">
                    <img src="<?=$cliente->foto_produto?>" height="" width="50%" id="foto-produto" class="img-responsive">
                     </div>  
               <div class="col-sm-4">
               <p style="font-size: 20px; margin-top: 10px;"><b>Detalhamento:</b> <span><span></p>
                    <p style="font-size: 20px; margin-top: 15px;"><b>Código:</b> <span>00<?=$cliente->id_produto?> <span></p>
                    <p style="font-size: 20px; margin-top: 10px;"><b>Preço:</b> <span><?=$cliente->preco?> <span></p>
                    <p style="font-size: 20px; margin-top: 10px;"><b>Nome:</b> <span><?=$cliente->nome_produto?> <span></p>
                    <p style="font-size: 20px; margin-top: 10px;"><b>Descrição:</b> <span><?=$cliente->descricao?> <span></p>
               </div> 
               <div class="col-sm-4">
               <p style="font-size: 20px; margin-top: 10px;"><b>Comprovante:</b> <span><span></p>
                
               <img src="<?=$cliente->comprovante?>" height="" width="50%" >
               
               </div> 



        </div> 
            
            <form class="form-group" action="action_pedido.php" method="post" id='form-contato'
                enctype='multipart/form-data'>
                <div class="row">
                <p style=" margin-top: 25px;">
                    <legend>Pedido do Uniforme</legend>
                  </p>  
                            <div class="col-lg-6">
                                <div class="form-group">     
                                <label for="id_produto">Codigo do Produto: </label>
                                <select class="form-control" name="id_produto" id="id_produto">
                                    <option value="<?=$cliente->id_produto?>"><?=$cliente->id_produto?> - <?=$cliente->nome_produto?></option>
                                    <option value="">Selecione o Produto</option>
                                    <option value="1">Camiseta Uniforme Basica</option>
                                    <option value="2">Camiseta Manga Cumprida Camuflada</option>
                                    <option value="3">Camiseta Manga Curta Camuflada</option>
                                </select>
                                <span class='msg-erro msg-tp-id_produto'></span>
                            </div>
                        </div>     
                            
                    
                    
                    
                    <div class="col-lg-6">
                        <label for="tamanho_pedido">Tamanho</label>
                        <select class="form-control" name="tamanho_pedido" id="tamanho_pedido">
                        <option value="<?=$cliente->tamanho_pedido?>"><?=$cliente->tamanho_pedido?></option>
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
            </div>      
        <div class="row">     
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="quantidade">Quantidade</label>
                            <input type="text" class="form-control" id="quantidade" name="quantidade"
                                placeholder="Informe a Quantidade" value="<?=$cliente->quantidade?>">
                            <span class='msg-erro msg-quantidade'></span>
                        </div>
                    </div>
                

                <div class="col-lg-6">
                        <div class="form-group">
                            <label for="data_pedido">Data</label>
                            <input type="text" class="form-control" id="data_pedido" name="data_pedido"
                                placeholder="Informe a data" value="<?=$cliente->data_pedido?>">
                            <span class='msg-erro msg-data_pedido'></span>
                        </div>
                    </div>
            </div>

        
            <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nome_pedido">Nome completo</label>
                            <input type="text" class="form-control nome" id="nome_pedido" name="nome_pedido" value="<?=$cliente->nome_pedido?>"
                                sinc="sinc1" placeholder="Infome o Nome">
                            <span class='msg-erro msg-nome_pedido'></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cel_pedido">Celular</label>
                            <input type="text" class="form-control" id="cel_pedido" maxlength="13" name="cel_pedido"
                                placeholder="Informe o Celular com Whatsapp" value="<?=$cliente->cel_pedido?>">
                            <span class='msg-erro msg-cel_pedido'></span>
                        </div>
                    </div>

            </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email_pedido">E-mail</label>
                            <input type="text" class="form-control" id="email_pedido" name="email_pedido"
                                placeholder="Informe o E-mail" value="<?=$cliente->email_pedido?>">
                            <span class='msg-erro msg-email_pedido'></span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                    
                        <label for="comprovante">Comprovante </label>
                        <div>
                          <input type="file" name="comprovante" id="comprovante"
                            accept="image/png, image/jpeg, image/jpg, image/svg" value="<?=$cliente->comprovante?>">
                        </div>    
                    </div>
                    </div>
                
                <div class="row">
                            <div class="col-lg-6" >
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                <option value="<?=$cliente->status?>"><?=$cliente->status?></option>
                                    <option value="">Selecione...</option>
                                    <option value="Pago">Pago</option>
                                    <option value="Pendente">Pendente</option>
                                </select>
                                <span class='msg-erro msg-status'></span>
                            </div>
                            </div>

                        <div class="col-lg-6" >
                            <div class="form-group">
                                <label for="situacao">Situação</label>
                                <select class="form-control" name="situacao" id="situacao">
                                <option value="<?=$cliente->situacao?>"><?=$cliente->situacao?></option>
                                    <option value="">Selecione...</option>
                                    <option value="Entregue">Entregue</option>
                                    <option value="Reservado">Reservado</option>
                                    <option value="Estoque">Estoque</option>
                                </select>
                                <span class='msg-erro msg-situacao'></span>
                            </div>
                        </div>

                </div>






                <div class="row">
                    <div class="col-lg-12" >
                    <div class="form-group">
                    
                    <label for="observacao">Observação</label>
                        <input class="form-control" type="text" name="observacao" id="observacao"
                        value="<?=$cliente->observacao?>">
                       
                    </div>
                    </div>
                </div>






                <br><br>
                <div class="row">
                    <div class="col-lg-4">
                        <input type="hidden" name="acao" value="editar_pedido">
                        <input type="hidden" name="id_pedido" value="<?=$cliente->id_pedido?>">
                        <button type="submit" class="btn btn-primary" id='botao'>
                            Salvar
                        </button>
                        <a href='index.php' class="btn btn-danger">Cancelar</a>
                    </div>
                </div>


            </form>

    

<!--?php endif; ?-->
        </fieldset>

        <?php endif; ?>

    </div>
</html>