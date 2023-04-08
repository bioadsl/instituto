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
	$sql = 'SELECT distinct id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, status  FROM tab_instituto order by 5';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct count(nome) as total_registros from tb_matricula';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_registros', $total_registros);
	$matriculados = $stm->fetch(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct count(nome) as total_registros from tb_matricula';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_registros', $total_registros);
	$trancados = $stm->fetch(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct count(nome) as total_registros from tab_instituto';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_registros', $total_registros);
	$total = $stm->fetch(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT count(status) as total_ativo from tab_instituto WHERE status like'Ativo%' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_ativo', $total_ativo);
	$total_a = $stm->fetch(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT count(status) as total_inativo from tab_instituto WHERE status like 'Inativo%' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_inativo', $total_inativo);
	$total_i = $stm->fetch(PDO::FETCH_OBJ);



else :


	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao FROM tab_instituto WHERE nome LIKE :nome OR email LIKE :email OR endereco LIKE :endereco OR status LIKE :status';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo . '%');
	$stm->bindValue(':email', $termo . '%');
	$stm->bindValue(':endereco', '%' . $termo . '%');
	$stm->bindValue(':status', $termo . '%');
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);



endif;




//---
require_once('class/db.class.php');

require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
require_once('protege.php');
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HOME</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>

        /* Table Base */
        
        table {
          font-family: arial;
          max-width: 100%;
          background-color: transparent;
          border-collapse: collapse;
          border-spacing: 0;
        }
        
        .table { 
          width: 100%;
          margin-bottom: 20px;
        }
        
        .table th,
        .table td {
          font-weight: normal;
          font-size: 12px;
          padding: 8px 15px;
          line-height: 20px;
          text-align: left;
          vertical-align: middle;
          border-top: 1px solid #dddddd;
        }
        .table thead th {
          background: #eeeeee;
          vertical-align: bottom;
        }   
        .table tbody > tr:nth-child(odd) > td,
        .table tbody > tr:nth-child(odd) > th {
          background-color: #fafafa;
        }    
        .table .t-small {
          width: 5%;
        }
        .table .t-medium {
          width: 15%;
        }
        .table .t-status {
          font-weight: bold;
        }
        .table .t-active {
          color: #46a546;
        }
        .table .t-inactive {
          color: #e00300;
        }
        .table .t-draft {
          color: #f89406;
        }
        .table .t-scheduled {
          color: #049cdb;
        }
        
        /* Small Sizes */
        @media (max-width: 480px) { 
          .table-action thead {
            display: none;
          }
          .table-action tr {
            border-bottom: 1px solid #dddddd;
          }
          .table-action td {
            border: 0;
          }
          .table-action td:not(:first-child) {
            display: block;
          }
        }
        
        
        </style>
</head>
<?php include 'menu.php';?>
<div class='container'>
	<fieldset>
		<!-- Cabeçalho da Listagem -->
		<legend>
			<h1>Relação de Famílias</h1>
		</legend>
		<!-- Formulário de Pesquisa -->
		<div class="row">
			<form action="?pagina=consulta" method="post" id='form-contato' class="form-horizontal">
				<div class="col-sm-6">
					<div class="input-group">
						<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou E-mail ou Endereço">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
						</span>
					</div>
				</div>
			</form>
			<div class='col-sm-6'>
				<button type="button" class="btn btn-default btn-sm"><a href='?pagina=relatorio'><span class="glyphicon glyphicon-download-alt"></span></a></button>
				<button type="button" class="btn btn-default btn-sm"><a href='?pagina=cadastro'><span class="glyphicon glyphicon-plus"></span></a></button>
				<button type="button" class="btn btn-default btn-sm"><a href='?pagina=aniversariantes'><span class="glyphicon glyphicon-gift"></a></button>
			</div>
		</div>

		<div class="row" style="padding-top: 2%;">

			<div class="col-md-3">Total de registros:<?= $total->total_registros ?></div>
			<div class="col-md-2">Ativos: <?= $total_a->total_ativo ?></div>
			<div class="col-md-2">Inativos: <?= $total_i->total_inativo ?></div>
			<div class="col-md-2">Matriculados: <?= $matriculados->total_registros ?></div>
			<!-- <div class="col-md-3">Trancados: <?//= $trancados->total_registros ?></div> -->

		</div>

		<!--<div class='clearfix ' style="overflow: auto; width: 1200px; height: 300px; border:solid 0px">

											<?php if (!empty($clientes)) : ?>
											 Tabela de Clientes -->
		<!--table class="table" style="width:1140px" border="0"-->
		<div class="table table-responsive">
			<table class="table">
				<thead>
					<tr class='active'>
		
						<th class="col-md-auto" scope="cols">Mãe</th>
						<th class="col-md-auto" scope="cols">Pai</th>
						<th class="col-md-auto" scope="cols">Nº Filhos</th>
						<!--th-- class="col-md-auto" scope="col">E-mail</!--th-->
						<th class="col-md-auto" scope="col">Celular</th>
						<th class="col-md-auto" scope="col">Endereço</th>
						<th class="col-md-auto" scope="col">Status</th>
						<th class="col-md-auto" scope="col">Ação</th>
					</tr>
				</thead>
				<?php foreach ($clientes as $cliente) : ?>

					<tbody>
						<tr>
							
							<td class="col-md-auto"><?= $cliente->mae ?></td>
							<td class="col-md-auto"><?= $cliente->pai ?></td>
							<?php
								$mae = $cliente->mae;								
								$conexao = conexao::getInstance();
								$sql = "SELECT count(nome) as num_filho from tab_instituto where mae = '$mae'";
								$stm = $conexao->prepare($sql);
								$stm->execute();
								$filhos = $stm->fetch(PDO::FETCH_OBJ);	
								$inscritos = $filhos->num_filho;							
							?>
							<td class="col-md-auto"><?=$inscritos?></td>
							<!--td-- class="col-md-auto"><?= $cliente->email ?></!--td-->
							<td class="col-md-auto"><?= $cliente->celular ?></td>
							<td class="col-md-auto"><?= $cliente->endereco ?></td>
							<td class="col-md-auto"><?= $cliente->status ?></td>
							<td class="col-1 col-lg-2">
								<!--td class="col-md-auto"-->
								<a href='carteira.php?id=<?= $cliente->id ?>'> <span class="glyphicon glyphicon-user" style="font-size: 30px" title="Carteirinha"> </span> </a>
								<a href='matricula1.php?id=<?= $cliente->id ?>'> <span class="glyphicon glyphicon-education" style="font-size: 30px" title="Matricular"> </span> </a>
								<a href='editar.php?id=<?= $cliente->id ?>'> <span class="glyphicon glyphicon-edit" style="font-size: 30px" title="Editar Registro"> </span> </a>
								<a href='javascript:void(0)' class="link_exclusao" rel="<?= $cliente->id ?>"><span style="font-size: 30px" class="glyphicon glyphicon-remove" title="Excluir Registro"> </span> </a>
								<a href='atendimento.php?id=<?= $cliente->id ?>'> <i style="font-size: 30px" class="fa fa-user-md"> </i> </a>
							</td>
						</tr>
					</tbody>
				<?php endforeach; ?>
		</div>
		</table>
	<?php else : ?>
		<!-- encaixe-->
		<div class="dataTables_paginate paging_two_button" id="contacts_paginate">
			<a class="paginate_disabled_previous" tabindex="0" role="button" id="contacts_previous" aria-controls="contacts">Anterior</a>
			<a class="paginate_disabled_next" tabindex="0" role="button" id="contacts_next" aria-controls="contacts">Seguinte</a>
		</div>


		<!-- encaixe-->
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