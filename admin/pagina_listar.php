<?php 
	session_start();
	//Conexão com banco de dados
	include_once("conexaoExcel.php");
	   // acentuação
    mysqli_query($link,"SET NAMES 'utf8'");  
    mysqli_query($link,'SET character_set_connection=utf8');
    mysqli_query($link,'SET character_set_client=utf8');
    mysqli_query($link,'SET character_set_results=utf8');
?>
<div class="panel panel-danger text-center">
	<nav class="navbar navbar-default">
		
		<h3 class="text-center text-danger">Agendamentos para hoje</h3>
	</nav>
  	<?php
		$hoje = date('m-d');
		$mes = date('y-m');  
		$ano = date('y');
  		//$result_horarios = "SELECT * FROM agendamentos WHERE DAY(data) = DAY(CURDATE()) AND MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
		$result_horarios = "SELECT * FROM agendamentos WHERE data like '%$hoje%'";
		$resultado_horarios = mysqli_query($link, $result_horarios);
		while($row_horarios = mysqli_fetch_array($resultado_horarios)){
			echo "<div class='text-center'>";
			echo "<strong>Nome:</strong> ".$row_horarios['nome']."<br>";
			echo "<strong>Telefone</strong> ".$row_horarios['telefone']."<br>";
			echo "<strong>Serviço:</strong> ".$row_horarios['titulo']."<br>";
			echo "<strong>Data e Horário:</strong> ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
			echo "<strong>Descrição:</strong> ".$row_horarios['descricao']."<br>";
			echo "</div>";
			echo "<br>";
		}
  	?>
</div>
<hr>

<div class="panel panel-success text-center">
	<nav class="navbar navbar-default">
		<h3 class="text-center text-success">Agendamentos deste mês</h3>
	</nav>
    <?php
    	//$result_horarios = "SELECT * FROM agendamentos WHERE MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
		$result_horarios = "SELECT * FROM agendamentos WHERE data like '%$mes%'";
		$resultado_horarios = mysqli_query($link, $result_horarios);
		while($row_horarios = mysqli_fetch_array($resultado_horarios)){
			echo "<strong>Nome:</strong> ".$row_horarios['nome']."<br>";
			echo "<strong>Telefone</strong> ".$row_horarios['telefone']."<br>";
			echo "<strong>Serviço:</strong> ".$row_horarios['titulo']."<br>";
			echo "<strong>Data e Horário:</strong> ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
			echo "<strong>Descrição:</strong> ".$row_horarios['descricao']."<br>";
			echo "<hr>";
		}
    ?> 
</div>   

<div class="panel panel-success text-center">
	<nav class="navbar navbar-default">
		<h3 class="text-center text-success">Agendamentos deste ano</h3>
	</nav>
    <?php
    	//$result_horarios = "SELECT * FROM agendamentos WHERE MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE())";
		$result_horarios = "SELECT * FROM agendamentos WHERE data like '%$ano%'";
		$resultado_horarios = mysqli_query($link, $result_horarios);
		while($row_horarios = mysqli_fetch_array($resultado_horarios)){
			echo "<strong>Nome:</strong> ".$row_horarios['nome']."<br>";
			echo "<strong>Telefone</strong> ".$row_horarios['telefone']."<br>";
			echo "<strong>Serviço:</strong> ".$row_horarios['titulo']."<br>";
			echo "<strong>Data e Horário:</strong> ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<br>";
			echo "<strong>Descrição:</strong> ".$row_horarios['descricao']."<br>";
			echo "<hr>";
		}
    ?> 
</div>  


