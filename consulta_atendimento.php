
<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
/*include 'error.php';
*/

// Recebe o termo de pesquisa se existir
$termo = (isset($_POST['termo'])) ? $_POST['termo'] : '';

// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';
$id_atendimento = (isset($_GET['id'])) ? $_GET['id'] : '';


// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):


	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct b.id, b.foto, b.carteirinha, b.pl_saude, b.nome, b.sexo, b.dt_nascimento, b.email, b.tp_sanguineo, b.ft_rh, b.peso, b.altura, b.pai, b.mae, b.telefone, b.celular, b.endereco, b.alergia, b.coracao, b.respiracao, b.especial, b.outros, b.observacao, b.proximo, b.tel_proximo, b.cel_proximo, b.adesao, a.conselheiro, a.status, a.id_atendimento  FROM tab_bravos as b INNER JOIN atendimento as a on b.id = a.id_atendido order by a.id_atendimento desc';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

	// Captura os dados do atendimento solicitado
	$conexao1 = conexao::getInstance();
	$sql1 = 'SELECT  id_atendimento, atendido, conselheiro, convenio, tipo, descricao, agendamento, data, id_atendido, exame, status, descricao FROM atendimento where id_atendimento = :id';
	$stm = $conexao->prepare($sql1);
	$stm->bindValue(':id', $id_atendimento);
	$stm->execute();
	$atendimento = $stm->fetch(PDO::FETCH_OBJ);


	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_aberto);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);

	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_acompanhamento);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);

	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_agendado);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);

	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_retorno);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);

	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_fechado);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);

	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_cancelado);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);
	// $conexao = conexao::getInstance();

	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_desistencia);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);

	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_finalizado);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);

	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_aguardando_atendimento);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);

	// $conexao = conexao::getInstance();
	// $sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento WHERE status = :total_registros';
	// $stm = $conexao->prepare($sql);
	// $stm->execute();
	// $stm->bindValue(':total_registros', $total_em_atendimento);
	// $total = $stm->fetchAll(PDO::FETCH_OBJ);



    $conexao = conexao::getInstance();
	$sql = 'SELECT distinct count(id_atendimento) as total_registros from atendimento';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$stm->bindValue(':total_registros', $total_registros);
	$total = $stm->fetchAll(PDO::FETCH_OBJ);
/*
    $conexao = conexao::getInstance();
	$sql = "SELECT count(status) as total_registros from atendimento WHERE status like'%status%' ";
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


else:


// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct b.id, b.foto, b.carteirinha, b.pl_saude, b.nome, b.sexo, b.dt_nascimento, b.email, b.tp_sanguineo, b.ft_rh, b.peso, b.altura, b.pai, b.mae, b.telefone, b.celular, b.endereco, b.alergia, b.coracao, b.respiracao, b.especial, b.outros, b.observacao, b.proximo, b.tel_proximo, b.cel_proximo, b.adesao, a.conselheiro, a.status, a.id_atendido  FROM tab_bravos as b INNER JOIN atendimento as a on b.id = a.id_atendido WHERE nome LIKE :nome OR email LIKE :email OR endereco LIKE :endereco OR conselheiro LIKE :conselheiro OR status LIKE :status';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':status', $termo.'%');
	$stm->bindValue(':email', $termo.'%');
	$stm->bindValue(':endereco', '%'.$termo.'%');
	$stm->bindValue(':conselheiro', '%'.$termo.'%');
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
<html>
<head>
  	<title>Membros</title>
	<link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
	<meta charset="UTF-8">
<!--div align='center'><img src='fotos/logo.jpg' width="130" alt='logo BRAVOS'></!--div-->
</head>
	<div class='container-fluid'>
						<fieldset>
										<!-- Cabeçalho da Listagem -->
										<legend><h1>Relação de Atendimentos</h1></legend>
										<!-- Formulário de Pesquisa -->
										<form action="index.php?pagina=consulta_atendimento" method="post" id='form-contato' class="form-horizontal col-md-10">
											<div class="row">
												<div class="col-lg-6">
													<div class="input-group">
													<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou E-mail ou Endereço">
													<span class="input-group-btn">
														<button type="submit" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
													</div>
													</span>
												</div>

												<!--div class='col-md-4'>
												<button type="submit" class="btn btn-default btn-sm"><a href='/index.php?pagina=relatorio_membros'><span class="glyphicon glyphicon-download-alt"></span></a></button>
												<button type="submit" class="btn btn-default btn-sm"><a href='/index.php?cadastro'><span class="glyphicon glyphicon-plus"></span></a></button>

												<button type="submit" class="btn btn-default btn-sm"><a href='/index.php?pagina=aniversariantes'><span class="glyphicon glyphicon-gift"></a></button>
												</div-->
											</div>
										</form>
										<?php foreach($total as $ttl):?>
										<p>Total de registros:<?=$ttl->total_registros?></p>
										<?php endforeach;?>
							<!--<div class='clearfix ' style="overflow: auto; width: 1200px; height: 300px; border:solid 0px">

											<?php if(!empty($clientes)):?>
											 Tabela de Clientes -->
														<!--table class="table" style="width:1140px" border="0"-->
									<div class="table table-responsive" >
										<table class="table">
											<thead>
															<tr class='active'>
															<th class="col-md-1" scope="col">Nº</th>
															<th class="col-lg-auto" scope="col">Foto</th>
															<th class="col-md-auto" scope="col">Nome</th>
															<th class="col-md-auto" scope="col">E-mail</th>
															<th class="col-md-auto" scope="col">Endereço</th>
															<th class="col-md-auto" scope="col">Celular</th>
															<th class="col-md-auto" scope="col">Atendente</th>
															<th class="col-md-auto" scope="col">Status</th>
															<th class="col-md-2" scope="col">Ação</th>
															<!--th class="col-md-auto" scope="col">Ação</th-->
															</tr>
														</thead>
													<?php foreach($clientes as $cliente):?>
													
													<tbody>
													<tr>
													<td class="col-lg-1"><?=$cliente->id_atendimento?></td>	
													<td><img src='fotos/<?=$cliente->foto?>' height='' width='50'></td>
														<td class="col-md-auto"><?=$cliente->nome?></td>
														<td class="col-md-auto"><?=$cliente->email?></td>
														<td class="col-md-auto"><?=$cliente->endereco?></td>
														<?php $date1 = strtr($cliente->agenda, '/', '-'); ?>
														<!--td class="col-md-auto"><?=date('d/m/Y', strtotime($date1))?></td-->
														<td class="col-md-auto"><?=$cliente->celular?></td>
														<td class="col-md-auto"><?=$cliente->conselheiro?></td>
														<td class="col-md-auto"><?=$cliente->status?></td>
														<td class="col-7 col-md-1">
														<!--td class="col-md-auto"-->
														<a href='editar_atendimento.php?id=<?=$cliente->id?>&id_atendimento=<?=$cliente->id_atendimento?>'><i style="font-size: 30px" class='fas fa-stethoscope' title="Editar Atendimento"></i></a>
														<a href='prontuario.php?id=<?=$cliente->id?>'><i style="font-size: 30px" class='far fa-address-card'title="Prontuario"></i></a>
														<!--a href='javascript:void(0)' class="link_exclusao" rel="<?//=$cliente->id?>"><i style="font-size: 30px" class='fas fa-flask' title="Exame"></i></!--a-->
														<a href='atendimento.php?id=<?=$cliente->id?>'><i style="font-size: 30px" class="fa fa-user-md" title="Novo Atendimento"></i></a>
														<!--a href='anamnese.php?id=<?//=$cliente->id?>'><i style="font-size: 30px" class="fa fa-file-text-o"></i></--a-->
														</td>
														</tr>
													</tbody>
												<?php endforeach;?>
										</div>
									</table>
										<?php else: ?>
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