<?php
require_once 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

/*
ini_set("display_errors", "1");
error_reporting(E_ALL);
include 'error.php';
*/

 $arquivo ='Relatório_membros.xls'; 


 // Força o Download do Arquivo Gerado
 header ('Cache-Control: no-cache, must-revalidate');
 header ('Pragma: no-cache');
 header ('Content-Type: application/x-msexcel');
 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");



 // Puxando dados do Banco de dados

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, foto, nome, sexo, estado_civil, conjugue, filho, filiacao, profissao, endereco, email, cpf, data_nascimento, telefone, celular, visita, observacao, batizado, status, igreja, foto  FROM tab_clientes';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

if(!empty($clientes)){
  $lines = <<<EOT

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/pure-min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<img src='fotos/cap50.png' alt='Casa de adoração Profética' >  
</head>
<table class="table table-striped">
<tr class='active'>
<tr><td colspan="18" bgcolor="#eb2f36" ><div align="center" width=800><h1><font color="ffffffff"><img src='fotos/cap50.png' alt='Casa de adoração Profética' > Relatorio de membros</font></h1></div></tr>
<th>Nome</th>
<th>Sexo</th>
<th>Estado Civil</th>
<th>Conjugue</th>
<th>Filhos</th>
<th>Filiacao</th>
<th>Profissao</th>
<th>Endereco</th>
<th>E-mail</th>
<th>CPF</th>
<th>Nascimento</th>
<th>Telefone</th>
<th>Celular</th>
<th>Deseja Visita</th>
<th>Observacao</th>
<th>Batizado</th>
<th>Status</th>
<th>Igreja</th>
</tr>
EOT;
  foreach($clientes as $cliente){
$lines .= "
	<tr>
	<td>$cliente->nome</td>
	<td>$cliente->sexo</td>
	<td>$cliente->estado_civil</td>
	<td>$cliente->conjugue</td>
	<td>$cliente->filho</td>
	<td>$cliente->filiacao</td>
	<td>$cliente->profissao</td>
	<td>$cliente->endereco</td>
	<td>$cliente->email</td>
	<td>$cliente->cpf</td>
	<td>$cliente->data_nascimento</td>
	<td>$cliente->telefone</td>
	<td>$cliente->celular</td>
	<td>$cliente->visita</td>
	<td>$cliente->observacao</td>
	<td>$cliente->batizado</td>
	<td>$cliente->status</td>
	<td>$cliente->igreja</td>
	</tr>";
	
  } 
}else{
  $lines .= "
<h3 class='text-center text-primary'>Não existem Membros cadastrados!</h3>
</table>
";	
} 
echo $lines;