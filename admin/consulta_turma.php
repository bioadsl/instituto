
<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "1");
error_reporting(E_ALL);
/*include 'error.php';
*/

// Recebe o termo de pesquisa se existir
$termo = (isset($_POST['termo'])) ? $_POST['termo'] : '';

// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';
$id_matricula = (isset($_GET['id_matricula'])) ? $_GET['id_matricula'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):


	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct b.id, b.foto, b.carteirinha, b.pl_saude, b.nome, b.sexo, b.dt_nascimento, b.email, b.tp_sanguineo, b.ft_rh, b.peso, b.altura, b.pai, b.mae, b.telefone, b.celular, b.endereco, b.alergia, b.coracao, b.respiracao, b.especial, b.outros, b.observacao, b.proximo, b.tel_proximo, b.cel_proximo, b.adesao, a.status, a.id_inscrito, a.cod_matricula, a.id_matricula, a.turma   FROM tab_instituto as b INNER JOIN tb_matricula as a on b.id = a.id_inscrito';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

	// Captura os dados do atendimento solicitado
	// $conexao1 = conexao::getInstance();
	// $sql1 = 'SELECT * FROM tb_avaliacao where id_matricula=:id_matricula';
	// $stm = $conexao1->prepare($sql1);
	// $stm->bindValue(':id_matricula', $id_matricula);
	// $stm->execute();
	// $registro = $stm->fetch(PDO::FETCH_OBJ);

	// Captura os dados do atendimento solicitado
	$conexao1 = conexao::getInstance();
	$sql1 = 'SELECT * FROM tb_matricula where id_matricula=:id_matricula';
	$stm = $conexao1->prepare($sql1);
	$stm->bindValue(':id_matricula', $id_matricula);
	$stm->execute();
	$registro = $stm->fetch(PDO::FETCH_OBJ);

    $conexao = conexao::getInstance();
	$sql = 'SELECT distinct count(id_matricula) as total_registros from tb_matricula';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$total = $stm->fetchAll(PDO::FETCH_OBJ);

    $conexao = conexao::getInstance();
	$sql = "SELECT count(status) as matriculado from tb_matricula WHERE status like'%Matriculado%' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	//$stm->bindValue(':total_ativo', $total_ativo);
	$total_matriculado = $stm->fetchAll(PDO::FETCH_OBJ);

    $conexao = conexao::getInstance();
	$sql = "SELECT count(status) as trancado from tb_matricula WHERE status like '%Trancado%' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	//$stm->bindValue(':total_inativo', $total_inativo);
	$total_trancado = $stm->fetchAll(PDO::FETCH_OBJ);
/**/


else:


// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct b.id, b.foto, b.carteirinha, b.pl_saude, b.nome, b.sexo, b.dt_nascimento, b.email, b.tp_sanguineo, b.ft_rh, b.peso, b.altura, b.pai, b.mae, b.telefone, b.celular, b.endereco, b.alergia, b.coracao, b.respiracao, b.especial, b.outros, b.observacao, b.proximo, b.tel_proximo, b.cel_proximo, b.adesao, a.status, a.id_inscrito, a.cod_matricula, a.id_matricula, a.turma  FROM tab_instituto as b INNER JOIN tb_matricula as a on b.id = a.id_inscrito WHERE nome LIKE :nome OR email LIKE :email OR endereco LIKE :endereco OR status LIKE :status';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':status', $termo.'%');
	$stm->bindValue(':email', $termo.'%');
	$stm->bindValue(':endereco', '%'.$termo.'%');
	/*$stm->bindValue(':status', $termo.'%');*/
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

    

endif;

//---
require_once('class/db.class.php');
require_once('class/valida.class.php');
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
										<legend><h1>Matriculados na Escolinha de Futebol <?php ?></h1></legend>
										<!-- Formulário de Pesquisa -->
										<form action="index.php?pagina=consulta_atendimento" method="post" id='form-contato' class="form-horizontal col-md-10">
											<div class="row">
												<div class="col-lg-6">
													<div class="input-group">
													<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou E-mail ou Matricula">
													<span class="input-group-btn">
														<button type="submit" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
													</div>
													</span>
												</div>

												<div class='col-md-4'>
													<div class="col-lg-4">
														<?php foreach($total as $ttl):?>
															<p>Registros:<?=$ttl->total_registros?></p>
														<?php endforeach;?>
													</div>
													<div class="col-lg-4">
														<?php foreach($total_trancado as $ttl):?>
															<p>Trancados:<?=$ttl->trancado?></p>
														<?php endforeach;?>
													</div>
													<div class="col-lg-4">
														<?php foreach($total_matriculado as $ttl):?>
															<p>Matriculados:<?=$ttl->matriculado?></p>
														<?php endforeach;?>
													</div>
												</div>
										</form>


							<!--<div class='clearfix ' style="overflow: auto; width: 1200px; height: 300px; border:solid 0px">

											<?php if(!empty($clientes)):?>
											 Tabela de Clientes -->
														<!--table class="table" style="width:1140px" border="0"-->
									<div class="table "  >
										<table class="table">
											<thead>
														<tr class='active'>
															<th class="col-sm-1" scope="col">Nº</th>
															<th class="col-sm-1" scope="col">Foto</th>
															<th class="col-md-auto" scope="col">Matricula</th>
															<th class="col-md-auto" scope="col">Turma</th>
															<th class="col-md-auto" scope="col">Nome</th>
															<!--th class="col-md-auto" scope="col">E-mail</th-->
															<th class="col-md-auto" scope="col">Status</th>
															<th class="col-md-3" scope="col">Ação</th>
															<!--th class="col-md-auto" scope="col">Ação</th-->
															</tr>
														</thead>
													<?php foreach($clientes as $cliente):?>
													
													<tbody>
													<tr>
														<td class="col-lg-1"><?=$cliente->id_inscrito?></td>	
														<td><img src='fotos/<?=$cliente->foto?>' height='' width='50'></td>
														<td class="col-md-auto"><?=$cliente->cod_matricula?></td>
														<td class="col-md-auto"><?=$cliente->turma?></td>
														<td class="col-md-auto"><?=$cliente->nome?></td>
														<!--td class="col-md-auto"><?//=$cliente->email?></td-->
														<td class="col-md-auto"><?=$cliente->status?></td>
														<td class="col-7 col-md-1">
														<!--td class="col-md-auto"-->
			
<a href='editar_matricula.php?id=<?=$cliente->id?>&id_matricula=<?=$cliente->id_matricula?>'> <img src='images/edit.png' width="50" title="Editar Registro">  </a>
<a href='avaliacao_pais.php?id=<?=$cliente->id?>&id_matricula=<?=$cliente->id_matricula?>'> <img src='images/test.png' width="50" title="Avaliação dos Pais"> </a>
<a href='avaliacao_guardioes.php?id=<?=$cliente->id?>&id_matricula=<?=$cliente->id_matricula?>'> <img src='images/test_g.png' width="50" title="Avaliação dos Guardiões">  </a>
<a href='boletim.php?id=<?=$cliente->id?>&id_matricula=<?=$cliente->id_matricula?>'> <img src='images/boletim.jpg' width="57" title="Boletim">  </a>
</td>
														</tr>
													</tbody>
												<?php endforeach;?>
										</div>
									</table>
										<?php else: ?>

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
		</div>

	<script type="text/javascript" src="js/custom.js"></script>
</html>