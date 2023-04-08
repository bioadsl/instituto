
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
$id_atendimento = (isset($_GET['id'])) ? $_GET['id'] : '';


// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):


	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct b.id, b.foto, b.carteirinha, b.pl_saude, b.nome, b.sexo, b.dt_nascimento, b.email, b.tp_sanguineo, b.ft_rh, b.peso, b.altura, b.pai, b.mae, b.telefone, b.celular, b.endereco, b.alergia, b.coracao, b.respiracao, b.especial, b.outros, b.observacao, b.proximo, b.tel_proximo, b.cel_proximo, b.adesao, a.conselheiro, a.status, a.id_atendimento  FROM tab_bravos as b INNER JOIN atendimento as a on b.id = a.id_atendido order by a.id_atendimento desc';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);

	// Captura os dados do atendimento solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT  id_atendimento, atendido, conselheiro, convenio, tipo, descricao, agendamento, data, id_atendido, exame, status, descricao FROM atendimento where id_atendimento = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_atendimento);
	$stm->execute();
	$t_atendimentos = $stm->fetch(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT  count(status) as acompanhamento from atendimento WHERE status = 'Acompanhamento'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_acompanhamentos = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT count(status) as agendado from atendimento WHERE status = 'Agendado'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_agendados = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT  count(status) as retorno from atendimento WHERE status = 'Retorno'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_retornos = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT  count(status) as fechado from atendimento WHERE status = 'Fechado'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_fechados = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT  count(status) as cancelado from atendimento WHERE status = 'Cancelado'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_cancelados = $stm->fetchAll(PDO::FETCH_OBJ);

	$sql = "SELECT  count(status) as desistencia from atendimento WHERE status = 'Desistencia'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_desistencias = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT  count(status) as finalizado from atendimento WHERE status = 'Finalizado'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_finalizados = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT  count(status) as aguardando from atendimento WHERE status = 'Aguardando Atendimento'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_aguardandos = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = "SELECT  count(status) as atendimento from atendimento WHERE status = 'Em Atendimento'";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$t_em_atendimentos = $stm->fetchAll(PDO::FETCH_OBJ);

    $conexao = conexao::getInstance();
	$sql = 'SELECT distinct count(id_atendimento) as registros from atendimento';
	$stm = $conexao->prepare($sql);
	$stm->execute();
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
<div align='center'><img src='fotos/logo.jpg' width="130" alt='logo BRAVOS'></div>
</head>




<div class="row">
		<div class="col-sm-6">

   <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {

	var agendado = <?php $t=0; if(!empty($t_aguardandos)): foreach($t_aguardandos as $t_aguardando): $t=$t_aguardando->aguardando; echo $t; endforeach; else: echo $t; endif; ?>;	
	var em_atendimento = <?php $t=0; if(!empty($t_em_atendimentos)): foreach($t_em_atendimentos as $t_em_atendimento): $t=$t_em_atendimento->atendimento; echo $t; endforeach; else: echo $t; endif; ?>;
	var acompanhamento = <?php $t=0; if(!empty($t_acompanhamentos)): foreach($t_acompanhamentos as $t_acompanhamento): $t=$t_acompanhamento->acompanhamento; echo $t; endforeach; else: echo $t; endif; ?>;
	var retorno = 	<?php $t=0; if(!empty($t_retornos)): foreach($t_retornos as $t_retorno): $t=$t_retorno->retorno; echo $t; endforeach; else: echo $t; endif; ?>;
	var cancelado = <?php $t=0; if(!empty($t_cancelados)): foreach($t_cancelados as $t_cancelado): $t=$t_cancelado->cancelado; echo $t; endforeach; else: echo $t; endif; ?>;
	var desistencia = <?php $t=0; if(!empty($t_desistencias)): foreach($t_desistencias as $t_desistencia): $t=$t_desistencia->desistencia; echo $t; endforeach; else: echo $t; endif; ?>;
	var finalizado = <?php $t=0; if(!empty($t_finalizados)): foreach($t_finalizados as $t_finalizado): $t=$t_finalizado->finalizado; echo $t; endforeach; else: echo $t; endif; ?>;
	var aguardando = <?php $t=0; if(!empty($t_aguardandos)): foreach($t_aguardandos as $t_aguardando): $t=$t_aguardando->aguardando; echo $t; endforeach; else: echo $t; endif; ?>;	

	var data = google.visualization.arrayToDataTable([
		  ['Agendamentos', 'Por cada Bravo'],
          ['Agendado', agendado],
          ['Em Atendimento', em_atendimento],
          ['Acompanhamento', acompanhamento],
		  ['Retorno', retorno],
		  ['Cancelado', cancelado],
		  ['Desistencia', desistencia],
		  ['Finalizado', finalizado],
		  ['Aguardando', aguardando]
	]);

	var options = {
		title: 'Atendimento BRAVOS',
		pieHole: 0.4,
	};


	var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
	chart.draw(data, options);
	}
</script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>



</div>
<div class="col-sm-6">


<head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the controls package.
      google.charts.load('current', {'packages':['corechart', 'controls']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawDashboard);

      // Callback that creates and populates a data table,
      // instantiates a dashboard, a range slider and a pie chart,
      // passes in the data and draws it.
      function drawDashboard() {

		var agendado = <?php $t=0; if(!empty($t_aguardandos)): foreach($t_aguardandos as $t_aguardando): $t=$t_aguardando->aguardando; echo $t; endforeach; else: echo $t; endif; ?>;	
		var em_atendimento = <?php $t=0; if(!empty($t_em_atendimentos)): foreach($t_em_atendimentos as $t_em_atendimento): $t=$t_em_atendimento->atendimento; echo $t; endforeach; else: echo $t; endif; ?>;
		var acompanhamento = <?php $t=0; if(!empty($t_acompanhamentos)): foreach($t_acompanhamentos as $t_acompanhamento): $t=$t_acompanhamento->acompanhamento; echo $t; endforeach; else: echo $t; endif; ?>;
		var retorno = 	<?php $t=0; if(!empty($t_retornos)): foreach($t_retornos as $t_retorno): $t=$t_retorno->retorno; echo $t; endforeach; else: echo $t; endif; ?>;
		var cancelado = <?php $t=0; if(!empty($t_cancelados)): foreach($t_cancelados as $t_cancelado): $t=$t_cancelado->cancelado; echo $t; endforeach; else: echo $t; endif; ?>;
		var desistencia = <?php $t=0; if(!empty($t_desistencias)): foreach($t_desistencias as $t_desistencia): $t=$t_desistencia->desistencia; echo $t; endforeach; else: echo $t; endif; ?>;
		var finalizado = <?php $t=0; if(!empty($t_finalizados)): foreach($t_finalizados as $t_finalizado): $t=$t_finalizado->finalizado; echo $t; endforeach; else: echo $t; endif; ?>;
		var aguardando = <?php $t=0; if(!empty($t_aguardandos)): foreach($t_aguardandos as $t_aguardando): $t=$t_aguardando->aguardando; echo $t; endforeach; else: echo $t; endif; ?>;	

        // Create our data table.
        var data = google.visualization.arrayToDataTable([
          ['Name', 'Atendimentos'],
          ['Agendado', agendado],
          ['Em Atendimento', em_atendimento],
          ['Acompanhamento', acompanhamento],
		  ['Retorno', retorno],
		  ['Cancelado', cancelado],
		  ['Desistencia', desistencia],
		  ['Finalizado', finalizado],
		  ['Aguardando', aguardando]
        ]);

        // Create a dashboard.
        var dashboard = new google.visualization.Dashboard(
            document.getElementById('dashboard_div'));

        // Create a range slider, passing some options
        var donutRangeSlider = new google.visualization.ControlWrapper({
          'controlType': 'NumberRangeFilter',
          'containerId': 'filter_div',
          'options': {
            'filterColumnLabel': 'Atendimentos'
          }
        });

        // Create a pie chart, passing some options
        var pieChart = new google.visualization.ChartWrapper({
          'chartType': 'PieChart',
          'containerId': 'chart_div',
          'options': {
            'width': 900,
            'height': 500,
            'pieSliceText': 'value',
            'legend': 'right'
          }
        });

        // Establish dependencies, declaring that 'filter' drives 'pieChart',
        // so that the pie chart will only display entries that are let through
        // given the chosen slider range.
        dashboard.bind(donutRangeSlider, pieChart);

        // Draw the dashboard.
        dashboard.draw(data);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the dashboard-->
    <div id="dashboard_div">
      <!--Divs that will hold each control and chart-->
      <div id="filter_div"></div>
      <div id="chart_div"></div>
    </div>
  </body>





	</div>
</div>
















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
										<p>Total de registros:<?=$ttl->registros?></p>
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

														<td class="col-md-auto"><?=$cliente->celular?></td>
														<td class="col-md-auto"><?=$cliente->conselheiro?></td>
														<td class="col-md-auto"><?=$cliente->status?></td>
														<td class="col-7 col-md-1">
														<!--td class="col-md-auto"-->
														<a href='editar_atendimento.php?id=<?=$cliente->id?>&id_atendimento=<?=$cliente->id_atendimento?>'><i class='fas fa-stethoscope' title="Editar Atendimento"></i></a>
														<a href='prontuario.php?id=<?=$cliente->id?>'><i class='far fa-address-card'title="Prontuario"></i></a>
														<a href='javascript:void(0)' class="link_exclusao" rel="<?=$cliente->id?>"><i class='fas fa-flask' title="Exame"></i></a>
														<a href='atendimento.php?id=<?=$cliente->id?>'><i class="fa fa-user-md" title="Novo Atendimento"></i></a>
														<a href='anamnese.php?id=<?=$cliente->id?>'><i class="fa fa-file-text-o"></i></a>
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