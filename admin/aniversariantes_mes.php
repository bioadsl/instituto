<?php
// require 'conexao.php';

// //Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
// ini_set("display_errors", "0");
// error_reporting(E_ALL);
// //include 'error.php';

//  $mes =date('m');
//  $dia =date('d');

// echo "<h1>Aniversariantes do Mes $mes</h1>";

// 	$conexao = conexao::getInstance();
// 	//$sql = "SELECT distinct id, nome, email, dt_nascimento FROM tab_bravos WHERE MONTH(dt_nascimento) ='$mes'order by 2";
// 	$sql = "SELECT * FROM `tab_bravos` WHERE dt_nascimento like '%/$mes/%' or dt_nascimento like '%-$mes-%' order by 2";
// 	$stm = $conexao->prepare($sql);
// 	$stm->execute();
// 	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

// if(!empty($clientes))
// foreach($clientes as $cliente){
// //$cor = ($coralternada++ %2 ? "FFFFFF" : "E5E5E5");
// $nome = $cliente->nome;
// $data = date('d/m/Y', strtotime($cliente->dt_nascimento));
// $email = $cliente->email;
// $from = "capsamambaia@gmail.com";
// $to = "capsamambaia@gmail.com";
// $subject = "Aniversariantes do Mes";
// $message = htmlspecialchars($message);
// $headers = "Content-Type: text/html; charset=iso-8859-1\r\nFrom:capsamambaia@gmail.com\r\n";
// $fonte = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\">";
// $msg = "Parabéns meus irmã(os),<br>Feliz Aniversário!<br> São os votos BRAVOSCAP!'<br> Nome: $nome<br> Email: $email<br> Aniversário: $data<br>";
// mail($to, $subject, $msg, $headers);
// echo "<br>";
// echo "Nome: $nome<br>";
// echo "Email: $email<br>";
// echo "Aniversário: $data<br>";
// //echo "----------------------------------------------------------------<br>";
// }

// echo "<br>";
// echo "<br>";
// echo "<form class='form-horizontal'>";
// echo "<button  class='btn btn-danger btn-sm' onClick='history.go(-1)'>Voltar </button>";
// echo "</form>"


////////////////////////////////////////////////////////////////////////////////
?>

<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
ini_set("display_errors", "1");
error_reporting(E_ALL);
//include 'error.php';
include 'menu.php';
	$mes_numerico =date('m');
	$numero_dia = date('w')*1;
    $dia_mes = date('d');
    $numero_mes = date('m')*1;
    $ano = date('Y');
    $dia = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
	$hoje = $dia[$numero_dia] . ", " .$dia_mes . " de " . $mes[$numero_mes] . " de " . $ano . ".";


echo "<div align='center' style='padding-top: 4%;'><h2>Aniversariantes do Mes de $mes[$numero_mes] </h2></div>";
echo "<div align='center' style='padding-top: 4%;'><h5>$hoje</h5></div>";


$conexao = conexao::getInstance();
$sql = "SELECT id, foto, nome, email, celular, dt_nascimento FROM tab_instituto WHERE dt_nascimento like '%/$mes_numerico/%' or dt_nascimento like '%-$mes_numerico-%' order by 2";
$stm = $conexao->prepare($sql);
$stm->execute();
$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

if (!empty($clientes))
	foreach ($clientes as $cliente) {
		//$cor = ($coralternada++ %2 ? "FFFFFF" : "E5E5E5");
		$nome = $cliente->nome;
		$data = date('d/m/Y', strtotime($cliente->dt_nascimento));
		$email = $cliente->email;
		// $from = "fabricio.4135@gmail.com";
		// $to = "bravoscap@gmail.com";
		// $subject = "Aniversariantes do Mes";
		// $message = htmlspecialchars($message);
		// $headers = "Content-Type: text/html; charset=iso-8859-1\r\nFrom:fabricio.4135@gmail.com\r\n";
		// $fonte = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\">";
		// $msg = "<img data-emoji='🎂' class='an1' alt='🎂' aria-label='🎂' src='https://fonts.gstatic.com/s/e/notoemoji/15.0/1f382/32.png' loading='lazy'> Parabéns minha irmã,<br>Feliz Aniversário!<br> São os votos das AMADAS DO PAI!'<br> Nome: $nome<br> Email: $email<br> Aniversário: $data<br>";
		// mail($to, $subject, $msg, $headers);
		echo "<br>";
		// echo "Nome: $nome<br>";
		// echo "Email: $email<br>";
		// echo "Aniversário: $data<br>";
		echo "
		<!DOCTYPE html>
		<html>
		<head>
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
		<style>
		.center {
		  margin: auto;
		  width: 60%;
		  padding: 10px;
		}
		</style>		
		</head>
		<div class='center card mb-3' style='max-width: 700px;'>
  <div class='row no-gutters'>
    <div class='col-md-4'>
      <img src='fotos/$cliente->foto' class='card-img' alt='foto'>
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h5 class='card-title'><img data-emoji='🎂' class='an1' alt='🎂' aria-label='🎂' src='https://fonts.gstatic.com/s/e/notoemoji/15.0/1f382/32.png' loading='lazy'> $nome</h5>
        <p class='card-text'>$data </p>
		<p class='card-text'> $cliente->celular</p>
        <p class='card-text'><small class='text-muted'>$email</small></p>
      </div>
    </div>
  </div>
</div>";
	}

echo "<br>";
echo "<br>";
echo "<div class='center' style='max-width: 540px;'> <div class='row'>";
echo "<div class='col-sm-4'>";
echo "<form class='form-horizontal'>";
echo "<button  class='btn btn-danger btn-lg' onClick='history.go(-1)'>Voltar </button>";
echo "<form class='form-horizontal'>";
echo "</div>";
echo "<div class='col-sm-4'>";
echo "<a href='index.php?pagina=consulta'><button type='button' class='btn btn-info btn-lg'>Consulta</button></a>";
echo "</div>";
echo "<div class='col-sm-4>";
echo "<a href='home.php'><button type='button' class='btn btn-success btn-lg'>Home</button></a>";
echo "</div>";
echo "</div>";
echo "</form>";
echo "</div>";
