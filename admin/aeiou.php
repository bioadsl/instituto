
<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "1");
error_reporting(E_ALL);
//include 'error.php';

//inner join tb_matricula as m  a1.id_bravo=m.id_bravo 
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Captura os dados do cliente solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT *  FROM tab_bravos WHERE id = :id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$cliente = $stm->fetch(PDO::FETCH_OBJ);

// Captura os dados do atendimento solicitado
$conexao1 = conexao::getInstance();
$sql = 'SELECT * FROM tb_matricula WHERE id_bravo = :id';
$stm = $conexao1->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$matricula = $stm->fetch(PDO::FETCH_OBJ); 

// Captura os dados do atendimento solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT * FROM tb_grade1 WHERE id_bravo = :id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$grade1 = $stm->fetch(PDO::FETCH_OBJ); 

// Captura os dados do atendimento solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT * FROM tb_grade2 WHERE id_bravo = :id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$grade2 = $stm->fetch(PDO::FETCH_OBJ); 

$conexao = conexao::getInstance();
$sql = "SELECT a1.id_avaliacao1, a1.id_bravo, a1.matricula, a1.turma, a1.data, a1.nome, a1.obediencia1, a1.respeito1, a1.organizacao1, a1.servico1, a1.ds_escolar1, a1.disciplina1, a1.camaradagem1, a1.iniciativa1, a1.assiduidade1, a1.lideranca1 FROM tb_avaliacao1 as a1 where a1.id_bravo=:id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$avaliacao1 = $stm->fetch(PDO::FETCH_OBJ); 

$conexao = conexao::getInstance();
$sql = "SELECT a2.id_avaliacao2, a2.id_bravo, a2.matricula, a2.turma, a2.data, a2.nome, a2.obediencia2, a2.respeito2, a2.organizacao2, a2.servico2, a2.ds_escolar2, a2.disciplina2, a2.camaradagem2, a2.iniciativa2, a2.assiduidade2, a2.lideranca2 FROM tb_avaliacao2 as a2 where a2.id_bravo=:id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_cliente);
$stm->execute();
$avaliacao2 = $stm->fetch(PDO::FETCH_OBJ); 


    
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
    <title>Boletim</title>
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
            <h1>Boletim</h1>
        </div>
    </div>
    <hr>
    <div class='container'>
<div class="row" style="font-size: 150%;">    
    <fieldset>
                    <?php if(empty($cliente)):?>
                        <h3 class="text-center text-danger">Membro não encontrado!</h3>
                    <?php else : ?>              
                        
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
                        <label for="data">Data:</label>
                        <input type="text" class="form-control"  placeholder="Informe a data" value="<?= $matricula->data ?>" disabled>
                    </div>
                </div> 
                
                
            
                        <div class="col-lg-4">
                            <div class="form-group">     
                                <label for="turma">Turma: </label>
                                <input type="text" class="form-control" 
                                placeholder="Informe a turma" value="<?= $matricula->turma ?>" disabled>
                                <span class='msg-erro msg-turma'></span>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-4">
                            <div class="form-group">     
                                <label for="matricula">Matricula: </label>
                                <input type="text" class="form-control" 
                                placeholder="Informe a matricula" value="<?= $matricula->cod_matricula ?>" disabled>
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
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe a matricula" value="<?=$matricula->nome ?>" disabled>
                            <span class='msg-erro msg-nome'></span>                              
                        </div>
                    </div>
                    
            </div>
</div>



<?php endif; ?>



<?php if(!empty($avaliacao1)):?>

    <div class="container" >  

<h1> 1º Semestre </h1>

<legend>Avaliação dos Pais</legend>
    <div class="table " >
        <table class="table table-responsive">
            <thead>
                        <tr class='active'>
                            <th class="col-sm-auto" scope="col">Obediencia</th>
                            <th class="col-sm-auto" scope="col">Respeito</th>
                            <th class="col-sm-auto" scope="col">Organização</th>
                            <th class="col-sm-auto" scope="col">Serviço</th>
                            <th class="col-sm-auto" scope="col">Des. Escolar</th>
                            </tr>
                        </thead>
                        
                    
                        <tbody>
                            <tr>
                                <th class="col-sm-auto"> <?=$avaliacao1->obediencia1?></td>	
                                <th class="col-sm-auto"> <?=$avaliacao1->respeito1?></td>
                                <th class="col-sm-auto"> <?=$avaliacao1->organizacao1?></td>
                                <th class="col-sm-auto"> <?=$avaliacao1->servico1?></td>
                                <th class="col-sm-auto"> <?=$avaliacao1->ds_escolar1?></td>                         
                            </tr>
                        </tbody>
        </div>
    </table>


    <legend>Avaliação dos Guardiões</legend>
    <div class="table " >
        <table class="table table-responsive">
            <thead>
                        <tr class='active'>
                            <th class="col-sm-auto" scope="col">Disciplina</th>
                            <th class="col-sm-auto" scope="col">Camaradagem</th>
                            <th class="col-sm-auto" scope="col">Iniciativa</th>
                            <th class="col-sm-auto" scope="col">Assiduidade</th>
                            <th class="col-sm-auto" scope="col">Liderança</th>
                            </tr>
                        </thead>
                        
                    
                        <tbody>
                            <tr>
                                <th class="col-sm-auto"><?=$avaliacao1->disciplina1?></td>
                                <th class="col-sm-auto"><?=$avaliacao1->camaradagem1?></td>
                                <th class="col-sm-auto"><?=$avaliacao1->iniciativa1?></td>
                                <th class="col-sm-auto"><?=$avaliacao1->assiduidade1?></td>
                                <th class="col-sm-auto"><?=$avaliacao1->lideranca1?></td>                          
                            </tr>
                        </tbody>
        </div>
    </table>

    <legend>Disciplinas</legend>
    <div class="table " >
        <table class="table table-responsive">
            <thead>
                        <tr class='active'>
                            <th class="col-sm-auto" scope="col">Disciplina</th>
                            <th class="col-sm-auto" scope="col">Camaradagem</th>
                            <th class="col-sm-auto" scope="col">Iniciativa</th>
                            <th class="col-sm-auto" scope="col">Assiduidade</th>
                            <th class="col-sm-auto" scope="col">Liderança</th>
                            </tr>
                        </thead>
                        
                    
                        <tbody>
                            <tr>
                                <th class="col-sm-auto"><?=$avaliacao1->disciplina1?></td>
                                <th class="col-sm-auto"><?=$avaliacao1->camaradagem1?></td>
                                <th class="col-sm-auto"><?=$avaliacao1->iniciativa1?></td>
                                <th class="col-sm-auto"><?=$avaliacao1->assiduidade1?></td>
                                <th class="col-sm-auto"><?=$avaliacao1->lideranca1?></td>                          
                            </tr>
                        </tbody>
        </div>
    </table>


    <?php endif; ?>

<hr>


<?php if(!empty($avaliacao2)):?>

<div class="container" >  


<h1> 2º Semestre </h1>
<legend>Avaliação dos Pais</legend>
<div class="table">
    <table class="table table-responsive">
        <thead>
                    <tr class='active'>
                        <th class="col-sm-auto" scope="col">Obediencia</th>
                        <th class="col-sm-auto" scope="col">Respeito</th>
                        <th class="col-sm-auto" scope="col">Organização</th>
                        <th class="col-sm-auto" scope="col">Serviço</th>
                        <th class="col-sm-auto" scope="col">Des. Escolar</th>
                        </tr>
                    </thead>
                    
                
                    <tbody>
                        <tr>
                            <td class="col-sm-auto"><?=$avaliacao2->obediencia2?></td>	
                            <td class="col-sm-auto"><?=$avaliacao2->respeito2?></td>
                            <td class="col-sm-auto"><?=$avaliacao2->organizacao2?></td>
                            <td class="col-sm-auto"><?=$avaliacao2->servico2?></td>
                            <td class="col-sm-auto"><?=$avaliacao2->ds_escolar2?></td>                        
                        </tr>
                    </tbody>
    </div>
</table>


<legend>Avaliação dos Guardiões</legend>
<div class="table">
    <table class="table table-responsive">
        <thead>
                    <tr class='active'>
                        <th class="col-sm-auto" scope="col">Disciplina</th>
                        <th class="col-sm-auto" scope="col">Camaradagem</th>
                        <th class="col-sm-auto"scope="col">Iniciativa</th>
                        <th class="col-sm-auto" scope="col">Assiduidade</th>
                        <th class="col-sm-auto" scope="col">Liderança</th>
                        </tr>
                    </thead>
                    
                
                    <tbody>
                        <tr>
   
                            <td class="col-sm-auto"><?=$avaliacao2->disciplina2?></td>
                            <td class="col-sm-auto"><?=$avaliacao2->camaradagem2?></td>
                            <td class="col-sm-auto"><?=$avaliacao2->iniciativa2?></td>
                            <td class="col-sm-auto"><?=$avaliacao2->assiduidade2?></td>
                            <td class="col-sm-auto"><?=$avaliacao2->lideranca2?></td>                          
                        </tr>
                    </tbody>
    </div>
</table>


    <?php endif; ?>

        </fieldset>
  



    <script type="text/javascript" src="js/custom.js"></script>

</div>
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