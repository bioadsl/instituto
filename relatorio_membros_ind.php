<?php
require_once 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1


ini_set("display_errors", "1");
error_reporting(E_ALL);
include 'error.php';


 $arquivo ='Ficha_individual.xls'; 


 // Força o Download do Arquivo Gerado
 header ('Cache-Control: no-cache, must-revalidate');
 header ('Pragma: no-cache');
 header ('Content-Type: application/x-msexcel');
 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");


// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';


// Valida se existe um id e se ele é numérico
if (!empty($id_cliente) && is_numeric($id_cliente)):

 // Puxando dados do Banco de dados
    $conexao = conexao::getInstance();
    $sql='SELECT nome, sexo, estado_civil, conjugue, filho, filiacao, profissao, endereco, email, cpf, data_nascimento, telefone, celular, visita, observacao, batizado, status, igreja, foto FROM tab_clientes WHERE id = :id'; 
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_cliente);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ); 
    

	if(!empty($cliente)):

$data=$cliente->data_nascimento;

function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("/",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("/",$data)));
    }
}

	$data_formatada=inverteData($data);
    //echo inverteData($data);

	endif;

endif;

if(!empty($clientes)){
  $lines = <<<EOT
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/pure-min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<img src='fotos/cap50.png' alt='Casa de adoração Profética' >  
</head>
<table class="table table-reponsive">
<tr class='active'>
<tr><td colspan="18" bgcolor="#eb2f36" ><div align="center" width=800><h1><font color="ffffffff"><img src='https://fabricio4135.000webhostapp.com/cap/fotos/cap50.png' alt='Casa de adoração Profética' >Ficha individual de membros</font></h1></div></tr>
EOT;
  foreach($clientes as $cliente){
$lines .= "
<tr><td>Nome</tr><td>$cliente->nome</td>
<tr><td>Sexo</tr><td>$cliente->sexo</td>
<tr><td>Estado Civil</tr><td>$cliente->estado_civil</td>
<tr><td>Conjugue</tr><td>$cliente->conjugue</td>
<tr><td>Filhos</tr><td>$cliente->filho</td>
<tr><td>Filiacao</tr><td>$cliente->filiacao</td>
<tr><td>Profissao</tr>$cliente->profissao</td>
<tr><td>Endereco</tr><td>$cliente->endereco</td>
<tr><td>E-mail</tr><td>$cliente->email</td>
<tr><td>CPF</tr><td>$cliente->cpf</td>
<tr><td>Nascimento</tr><td>$cliente->data_nascimento</td>
<tr><td>Telefone</tr><td>$cliente->telefone</td>
<tr><td>Celular</tr><td>$cliente->celular</td>
<tr><td>Deseja Visita</tr><td>$cliente->visita</td>
<tr><td>Observacao</tr><td>$cliente->observacao</td>
<tr><td>Batizado</tr><td>$cliente->batizado</td>
<tr><td>Status</tr><td>$cliente->status</td>
<tr><td>Igreja</tr><td>$cliente->igreja</td>
</tr>";
  } 
}
$lines .= "</table>";
echo $lines;

?>


