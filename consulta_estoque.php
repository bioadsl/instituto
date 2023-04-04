<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
/*include 'error.php';
*/

// Recebe o termo de pesquisa se existir
$termo = (isset($_POST['termo'])) ? $_POST['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)) :


	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct *  FROM tb_estoque ';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

	//echo "<pre>", print_r($clientes, 1), "</pre>";

	$conexao = conexao::getInstance();
	$sql = 'SELECT  count(nome_produto) as total_registros from tb_estoque';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_registros', $total_registros);
	$total = $stm->fetchAll(PDO::FETCH_OBJ);
/*
    $conexao = conexao::getInstance();
	$sql = "SELECT count(status) as total_ativo from tab_bravos WHERE status like'%Ativo%' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_ativo', $total_ativo);
	$total_a = $stm->fetchAll(PDO::FETCH_OBJ);

    $conexao = conexao::getInstance();
	$sql = "SELECT count(status) as total_inativo from tab_bravos WHERE status like '%inativo%' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_inativo', $total_inativo);
	$total_i = $stm->fetchAll(PDO::FETCH_OBJ);
*/


else :


	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT * FROM tb_estoque WHERE nome_produto LIKE :nome_produto OR quantiadade LIKE :quantiadade OR tamanho_produto LIKE :tamanho_produto';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome_produto', $termo . '%');
	$stm->bindValue(':quantiadade', $termo . '%');
	$stm->bindValue(':tamanho_produto', '%' . $termo . '%');
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);



endif;




//---
require_once('class/db.class.php');
//require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
//require_once('protege.php');
///////////////////

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);
//if ($dados != 1){
//header ("location:index.php?pagina=home");
//}


//---
?>
<!DOCTYPE html>
<html>

<head>
	<title>Membros</title>
	<link rel="stylesheet" href="css/pure-min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<meta charset="UTF-8">
	<div align='center'><img src='fotos/logo.jpg' width="130" alt='logo BRAVOS'></div>
</head>
<div class='container-fluid'>
	<fieldset>
		<!-- Cabeçalho da Listagem -->
		<legend>
			<h1>Relação de Itens</h1>
		</legend>
		<!-- Formulário de Pesquisa -->
		<form action="/index.php?pagina=consulta" method="post" id='form-contato' class="form-horizontal col-md-10">
			<div class="row">
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou Tamanho ou Quantidade">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
					</div>
					</span>
				</div>

				<div class='col-md-4'>

					<button type="button" class="btn btn-default btn-sm"><a href='?pagina=cadastro_estoque'><span class="glyphicon glyphicon-plus"></span> Adicionar Item</a></button>

				</div>
			</div>
		</form>
		<?php foreach ($total as $ttl) : ?>
			<p>Total de registros:<?= $ttl->total_registros ?></p>
		<?php endforeach; ?>
		<!--<div class='clearfix ' style="overflow: auto; width: 1200px; height: 300px; border:solid 0px">

											<?php if (!empty($clientes)) : ?>
											 Tabela de Clientes -->
		<!--table class="table" style="width:1140px" border="0"-->
		<div class="table table-responsive">
			<table class="table">
				<thead>
					<tr class='active'>
						<th class="col-md-auto" scope="col">Registro</th>
						<th class="col-md-auto" scope="col">Codigo</th>
						<th class="col-md-auto" scope="col">Produto</th>
						<th class="col-md-auto" scope="col">Tamanho</th>
						<th class="col-md-auto" scope="col">Quantidade</th>
						<th class="col-md-auto" scope="col">Data</th>
						<th class="col-7 col-md-1" scope="col">Ação</th>

					</tr>
				</thead>
				<?php foreach ($clientes as $cliente) : ?>

					<tbody>
						<tr>
							<td class="col-md-auto"><?= $cliente->id_registro ?></td>
							<td class="col-md-auto"><?= $cliente->id_produto ?></td>
							<td class="col-md-auto"><?= $cliente->nome_produto ?></td>
							<td class="col-md-auto"><?= $cliente->tamanho_produto ?></td>
							<td class="col-md-auto"><?= $cliente->quantidade ?></td>
							<?php $date1 = strtr($cliente->data, '/', '-'); ?>
							<td class="col-md-auto"><?= date('d/m/Y', strtotime($date1)) ?></td>
							<td class="col-7 col-md-1">
								<!--td class="col-md-auto"-->
								<a href='editar_estoque.php?id_registro=<?= $cliente->id_registro ?>'><span class="glyphicon glyphicon-edit" title="Editar Registro"></span></a>
								<a href='javascript:void(0)' class="link_exclusao" rel="<?= $cliente->id_registro ?>"><span class="glyphicon glyphicon-remove" title="Excluir Registro"></span></a>
							</td>
						</tr>
					</tbody>
				<?php endforeach; ?>
		</div>
		</table>
	<?php else : ?>

		<!-- Mensagem caso não exista clientes ou não encontrado  -->
		<div class="row">
			<div class="col-sm-12">
				<span>
					<h4 class="text-center text-primary">Não existem registros baseados nos filtros informados!</h4>
				</span>
			</div>
		</div>
	<?php endif; ?>
	</fieldset>
</div>
</div>


<script type="text/javascript" src="js/custom.js"></script>

</html>