<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "1");
error_reporting(E_ALL);
//include 'error.php';


// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';
$id_matricula = (isset($_GET['id_matricula'])) ? $_GET['id_matricula'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_cliente) && is_numeric($id_cliente)) :

    // Captura os dados do cliente solicitado
    $conexao = conexao::getInstance();
    $sql = 'SELECT *  FROM tab_bravos WHERE id = :id';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_cliente);
    $stm->execute();
    $cliente = $stm->fetch(PDO::FETCH_OBJ);

    // Captura os dados do atendimento solicitado
    $conexao1 = conexao::getInstance();
    $sql1 = 'SELECT * FROM tb_matricula WHERE id_bravo = :id_cliente';
    $stm = $conexao1->prepare($sql1);
    $stm->bindValue(':id_cliente', $id_cliente);
    $stm->execute();
    $regs = $stm->fetch(PDO::FETCH_OBJ);

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM tb_avaliacao'; 
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$registros = $stm->fetch(PDO::FETCH_OBJ);

    
    
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



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Guardiões</title>
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
            <h1>Avaliação pelos Guardiões</h1>
        </div>
    </div>
    <hr>
    <div class='container'>
                <fieldset>
                    <?php if(empty($regs)):?>
                        <h3 class="text-center text-danger">Membro não encontrado!</h3>
                    <?php else : ?>
                
        <!--inicio produtos-->           
        
        <form action="action_avaliacao.php" method="post" id='form-contato' enctype='multipart/form-data'>
                
                    <div class="row" style="font-size: 150%;">    
                
                        
                        <div class="col-lg-3">
                                <!--label for="nome">Foto produto</label-->
                                <div class="col-md-12">
                                    <a href="#" class="thumbnail">

                                        <img src="fotos/<?= $cliente->foto ?>" height="200" width="200" id="foto_produto">
                                    </a>
                                </div>
                                
                        </div>  
                            
                        
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="data">Data</label>
                                <input type="text" class="form-control"  placeholder="Informe a data" value="<?php echo date('d/m/Y');?>" disabled>
                            </div>
                        </div> 
                        
                        
                    
                                <div class="col-lg-4">
                                    <div class="form-group">     
                                        <label for="turma">Turma: </label>
                                        <input type="text" class="form-control" 
                                        placeholder="Informe a turma" value="<?= $regs->turma ?>" disabled>
                                        <span class='msg-erro msg-turma'></span>
                                    </div>
                                </div>
                                
                                
                                <div class="col-lg-4">
                                    <div class="form-group">     
                                        <label for="matricula">Matricula: </label>
                                        <input type="text" class="form-control" 
                                        placeholder="Informe a matricula" value="<?= $regs->cod_matricula ?>" disabled>
                                        <span class='msg-erro msg-matricula'></span>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="data_nascimento">Nascimento:  </label>     
                                    <input type="text" class="form-control" value="<?php $date1 = strtr($cliente->dt_nascimento, '/', '-'); ?> <?= date('d/m/Y', strtotime($date1)) ?>" disabled>
                                </div>
                            

                     </div>
                            <div class="col-lg-8">   
                                <div class="form-group">                            
                                    <label for="nome">Nome: </label> 
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe a matricula" value="<?=$cliente->nome ?>" disabled>
                                    <span class='msg-erro msg-nome'></span>                              
                                </div>
                            </div>
                            
                    </div>
        </div>
        <?php endif; ?> 
   <!---fim dos produtos-->  
                    
                    
                    

<div class='container'>

 
        <legend>Avaliem segundo os critérios abaixo</legend>              
                    
                    <fieldset>

<div class="row">
                        <div class="col-lg-2">          
                            <label for="civismo">Civismo 1</label>
                            <select class="form-control" name="civismo" id="civismo">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-civismo'></span>
                        </div>
                    
                        <div class="col-lg-2">          
                            <label for="nos_amarras1">Nós e Amarrações</label>
                            <select class="form-control" name="nos_amarras1" id="nos_amarras1">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-nos_amarras1'></span>
                        </div>
                        
                        <div class="col-lg-2">          
                            <label for="xadrez1">Xadrex 1</label>
                            <select class="form-control" name="xadrez1" id="xadrez1">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-xadrez1'></span>
                        </div>      
                        
                        <div class="col-lg-2">          
                            <label for="sobrevivencia1">Sobrevivência</label>
                            <select class="form-control" name="sobrevivencia1" id="sobrevivencia1">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-sobrevivencia1'></span>
                        </div> 

                        <div class="col-lg-3">          
                            <label for="orientacao1">Orientação 1</label>
                            <select class="form-control" name="assiduidade" id="assiduidade">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-assiduidade'></span>
                        </div> 
</div>
<div class="row" style="padding-top: 2%;">
                        <div class="col-lg-2">          
                            <label for="ordem_unida1">Ordem Unida 1</label>
                            <select class="form-control" name="ordem_unida1" id="ordem_unida1">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-ordem_unida1'></span>
                        </div>
                    
                        <div class="col-lg-2">          
                            <label for="habilidades1">Habilidades Manuais 1</label>
                            <select class="form-control" name="habilidades1" id="habilidades1">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-habilidades1'></span>
                        </div>
                        
                        <div class="col-lg-2">          
                            <label for="taf1">Treinamento Fisico 1</label>
                            <select class="form-control" name="taf1" id="taf1">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-taf1'></span>
                        </div>      
                        
                        <div class="col-lg-2">          
                            <label for="prim_socorros1">Primeiros Socorros 1</label>
                            <select class="form-control" name="prim_socorros1" id="prim_socorros1">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-prim_socorros1'></span>
                        </div> 

                        <div class="col-lg-3">          
                            <label for="prev_acidentes1">Prevenção de Acidentes 1</label>
                            <select class="form-control" name="prev_acidentes1" id="prev_acidentes1">
                                <option value="">Selecione a nota</option>
                                <option value="1">1-Insuficiente</option>
                                <option value="2">2-Regular</option>
                                <option value="3">3-Bom </option>
                                <option value="4">4-Muito Bom</option>
                                <option value="5">5-Excelente</option>
                            </select>
                            <span class='msg-erro msg-prev_acidentes1'></span>
                        </div> 
</div>    
                <div class="row" style="padding-top: 5%;">
                    <div class="col-lg-4">
                        <input type="hidden" name="acao" value="incluir_avaliacao_guardioes">
                        <input type="hidden" name="id_bravo" value="<?=$cliente->id?>">
                        <input type="hidden" name="nome" value="<?=$cliente->nome?>">
                        <input type="hidden" name="turma" value="<?= $regs->turma ?>">
                        <input type="hidden" name="matricula"  value="<?= $regs->cod_matricula ?>">
                        <input type="hidden" name="data" value="<?=date('d/m/y');?>">
                        <button type="submit" class="btn btn-primary" id='botao'>
                            Gravar
                        </button>
                        <a href='?pagina=consulta_turma' class="btn btn-danger">Voltar</a>
                    </div>
                </div>

            </form>

        <?php endif; ?>


    </fieldset>
  



<script type="text/javascript" src="js/custom.js"></script>


</body>
<!--Rodapé da Pagina-->
<div id="footer" padding="20">
    <hr>
    <div id="" align="center">
        <address id="Administração-CAP-copyright">
            <address id="version">
                <p> Powered by <a href="http://casadeadoracaoprofetica.com.br" title="Sistema de gerenciamento Administrativo"> CAP &reg; - </a> Ministério de Tecnologia CAP
                    2022
                <address id="webmaster-contact-information"> Contato dos <a href="mailto:fabricio.4135@gmail.com.br" title="Entre em contato com o webmaster via e-mail."> Desenvolvedores </a> para sugestões
                </address>
                </p></a>
    </div>
</div>

</html>