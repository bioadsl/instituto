<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

 $mes =date('m');
 $dia =date('d');

echo "<h1>Aniversariantes do Mes $mes</h1>";

	$conexao = conexao::getInstance();
	$sql = "SELECT distinct id, nome, email, dt_nascimento FROM tab_bravos WHERE MONTH(dt_nascimento) ='$mes'order by 2";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

if(!empty($clientes))
foreach($clientes as $cliente){
//$cor = ($coralternada++ %2 ? "FFFFFF" : "E5E5E5");
$nome = $cliente->nome;
$data = date('d/m/Y', strtotime($cliente->dt_nascimento));
$email = $cliente->email;
$from = "capsamambaia@gmail.com";
$to = "capsamambaia@gmail.com";
$subject = "Aniversariantes do Mes";
$message = htmlspecialchars($message);
$headers = "Content-Type: text/html; charset=iso-8859-1\r\nFrom:capsamambaia@gmail.com\r\n";
$fonte = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\">";
$msg = "Parabéns meus irmã(os),<br>Feliz Aniversário!<br> São os votos BRAVOSCAP!'<br> Nome: $nome<br> Email: $email<br> Aniversário: $data<br>";
mail($to, $subject, $msg, $headers);
echo "<br>";
echo "Nome: $nome<br>";
echo "Email: $email<br>";
echo "Aniversário: $data<br>";
//echo "----------------------------------------------------------------<br>";
}

echo "<br>";
echo "<br>";
echo "<form class='form-horizontal'>";
echo "<button  class='btn btn-danger btn-sm' onClick='history.go(-1)'>Voltar </button>";
echo "</form>";
