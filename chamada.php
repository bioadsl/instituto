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

	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct b.foto, m.id_matricula, m.cod_matricula, m.turma, m.data, m.id_bravo, m.nome, m.status FROM tb_matricula as m  inner join tab_bravos b on m.id_bravo=b.id order by 7';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$bravos = $stm->fetchAll(PDO::FETCH_OBJ);

	$conexao = conexao::getInstance();
	$sql = 'SELECT distinct count(nome) as total_registros from tb_matricula';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$total = $stm->fetchAll(PDO::FETCH_OBJ);



else :


	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, foto, nome FROM tab_bravos';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);


endif;


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

	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=601a28315692e4001147c3da&product=inline-share-buttons" async="async"></script>

</head>

<body>
	<div class='container'>
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
								<th class="col-md-auto" scope="col">Nº</th>
								<th class="col-md-auto" scope="col">Foto</th>
								<th class="col-md-auto" scope="col">Nome</th>
								<th class="col-md-auto" scope="col">Matricula</th>
								<th class="col-md-auto" scope="col">Presença</th>
								<th class="col-1 col-2" scope="col">Falta</th>
								<!--th class="col-md-auto" scope="col">Ação</th-->
							</tr>
						</thead>
						<?php foreach ($bravos as $chave => $bravo) : ?>

							<tbody>
								<tr>
									<td class="col-md-auto"> <?= $chave ?></td>
									<td><img src='fotos/<?= $bravo->foto ?>' height='' width='30'></td>
									<td class="col-md-auto"><?= $bravo->nome ?></td>
									<td class="col-md-auto"><?= $bravo->cod_matricula ?></td>
									<td class="col-1 col-lg-2">

										<div class="form-check">
											<input type="radio" id="<?= $bravo->id_bravo ?>" name="presenca[<?= $bravo->id_bravo ?>]" value="P">

											<label class="form-check-label" for="flexCheckDefault"></label>
										</div>

									</td>

									<td class="col-1 col-lg-2">

										<div class="form-check">
											<input type="radio" id="<?= $bravo->id_bravo ?>" name="presenca[<?= $bravo->id_bravo ?>]" value="F">

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