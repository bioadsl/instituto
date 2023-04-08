<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);
//include 'error.php';

require 'conexao.php';

// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';
$id_matricula = (isset($_GET['id_matricula'])) ? $_GET['id_matricula'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_cliente) && is_numeric($id_cliente)) :

    // Captura os dados do cliente solicitado
    $conexao = conexao::getInstance();
    $sql = 'SELECT id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, senha, id_atendimento  FROM tab_instituto WHERE id = :id';
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




/*$solicitante = 'teste'; //$_POST['solicitante'];
$tipo_atividade  = '; // $_POST['tipo_atividade']; 
$projeto  = '; //$_POST['projeto']; 
$data_solicitacao  = $_POST['data_solicitacao'];
$data_entrega  = $_POST['data_entrega'];
$observacao  = $_POST['observacao'];*/
$chamado = 'Solicitacao de Horas';

ini_set('memory_limit', '256M');
require'conexaoExcel.php';

// Recebe o id do cliente do cliente via GET
$id =1;
//(isset($_GET['id'])) ? $_GET['id'] : '';

 // Puxando tipo de artefato do Banco de dados
// $tipo_art = mysql_query ('SELECT tipo FROM tb_clientes WHERE id='.$id); 
 
 // Nome do Arquivo do Excel que será gerado
 //$tipo = mysql_fetch_array($tipo_art);
 //$arquivo = $tipo['tipo'];
 //$arquivo .='teste.xls'; 

 // Puxando dados do Banco de dados
$resultado = mysqli_query ($link,'SELECT * FROM tab_instituto WHERE id='.$id); 
 
  while($dados = mysqli_fetch_array($resultado))
 
 {
	$de_nome = $dados['nome'];

 $corpo ="<!DOCTYPE html> <html> <head>  <meta charset='utf-8'> <title>Acolhimento de Membros</title>
    <link rel='stylesheet' href='css/pure-min.css'> <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' href='css/custom.css'>   <link rel='stylesheet' type='text/css' href='css/tabela.css'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> <meta charset='UTF-8'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>  </head>  <body>
        <div class='container'><div class='row'><div class='col-lg-2'><img src='./fotos/logo.jpg' width='130' alt='logo BRAVOS'></div>
		<div class='col-lg-10'><h1>Matricula Turma 1- 2022</h1></div></div><hr><fieldset><?php if (empty($cliente)) : ?><h3 class='text-center text-danger'>Membro não encontrado!</h3><?php else : ?>
                <div class='row'><form action='action_matricula.php' method='post' id='form-contato' enctype='multipart/form-data'> <div class='col-lg-2'>
                        <div class='form-group'>     
                            <label for='turma'>Turma: </label>
                            <input type='text' class='form-control' id='turma' name='turma'
                            placeholder='Informe a turma' value='<?php echo '1-'.date('Y');?>' disabled>
                            <span class='msg-erro msg-turma'></span>
                        </div>
                    </div>
                    <div class='col-lg-2'>
                        <div class='form-group'>     
                            <label for='cod_matricula'>Matricula: </label>
                            <input type='text' class='form-control' id='cod_matricula' name='cod_matricula'
                            placeholder='Informe a matricula' value='<?php echo date('dmyhis');?>' disabled>
                            <span class='msg-erro msg-cod_matricula'></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                                <div class='col-lg-4'>                               
                                    <label for='nome'>Nome: <?=$cliente->nome ?></label>                               
                                </div>
                                <div class='col-lg-2'>                                   
                                    <label for='sexo'>Sexo: <?= $cliente->sexo ?></label>                                   
                                </div>
                                <div class='col-lg-2'>
                                    <label for='data_nascimento'>Nascimento: <?php $date1 = strtr($cliente->dt_nascimento, '/', '-'); ?> <?= date('d/m/Y', strtotime($date1)) ?> </label>     
                                </div>
                                <div class='col-lg-3'>                                   
                                    <label for='email'>E-mail: <?= $cliente->email ?></label>       
                                </div>        
                        </div>
                        <hr>
                         <div class='row'>           
                                <div class='col-lg-2' style='padding-top: 2%;'>
                                    <a href='#' class='thumbnail'>
                                        <img src='fotos/<?= $cliente->foto ?>'  height='200' width='150'  id='foto-cliente'>
                                    </a>
                                </div>
                                <div class='tg-wrap' >
                                    <table class='tg'>
                                            <thead>
                                                <tr>
                                                    <th class='tg-cey4'><span style='font-weight:bold'>1º Semestre</span></th>
                                                    <th class='tg-l93j' colspan='5'>Nome da disciplina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                    <td class='tg-0pky'><span style='font-weight:bold'>1º Bimestre</span></td>
                                                    <td class='tg-6hwt'>Ordem Unida 1</td>
                                                    <td class='tg-6hwt'>Habilidades Manuais 1</td>
                                                    <td class='tg-6hwt'>Treinamento Físico 1</td>
                                                    <td class='tg-6hwt'>Primeiros Socorros 1</td>
                                                    <td class='tg-6hwt'>Prevenção de Acidentes 1</td>
                                                </tr>
                                                <tr>
                                                    <td class='tg-0pky'><span style='font-weight:bold'>2º Bimestre</span></td>
                                                    <td class='tg-6hwt'>Civismo 1</td>
                                                    <td class='tg-6hwt'>Nós e Amarrações 1</td>
                                                    <td class='tg-6hwt'>Xadrez 1</td>
                                                    <td class='tg-6hwt'>Sobrevivência 1</td>
                                                    <td class='tg-6hwt'>Orientação 1</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                                <div class='tg-wrap' >
                                    <table class='tg'>
                                            <thead>
                                                <tr>
                                                    <th class='tg-cey4'><span style='font-weight:bold'>2º Semestre</span></th>
                                                    <th class='tg-l93j' colspan='5'>Nome da disciplina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <tr>
                                                    <td class='tg-0pky'><span style='font-weight:bold'>3º Bimestre</span></td>
                                                    <td class='tg-6hwt'>Ordem Unida 2</td>
                                                    <td class='tg-6hwt'>Habilidades Manuais 2</td>
                                                    <td class='tg-6hwt'>Treinamento Físico 2</td>
                                                    <td class='tg-6hwt'>Primeiros Socorros 2</td>
                                                    <td class='tg-6hwt'>Prevenção de Acidentes 2</td>
                                                </tr>
                                                <tr>
                                                    <td class='tg-0pky'><span style='font-weight:bold'>4º Bimestre</span></td>
                                                    <td class='tg-6hwt'>Civismo 2</td>
                                                    <td class='tg-6hwt'>Nós e Amarrações 2</td>
                                                    <td class='tg-6hwt'>Xadrez 2</td>
                                                    <td class='tg-6hwt'>Sobrevivência 2</td>
                                                    <td class='tg-6hwt'>Orientação 2</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div>
                </div>
				<?php endif; ?>
				<?php endif; ?>
 ";

		}	

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'fabricio.4135@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', '#Q121l493');		// <-- Insira aqui a senha do seu GMail


function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 


				global $error;
				$mail = new PHPMailer();
				$mail->IsSMTP();		// Ativar SMTP
				$mail->SMTPDebug = 1;	// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
				$mail->Debugoutput = 'html';
				$mail->SMTPAuth = true;		// Autenticação ativada
				$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
				$mail->Host = "smtp.gmail.com";	// SMTP utilizado
				$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
				$mail->Username = GUSER;
				$mail->Password = GPWD;
				$mail->SetFrom($de, $de_nome);
				$mail->Subject = $assunto;
				$mail->Body = $corpo;
				$mail->AddAddress($para);
				if(!$mail->Send()) {
										$error = 'Mail error: '.$mail->ErrorInfo; 
										return false;
										} else {
															
											$error = 'Mensagem enviada!';
											return true;
										}
									}

			// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
			//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

			if (smtpmailer('fabricio.4135@gmail.com', 'fabricio.4135@gmail.com', $de_nome, 'Matricula', $corpo)) {

				Header("location:consulta.php"); // Redireciona para uma página de obrigado.

			}
			
			if (!empty($error)){ echo $error; }
		