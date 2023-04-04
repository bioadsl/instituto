<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "1");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';
$id_atendimento = (isset($_GET['id_atendimento'])) ? $_GET['id_atendimento'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_cliente) && is_numeric($id_cliente) && !empty($id_atendimento) && is_numeric($id_atendimento)) :

    // Captura os dados do cliente solicitado
    $conexao = conexao::getInstance();
    $sql = 'SELECT id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, senha, id_atendimento  FROM tab_bravos WHERE id = :id';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_cliente);
    $stm->execute();
    $cliente = $stm->fetch(PDO::FETCH_OBJ);

            // Captura os dados do atendimento solicitado
            $conexao = conexao::getInstance();
            $sql = 'SELECT  id_atendimento, atendido, conselheiro, convenio, tipo, descricao, agendamento, data, id_atendido, exame, status, descricao FROM atendimento where id_atendimento=:id_atendimento ';
            $stm = $conexao->prepare($sql);
            //$stm->bindValue(':id_atendido', $id_cliente);
            $stm->bindValue(':id_atendimento', $id_atendimento);
            $stm->execute();
            $atendimento = $stm->fetch(PDO::FETCH_OBJ);


            

            
            // // Captura os dados do atendimento convenio
            // $conexao2 = conexao::getInstance();
            // $sql2 = 'SELECT id, parceiro FROM convenio';
            // $stm = $conexao2->prepare($sql2);
            // //$stm->bindValue(':id', $id_convenio);
            // $stm->execute();
            // $convenio = $stm->fetch(PDO::FETCH_OBJ);


            // // Captura os dados do atendimento aconcelhamento
            // $conexao3 = conexao::getInstance();
            // $sql3 = ' SELECT id, conselheiro, tipo, encaminhamento, descricao FROM aconcelhamento WHERE id = :id';
            // $stm = $conexao3->prepare($sql3);
            // $stm->bindValue(':id', $id_aconcelhamento);
            // $stm->execute();
            // $aconcelhamento = $stm->fetch(PDO::FETCH_OBJ);


            // // Captura os dados do atendimento aconcelhamento
            // $conexao4 = conexao::getInstance();
            // $sql4 = ' SELECT id, psicologo, atendido, encaminhamento, exame, descricao FROM psicologia id = :id';
            // $stm = $conexao4->prepare($sql3);
            // $stm->bindValue(':id', $id_psicologia);
            // $stm->execute();
            // $psicologia = $stm->fetch(PDO::FETCH_OBJ);




            //  // Captura os dados do conselheiros
            //  $conexao5 = conexao::getInstance();
            //  $sql5 = 'SELECT id, nome FROM conselheiro';
            //  $stm = $conexao5->prepare($sql5);
            //  //$stm->bindValue(':id', $id_convenio);
            //  $stm->execute();
            //  $conselheiro = $stm->fetch(PDO::FETCH_OBJ);
            


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
        <title>Atendimento de Membros</title>

    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
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
                    <h1>Atendimento <?=$id_atendimento?></h1>
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
  
  
  <form action="action_atendimento.php" method="post" id='form-contato' enctype='multipart/form-data'>
  
            <div class="row">
                  <div class="col-lg-4">
                              <label for="convenio">Convênio </label>
                              <select class="form-control" id="convenio" name="convenio">
                                  <option value="<?=$atendimento->convenio?>"><?=$atendimento->convenio?></option> 
                                  <option value="">Selecione o Convenio</option>
                                  <option value="CAP-SAMAMBAIA">CAP-SAMAMBAIA</option> 
                                  <option value="CAP-SAD">CAP-SAD</option>   
                                  <option value="ELIM">ELIM</option>   
                                  <option value="CASA DO PAI">CASA DO PAI</option>   
                                  <option value="VIDA NO ALTAR">VIDA NO ALTAR</option>     
                              </select>
                              <span class='msg-erro msg-convenio'></span>
                          </div>
             
                          <div class="col-lg-4">
                              <div class="form-group">
                                  <label for="agendamento">Agendamento</label>
                                  <input type="date" class="form-control" id="agendamento" maxlength="10" value="<?=$atendimento->agendamento?>" name="agendamento">
                                  <span class='msg-erro msg-data'></span>
                              </div>
                          </div>
                         

                          <div class="col-lg-4">
                              <label for="tipo">Tipo </label>
                              <select class="form-control" id="tipo" name="tipo">
                                  <option value="<?=$atendimento->tipo?>"><?=$atendimento->tipo?></option> 
                                  <option value="">Selecione o Tipo</option>
                                  <option value="Acolhimento">Acolhimento</option>
                                  <option value="Aconselhamento">Aconselhamento</option>
                                  <option value="Intersecao">Interseção</option>
                                  <option value="Libertacao">Libertação</option>
                                  <option value="Psicologia">Psicologia</option>
                              </select>
                              <span class='msg-erro msg-conselheiro'></span>
                          </div> 


                          </div>  
  
          <div class="row">

                          <div class="col-lg-4">
                              <label for="conselheiro">Especialista </label>
                              <select class="form-control" id="conselheiro" name="conselheiro">
                                  <option value="<?=$atendimento->conselheiro?>"><?=$atendimento->conselheiro?></option>     
                                  <option value="">Selecione o Especialista</option>
                                  <option value="Emanuelle Rodrigues">Emanuelle Rodrigues</option>
                                  <option value="Pr Markin">Pr Markin</option>
                                  <option value="Pra Nazinha">Pra Nazinha</option>
                                  <option value="Pr Aylon">Pr Aylon</option>
                                  <option value="Pra Fernanda">Pra Fernanda</option>
                                  <option value="Prs Markin e Nazinha">Prs Markin e Nazinha</option>
                                  <option value="Prs Aylon e Fernanda">Prs Aylon e Fernanda</option>                                            
                              </select>
                              <span class='msg-erro msg-conselheiro'></span>
                          </div>


                          <div class="col-lg-4">
                              <label for="exame">Exames </label>
                              <select class="form-control" id="exame" name="exame">
                                  <option value="<?=$atendimento->exame?>"><?=$atendimento->exame?></option>
                                  <option value="">Selecione o exame</option>
                                  <option value="Hemograma completo">Hemograma completo</option>
                                  <option value="Tomografias">Tomografias</option>
                                  <option value="Ressonancia">Ressonancia</option>
                                  <option value="DST - Teste de Supressão da Dexametasona">DST - Teste de Supressão da Dexametasona</option>                                          
                              </select>
                              <span class='msg-erro msg-exame'></span>
                          </div>


                          <div class="col-lg-4">
                              <label for="status">Status </label>
                              <select class="form-control" id="tipo" name="status">
                                  <option value="<?=$atendimento->status?>"><?=$atendimento->status?></option>
                                  <option value="">Selecione o Status</option>                                                
                                  <option value="Agendado">Agendado</option>
                                  <option value="Aguardando Atendimento">Aguardando Atendimento</option>
                                  <option value="Em Atendimento">Em Atendimento</option>
                                  <option value="Acompanhamento">Acompanhamento</option>
                                  <option value="Retorno">Retorno</option>
                                  <option value="Cancelado">Cancelado</option>
                                  <option value="Desistencia">Desistencia</option>
                                  <option value="Finalizado">Finalizado</option>
                              </select>
                              <span class='msg-erro msg-status'></span>
                          </div>

                  </div>   
    
    
              <div class="row">
                          <div class="col-lg-12">
                          <label for="descricao">Descrição</label>
                           <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="<?=$atendimento->descricao?>"></textarea>
                       <span class='msg-erro msg-descricao'></span>
                   </div>
              </div>    
                
                  
        <br><br>
        <div class="row">
            <div class="col-4">
                <input type="hidden" name="acao" value="editar_atendimento">
                <input type="hidden" name="id" value="<?=$cliente->id?>">
                <input type="hidden" name="id_atendido" value="<?=$cliente->id?>">
                <input type="hidden" name="atendido" value="<?=$cliente->nome?>">
                <input type="hidden" name="id_atendimento" value="<?=$atendimento->id_atendimento?>">
                <input type="hidden" name="data" value="<?=date('d/m/y');?>">


                <div class="col-4">
                    <button type="submit" class="btn btn-primary" id='botao'>
                        Gravar
                    </button>
                    <a href='editar.php?id=<?=$cliente->id?>' class="btn btn-warning">Editar cadastro</a>
                    <a href='index.php?pagina=consulta_atendimento' class="btn btn-danger">voltar</a>
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

<script>
    //validação de confirmação de senha
    var senha = document.getElementById("senha"),
        confirmacao = document.getElementById("confirmacao");

    function validatePassword() {

        if (senha.value != confirmacao.value) {
            alert("Senhas diferentes!");
            confirmacao.value = "";
            senha.value = "";
            senha.focus();
            return false;
        }
    }
</script>


    </body>
    <!--Rodapé da Pagina-->
    <div id="footer" padding="20">
        <hr>
        <div id="" align="center">
            <address id="Administração-CAP-copyright">
                <address id="version">
                    <p> Powered by <a href="http://casadeadoracaoprofetica.com.br" title="Sistema de gerenciamento Administrativo"> CAP &reg; - </a> Ministério de Tecnologia CAP
                        2018
                    <address id="webmaster-contact-information"> Contato dos <a href="mailto:fabricio.4135@gmail.com.br" title="Entre em contato com o webmaster via e-mail."> Desenvolvedores </a> para sugestões
                    </address>
                    </p></a>
        </div>
    </div>

    </html>