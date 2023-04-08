<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
		error_reporting(0);
		ini_set(“display_errors”, 0 );
/*
ini_set("display_errors", "1");
error_reporting(E_ALL);
include 'error.php';
*/
    $hoje =date('m/d');
    $hoje2 =date('m-d');
	$conexao = conexao::getInstance();
	$sql = "SELECT id, nome, email, dt_nascimento FROM tab_instituto WHERE dt_nascimento like'%{$hoje}' or '%{$hoje2}'order by 2";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);
if(!empty($clientes))
foreach($clientes as $cliente){
//$cor = ($coralternada++ %2 ? "FFFFFF" : "E5E5E5");
$nome = $cliente->nome;
$data = date('d/m/Y', strtotime($cliente->dt_nascimento));
$email = $cliente->email;
$from = "bravoscap@gmail.com";
$to = $email;
$subject = "Feliz Aniversário - {$nome}";
$message = htmlspecialchars($message);
$headers = "Content-Type: text/html; charset=iso-8859-1\r\nFrom:capsamambaia@gmail.com\r\n";
$fonte = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\">";
$msg = "Parabéns {$nome},<br>Feliz Aniversário!<br> São os votos dos BRAVOSCAP!";
mail($to, $subject, $msg, $headers);
echo "$nome<br>";
echo "$email<br>";
echo "$hoje<br>";
}
echo "A mensagem de e-mail foi enviada.";
