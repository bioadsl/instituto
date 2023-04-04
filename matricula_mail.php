<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

/**/
ini_set("display_errors", "0");
error_reporting(E_ALL);




$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';
$id_matricula = (isset($_GET['id_matricula'])) ? $_GET['id_matricula'] : '';


	$conexao = conexao::getInstance();
	$sql = 'SELECT *  FROM tab_bravos WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_cliente);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

if(!empty($clientes))
foreach($clientes as $cliente){
//$cor = ($coralternada++ %2 ? "FFFFFF" : "E5E5E5");
$nome = $cliente->nome;
$data = date('d/m/Y', strtotime($cliente->dt_nascimento));
$email = $cliente->email;
$from = "bravos@bravoscap.org.br";
$to = $email;
$subject = "Matricula - {$nome}";
$message = htmlspecialchars($message);
$headers = "Content-Type: text/html; charset=iso-8859-1\r\nFrom:bravos@bravoscap.org.br\r\n";
$fonte = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\">";


$msg .= "<!DOCTYPE html> <html> <head>  <meta charset='utf-8'> <title>Acolhimento de Membros</title>
<link rel='stylesheet' href='css/pure-min.css'> <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
<link rel='stylesheet' type='text/css' href='css/custom.css'>   <link rel='stylesheet' type='text/css' href='css/tabela.css'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> <meta charset='UTF-8'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>  </head>  <body>
	<div class='container'><div class='row'><div class='col-lg-2'><img src='./fotos/logo.jpg' width='130' alt='logo BRAVOS'></div>
	<div class='col-lg-10'><h1>Matricula Turma 1- 2022</h1></div></div><hr><fieldset>
	<p>Parabéns {$nome},<br>Seja Bem vindo ao curso de Sobreviviencialismo!<br> São os votos dos BRAVOSCAP!	</p>";
	if (empty($cliente)) : 
	$msg .= "<h3 class='text-center text-danger'>Membro não encontrado!</h3>";
	else : 
	$msg = "<div class='row'><form action='action_matricula.php' method='post' id='form-contato' enctype='multipart/form-data'> <div class='col-lg-2'>
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
								<label for='nome'>Nome: ". $cliente->nome. "</label>                               
							</div>
							<div class='col-lg-2'>                                   
								<label for='sexo'>Sexo: ".  $cliente->sexo . "</label>                                   
							</div>
							<div class='col-lg-2'>
								<label for='data_nascimento'>Nascimento: ". $date1 = strtr($cliente->dt_nascimento, '/', '-');  date('d/m/Y', strtotime($date1)) . " </label>     
							</div>
							<div class='col-lg-3'>                                   
								<label for='email'>E-mail: ".  $cliente->email . "</label>       
							</div>        
					</div>
					<hr>
					 <div class='row'>           
							<div class='col-lg-2' style='padding-top: 2%;'>
								<a href='#' class='thumbnail'>
									<img src='fotos/".  $cliente->foto . "'  height='200' width='150'  id='foto-cliente'>
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
			</div>";
			 endif;  
}

mail($to, $subject, $msg, $headers);

echo "<!DOCTYPE html> <html> <head>  <meta charset='utf-8'> <title>Email</title>
<link rel='stylesheet' href='css/pure-min.css'> <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
<link rel='stylesheet' type='text/css' href='css/custom.css'>   <link rel='stylesheet' type='text/css' href='css/tabela.css'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> <meta charset='UTF-8'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>  </head>  <body>
<div class='container text-center'><div class='row'><img src='./fotos/logo.jpg' width='130' alt='logo BRAVOS'></div>
<h1>Matricula Turma 1- 2022</h1></div></div><hr><fieldset>
<h3 class='text-center'>Parabéns, $nome<br>Seja Bem vindo(a) ao curso de Sobreviviencialismo!<br> São os votos dos BRAVOSCAP!	</h3>
<h1 class='text-center text-success'>A Grade curricular foi enviada para </h1>
<h1 class='text-center text-success'>  $email com sucesso!</h1>";
echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
	
?>