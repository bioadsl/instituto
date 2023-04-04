<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';
$id_atendimento = (isset($_GET['id_atendimento'])) ? $_GET['id_atendimento'] : '';



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
    $conexao = conexao::getInstance();
    $sql = 'SELECT id_atendimento, atendido, conselheiro, convenio, tipo, descricao, agendamento, data, id_atendido, exame, status FROM atendimento';
    $stm = $conexao->prepare($sql);
    //$stm->bindValue(':id_atendimento', $id_atendimento);
    $stm->execute();
    $atendimento = $stm->fetch(PDO::FETCH_OBJ);


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
        <title>Prontuario de Membros</title>

    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
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
                    <h1>Prontuario</h1>
                </div>
            </div>
            <hr>
            <fieldset>

                <?php if (empty($cliente)) : ?>
                    <h3 class="text-center text-danger">Membro não encontrado!</h3>
                <?php else : ?>

    <div class="row">

                <div class="col-lg-3">
                    <a href="#" class="thumbnail">
                        <img src="fotos/<?= $cliente->foto ?>" height="190" width="150" id="foto-cliente">
                    </a>
                </div>
                    
                    
                <div class="col-lg-4">                                
                        <label for="pl-saude">Cartão SUS: <?=$cliente->carteirinha ?></label>                                
                </div>

                <div class="col-lg-5">                                
                        <label for="pl-saude">Plano de saude: <?=$cliente->pl_saude ?></label>                               
                </div>                           
                    
                <div class="col-lg-4">                               
                    <label for="nome">Nome: <?=$cliente->nome ?></label>                               
                </div>

                <div class="col-lg-5">                                   
                    <label for="email">E-mail: <?= $cliente->email ?></label>       
                </div>

                <div class="col-lg-4">                               
                        <label for="pai">Pai: <?=$cliente->pai ?></label>                               
                </div>

                <div class="col-lg-5">                               
                        <label for="mae">Mãe: <?=$cliente->mae ?></label>                               
                </div>

                <div class="col-lg-9">                               
                        <label for="endereco">Endereço: <?=$cliente->endereco ?></label>                                
                </div>
                
                <div class="col-lg-4">
                        <label for="telefone">Telefone Pais: <?= $cliente->telefone ?></label>
                </div>

                <div class="col-lg-5"> 
                        <label for="celular">Whatsapp Pais: <?= $cliente->celular ?></label>
                </div>
                
                <div class="col-lg-3">                                   
                    <label for="sexo">Sexo: <?= $cliente->sexo ?></label>                                   
                </div>

                <div class="col-lg-3">
                    <label for="data_nascimento">Nascimento: <?php $date1 = strtr($cliente->dt_nascimento, '/', '-'); ?> <?= date('d/m/Y', strtotime($date1)) ?> </label>     
                </div>

                <div class="col-lg-3">
                    <label for="tp-sanguineo">Tipo Sanguíneo: <?= $cliente->tp_sanguineo ?> </label>
                </div>

                <div class="col-lg-3">
                        <label for="peso" >Peso: <?= $cliente->peso ?></label>
                </div>
                
                <div class="col-lg-3">
                        <label for="altura" >Altura: <?= $cliente->altura ?></label>
                </div>

                <div class="col-lg-3">
                    <label for="rh">Fator RH: </label>
                </div>

                <div class="col-lg-3">
                        <label for="proximo">Parente/próximo: <?= $cliente->proximo ?></label>                                
                </div>

                <div class="col-lg-3">                               
                        <label for="tel_proximo">Telefone: <?= $cliente->tel_proximo ?></label>                               
                </div>
                
                <div class="col-lg-3">   
                        <label for="cel_promixo">Whatsapp proximo: <?= $cliente->cel_proximo ?></label>     
                </div>

                <div class="col-lg-9">
                        <label for="observacao">Em caso de emergência: <?=$cliente->observacao?> </label> 
                </div>                     
            <hr>
</div>                   
    <hr>
  
    <div class="row">
        <div style="align-items: center;">
                <h1>Historico</h1>
        </div>    
    </div>

    <?php 

    require 'connect.php';

    // Conectando com o banco de dados MYSQL 
    $link = mysqli_connect($host, $usuario, $senha) or die ("Não foi possível realizar a conexão");
    
    //Selecionando a base de dados
    mysqli_select_db($link, $banco) or die("Não foi possível realizar a seleção da base de dados");


    $query = "SELECT id_atendimento, atendido, conselheiro, convenio, tipo, descricao, agendamento, data, id_atendido, exame, status FROM atendimento WHERE
    
    id_atendido = $id_cliente";


    $result = mysqli_query($link,$query);


    while($row = mysqli_fetch_array($result)) {

    ?>

         <div class="row"> 
                <div class="col-lg-3">  
                     <label for="id">Atendimento Nº: <?=$row['id_atendimento']?> </label> 
                </div>
                
                <div class="col-lg-3">
                     <form action="editar_atendimento.php" method="post" id='form-contato' enctype='multipart/form-data'>
                        </button>  
                            <a href='editar_atendimento.php?id=<?=$row['id_atendido']?>&id_atendimento=<?=$row['id_atendimento']?>' class="btn btn-warning btn-sm">Editar atendimento</a>
                            <input type="hidden" name="id_atendimento" value="<?=$row['id_atendimento']?>">
                        </button>
                     </form>

                </div> 
                <div class="col-lg-3">                        
                    <label for="tipo">Tipo: <?=$row['tipo']?> </label> 
                </div>
                <div class="col-lg-3">
                    <label for="data">Data: <?=$row['data']?> </label>       
                </div>
        </div>           
   
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="convenio">Convenio: <?=$row['convenio']?> </label>
                        </div>
            
                        <div class="col-lg-3">   
                            
                            <?php $agendamento_ordenado = $row['agendamento'];?>
                            <label for="agendamento">Agendamento: <?=date('d/m/Y', strtotime($agendamento_ordenado))?></label>                                           
                        </div>
                
                        <div class="col-lg-3">
                            <label for="conselheiro">Conselheiro: <?=$row['conselheiro']?> </label>
                        </div>                       

                        <div class="col-lg-12">
                            <label for="descricao">Descricao: <?=$row['descricao']?></label>
                        </div>                 
                    </div>   
                  
                    <hr>
                         
        <?php   } ?>        
                          
                    <br><br>
                            <div class="row">
                                <div class="col-4">
                                
                                    <a href="index.php?pagina=consulta_atendimento" class='btn btn-danger'>Voltar</a>
                                </div>
                            </div>
   
        <?php endif; ?>

    <?php endif; ?>

    </fieldset>
    </div>

</div>   

<script type="text/javascript" src="js/custom.js"></script>

    </body>

</html>
