<?php
session_start();

//Incluir a conexão com o BD
include_once("conexaoExcel.php");

//Receber os dados do formulário
$data = $_REQUEST['data'];
$titulo = $_REQUEST['titulo'];
$nome = $_REQUEST['nome'];
$telefone = $_REQUEST['telefone'];
$local = $_REQUEST['local'];
$descricao = $_REQUEST['descricao'];
$destino = $_REQUEST['destino'];


//Converter a data e hora para o formato do BD.
$data = explode(" ", $data);
list($date, $hora) = $data;
$data_sem_barra = array_reverse(explode("/", $date));
$data_sem_barra = implode("-", $data_sem_barra);
$data_sem_barra = $data_sem_barra . " " . $hora;

//Validação dos campos
if(empty($_POST['nome']) || empty($_POST['data']) || empty($_POST['titulo'])|| empty($_POST['local'])|| empty($_POST['descricao']) || empty($_POST['destino'])){
	$_SESSION['msg'] = "<div class='alert alert-warning'>Preencha os campos corretamente</div>";
	header("Location: index.php"); 
}else{
	//Salvar no BD
	$result_data = "INSERT INTO agendamentos(titulo, data, nome, telefone, local, descricao, destino ) VALUES ('$titulo','$data_sem_barra','$nome','$telefone', '$local','$descricao', '$destino')";
	$resultado_data = mysqli_query($link, $result_data);

	//Verificar se salvou no banco de dados através do "mysqli_insert_id" que verifica se existe o ID do ultimo dado inserido
	if(mysqli_insert_id($link)){
		$_SESSION['msg'] = "<div class='alert alert-success'>Agendamento efetuado com sucesso</div>";
		header("Location: index.php");
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao efetuar o agendamento</div>";
		header("Location: index.php");
	}
	
}





?>