<?php

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
$resultado = mysqli_query ($link,'SELECT * FROM tab_mala_direta WHERE id='.$id); 
 
  while($dados = mysqli_fetch_array($resultado))
 
 {
	$de_nome = $dados['nome'];

 /*$corpo .="SOLICITANTE : ".$solicitante."\n";
 $corpo .="TIPO DE ATIVIDADE : ".$tipo_atividade."\n";
 $corpo .="PROJETO : ".$projeto."\n"; 
 $corpo .="INICIO DO PERIODO : ".$data_solicitacao."\n";  
 $corpo .="FIM DO PERIODO : ".$data_entrega."\n";*/ 
 $corpo ="OBSERVACAO : ".$chamado."\n"; 
 

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'fabricio.4135@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', '#Q121l493');		// <-- Insira aqui a senha do seu GMail


function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 


	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
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

			if (smtpmailer('fabricio.4135@gmail.com', 'fabricio.4135@gmail.com', $de_nome, 'Solicitacao de Horas', $corpo)) {

				Header("location:consulta.php"); // Redireciona para uma página de obrigado.

			}
			if (!empty($error)) echo $error;


} 