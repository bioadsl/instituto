<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "1");
error_reporting(E_ALL);
/*include 'error.php';
*/

// Recebe o termo de pesquisa se existir
$termo = (isset($_POST['termo'])) ? $_POST['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)) :


	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao  FROM tab_instituto order by nome';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $clientes = $stm->fetchAll(PDO::FETCH_OBJ);


	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct b.foto, m.id_matricula, m.cod_matricula, m.turma, m.data, m.id_bravo, m.nome, m.status FROM tb_matricula as m  inner join tab_instituto b on m.id_bravo=b.id order by 7';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$bravos = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct count(nome) as total_registros from tb_matricula';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	// $stm->bindValue(':total_registros', $total_registros);
	$total = $stm->fetchAll(PDO::FETCH_OBJ);
/*
    $conexao = conexao::getInstance();
	$sql = "SELECT count(status) as total_ativo from tab_instituto WHERE status like'%Ativo%' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_ativo', $total_ativo);
	$total_a = $stm->fetchAll(PDO::FETCH_OBJ);

    $conexao = conexao::getInstance();
	$sql = "SELECT count(status) as total_inativo from tab_instituto WHERE status like '%inativo%' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_inativo', $total_inativo);
	$total_i = $stm->fetchAll(PDO::FETCH_OBJ);
*/


else :


	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao FROM tab_instituto WHERE nome LIKE :nome OR email LIKE :email OR endereco LIKE :endereco';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo . '%');
	$stm->bindValue(':email', $termo . '%');
	$stm->bindValue(':endereco', '%' . $termo . '%');
	/*$stm->bindValue(':status', $termo.'%');*/
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);



endif;




// //---
// require_once('class/db.class.php');
// require_once('class/valida.class.php');
// require_once('class/usuario.class.php');

// // Somente usuários logados podem acessar esta página

// // Protege a página
// require_once('protege.php');
// ///////////////////

// $usuario = new usuario();
// $dados = $usuario->usuarioInfo($_SESSION['idusuario']);
//if ($dados != 1){
//header ("location:index.php?pagina=home");
//}


//---
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>BRAVOS CAP</title>
	<meta name="google-site-verification" content="k3qfF6H52rtE3RWRs5SMXBt90HOl4yVKhFmyeILfQfA" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- JS Comportament -->
	<script src="./assets/js/comportamento.js"></script>
	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<!--  <link rel="stylesheet" type="text/css" src="./assets/css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<!-- Custom styles for this template -->
	<link href="carousel.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
	<!--link rel="stylesheet" type="text/css" href="css/estilo.css"--->
	<!--  Styles Galeria-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/346a5abb17.js" crossorigin="anonymous"></script>



	<style type="text/css">
		img {
			border-radius: 10px;
		}
	</style>

	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=601a28315692e4001147c3da&product=inline-share-buttons" async="async"></script>

</head>

<body>
	<div class='container-fluid'>
		<fieldset>
			<!-- Cabeçalho da Listagem -->

			<!-- Formulário de Pesquisa -->
			<div class="row">

				<div class="col-lg-6">
					<form action="?pagina=chamada" method="post" id='form-contato' class="form-horizontal col-md-10">
						<legend>
							<h1>Chamada</h1>
						</legend>
						<div class="input-group">
							<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou E-mail ou Endereço">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
						</div>
						</span>

					</form>
				</div>

				<div class="col-lg-6">
					<form action="action_chamada.php" method="post" id='form-contato' class="form-horizontal col-md-10">
						<h2>Data: <input type="hidden" name="data" value="<?php echo date('d/m/Y'); ?>"> <?= $hoje = date('d/m/Y'); ?></h2>
						<?php foreach ($total as $ttl) : ?>
							<h3>Total de registros:<?= $ttl->total_registros ?></h3>
						<?php endforeach; ?>
				</div>

			</div>


			<?php if (!empty($bravos)) : ?>


				<div class="table ">
					<table class="table">
						<thead>
							<tr class='active'>
								<th class="col-md-auto" scope="col">id</th>
								<th class="col-md-auto" scope="col">Foto</th>
								<th class="col-md-auto" scope="col">Nome</th>
								<th class="col-md-auto" scope="col">Matricula</th>
								<th class="col-md-auto" scope="col">Presença</th>
								<th class="col-1 col-2" scope="col">Falta</th>
								<!--th class="col-md-auto" scope="col">Ação</th-->
							</tr>
						</thead>
						<?php foreach ($bravos as $bravo) : ?>

							<tbody>
								<tr>
									<td class="col-md-auto"> <?= $bravo->id_bravo ?></td>
									<td><img src='fotos/<?= $bravo->foto ?>' height='' width='30'></td>
									<td class="col-md-auto"><?= $bravo->nome ?></td>
									<td class="col-md-auto"><?= $bravo->cod_matricula ?></td>
									<td class="col-1 col-lg-2">

										<div class="form-check">
											<input type="radio" name="presenca[<?= $bravo->id_bravo ?>]" value="P">
											<input type="hidden" name="id_bravo" value="brv[<?= $bravo->id_bravo ?>]">
											<label class="form-check-label" for="flexCheckDefault"></label>
										</div>

									</td>

									<td class="col-1 col-lg-2">

										<div class="form-check">
											<input type="radio" name="presenca[<?= $bravo->id_bravo ?>]" value="F">
											<input type="hidden" name="id_bravo" value="brv[<?= $bravo->id_bravo ?>]">
											<label class="form-check-label" for="flexCheckDefault"></label>
										</div>

									</td>

								</tr>
							</tbody>
						<?php endforeach; ?>
				</div>
				</table>
			<?php else : ?>

				<div class="row">
					<div class="col-sm-12">
						<span>
							<h4 class="text-center text-primary">Não existem registros baseados nos filtros informados!</h4>
						</span>
					</div>
				</div>
			<?php endif; ?>


			<div class="row">
				<div class="col-lg-4">
					<input type="hidden" name="acao" value="incluir">
					<button type="submit" class="btn btn-primary" id='botao'>
						Gravar
					</button>
					<a href='?pagina=consulta_estoque' class="btn btn-danger">Voltar</a>
				</div>
			</div>

			</form>
		</fieldset>

	</div>

	<script type="text/javascript" src="js/custom.js"></script>
</body>

</html>