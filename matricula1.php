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
    $sql = 'SELECT id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, senha, id_atendimento  FROM tab_bravos WHERE id = :id';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_cliente);
    $stm->execute();
    $cliente = $stm->fetch(PDO::FETCH_OBJ);

            // Captura os dados do atendimento solicitado
            $conexao1 = conexao::getInstance();
            $sql1 = 'SELECT * FROM tb_matricula ';
            $stm = $conexao1->prepare($sql1);
           // $stm->bindValue(':id_atendimento', $id_atendimento);
            $stm->execute();
            $registro = $stm->fetch(PDO::FETCH_OBJ);



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

    <div align="right">
        <p>Bem Vindo(a), <?= $dados['nome'] ?> <a href="logout.php">! &nbsp; Sair &nbsp;</a> </p>
    </div>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Acolhimento de Membros</title>

    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/tabela.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>

    <body>
        <div class='container'>

                    <div class="row">
                        <div class="col-lg-2">
                            <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS'>
                        </div>
                        <div class="col-lg-10">
                            <h1>Matricula Turma 1- 2022</h1>
                        </div>
                    </div>
                    <hr>
                    <fieldset>

                <?php if (empty($cliente)) : ?>
                    <h3 class="text-center text-danger">Membro não encontrado!</h3>
                <?php else : ?>

                <div class="row">
                <form action="action_matricula.php" method="post" id='form-contato' enctype='multipart/form-data'>
                    <div class="col-lg-2">
                        <div class="form-group">     
                            <label for="turma">Turma: </label>
                            <input type="text" class="form-control" id="turma" name="turma"
                            placeholder="Informe a turma" value="<?php echo '1-'.date('Y');?>" disabled>
                            <span class='msg-erro msg-turma'></span>
                        </div>
                    </div>
            

                    <div class="col-lg-2">
                        <div class="form-group">     
                            <label for="cod_matricula">Matricula: </label>
                            <input type="text" class="form-control" id="cod_matricula" name="cod_matricula"
                            placeholder="Informe a matricula" value="<?php echo date('dmyhis');?>" disabled>
                            <span class='msg-erro msg-cod_matricula'></span>
                        </div>
                    </div>
                
                </div>
                <div class="row">
                
                    
                    
                                <div class="col-lg-4">                               
                                    <label for="nome">Nome: <?=$cliente->nome ?></label>                               
                                </div>
                                
                                <div class="col-lg-2">                                   
                                    <label for="sexo">Sexo: <?= $cliente->sexo ?></label>                                   
                                </div>
                                
                                <div class="col-lg-2">
                                    <label for="data_nascimento">Nascimento: <?php $date1 = strtr($cliente->dt_nascimento, '/', '-'); ?> <?= date('d/m/Y', strtotime($date1)) ?> </label>     
                                </div>
                               
                                <div class="col-lg-3">                                   
                                    <label for="email">E-mail: <?= $cliente->email ?></label>       
                                </div>        
                                
                        </div>
                        <hr>
                         <div class="row">          
                                
                                <div class="col-lg-2" style="padding-top: 2%;">
                                    <a href="#" class="thumbnail">
                                        <img src="fotos/<?= $cliente->foto ?>"  height="200" width="150"  id="foto-cliente">
                                    </a>
                                </div>


                                <div class="tg-wrap" >
                                    <table class="tg">

                                            <thead>
                                                <tr>
                                                    <th class="tg-cey4"><span style="font-weight:bold">1º Semestre</span></th>
                                                    <th class="tg-l93j" colspan="5">Nome da disciplina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                    <td class="tg-0pky"><span style="font-weight:bold">1º Bimestre</span></td>
                                                    <td class="tg-6hwt">Ordem Unida 1</td>
                                                    <td class="tg-6hwt">Habilidades Manuais 1</td>
                                                    <td class="tg-6hwt">Treinamento Físico 1</td>
                                                    <td class="tg-6hwt">Primeiros Socorros 1</td>
                                                    <td class="tg-6hwt">Prevenção de Acidentes 1</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="tg-0pky"><span style="font-weight:bold">2º Bimestre</span></td>
                                                    <td class="tg-6hwt">Civismo 1</td>
                                                    <td class="tg-6hwt">Nós e Amarrações 1</td>
                                                    <td class="tg-6hwt">Xadrez 1</td>
                                                    <td class="tg-6hwt">Sobrevivência 1</td>
                                                    <td class="tg-6hwt">Orientação 1</td>
                                                </tr>

                                            </tbody>
                                    </table>
                                </div>

                                <div class="tg-wrap" >
                                    <table class="tg">

                                            <thead>
                                                <tr>
                                                    <th class="tg-cey4"><span style="font-weight:bold">2º Semestre</span></th>
                                                    <th class="tg-l93j" colspan="5">Nome da disciplina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>

                                                <tr>
                                                    <td class="tg-0pky"><span style="font-weight:bold">3º Bimestre</span></td>
                                                    <td class="tg-6hwt">Ordem Unida 2</td>
                                                    <td class="tg-6hwt">Habilidades Manuais 2</td>
                                                    <td class="tg-6hwt">Treinamento Físico 2</td>
                                                    <td class="tg-6hwt">Primeiros Socorros 2</td>
                                                    <td class="tg-6hwt">Prevenção de Acidentes 2</td>
                                                </tr>

                                                <tr>
                                                    <td class="tg-0pky"><span style="font-weight:bold">4º Bimestre</span></td>
                                                    <td class="tg-6hwt">Civismo 2</td>
                                                    <td class="tg-6hwt">Nós e Amarrações 2</td>
                                                    <td class="tg-6hwt">Xadrez 2</td>
                                                    <td class="tg-6hwt">Sobrevivência 2</td>
                                                    <td class="tg-6hwt">Orientação 2</td>
                                                </tr>

                                            </tbody>
                                    </table>
                                </div>

                </div>
                 

            <div class="row">
                    <div class="col-4" style="padding-top: 5%;">
                        <input type="hidden" name="acao" value="efetuar_matricula_semestre_1">
                        <input type="hidden" name="status" value="Matriculado">
                        <input type="hidden" name="id_bravo" value="<?=$cliente->id?>">
                        <input type="hidden" name="cod_matricula"  value="<?php echo date('yhmi');?>">
                        <input type="hidden" name="nome" value="<?=$cliente->nome?>">
                        <input type="hidden" name="data" value="<?=date('d/m/y');?>">
                        <input type="hidden" name="turma" value="<?php echo '1-'.date('Y');?>">
                    <div>
 
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary" id='botao'>
                            Efetuar Matricula
                        </button>
                        <a href='index.php?pagina=consulta' class="btn btn-danger">voltar</a>
                    </div>

                </div>
            </div>

            </form>


        <?php endif; ?>

    <?php endif; ?>


    </fieldset>
    </div>

</div>   



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