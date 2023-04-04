
<?php
header ('Content-Type: text/html; charset=utf-8');

include ("phpmailer/class.phpmailer.php");
include ("modeloConexao.php");

//Campos para envio da mensagem

$de = utf8_decode('bravoscap@gmail.com');
$para = utf8_decode('destinatário');
$assunto = (isset($_POST['assunto'])) ? $_POST['assunto'] : '';
$html = (isset($_POST['mensagem_md'])) ? $_POST['mensagem_md'] : '';

$tabela = "tab_mala_direta";

// CAMPOS UTILIZADOS PARA A CONSULTA
$campos = "id, nome, email, codStatus";

// NUMERO MÁXIMO DE ENVIO
$quant = 2;

// TEMPO ENTRE UM PROCESSO DE ENVIO E OUTRO
$seg = 15;

// CONECTA COM O SERVIDOR MYSQL
$conexao = mysqli_connect($hostname, $username, $password);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Falha de conexao com o banco!: %s\n", mysqli_connect_error());
    exit();
}else{
    printf("Conexao ok! <br>");
}


// SELECIONA O BANCO
mysqli_select_db( $conexao , $database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Falha na selecao do banco!: %s\n", mysqli_connect_error());
    exit();
}else{
    printf("Selecao do banco ok! <br>");
}

// RESGATA O VALOR DA GLOBAL INICIO
$inicio = $_GET["inicio"];

// ATRIBUI O RESULTADO DA SOMA ENTRE INICIO E QUANT
$fim = $inicio + $quant;

// VERIFICA SE FOI ATRIBUIDO VALOR A VARIAVEL "INICIO"
if($inicio == ""){

// ATRIBUI O VALOR 0 CASO NÃO EXISTA VALOR ATRIBUIDO
$inicio = 0;
}else{

// ATRIBUI O VALOR DA GLOBAL INICIO CASO JA EXISTA VALOR ATRIBUIDO
$inicio = $_GET["inicio"];
}

// EXECUTA A CONSULTA OU INFORMA UM ERRO CASO OCORRA
$sql = mysqli_query($conexao, 'SELECT '. $campos .' FROM '. $tabela .' WHERE codStatus = 0 LIMIT '. $inicio .','. $quant)or die(mysqli_error());

// VERIFICA SE AINDA EXISTEM EMAILS A SEREM ENVIADOS
if(mysqli_num_rows($sql) == 0){

// ALTERANDO O VALOR DO CAMPO CODSTATUS PARA 0
@mysqli_query($conexao, "UPDATE ". $tabela ." SET codStatus = 0");

// INFORMO O TÉRMINO DO PROCESSO
echo "Fim do processo de envio!";
}else{

// CONTINUA EFETUANDO O ENVIO
echo "<meta http-equiv='refresh' content='' . $seg . ',URL=?inicio='. $fim .''>";
}

// CRIA O LAÇO REPETITIVO
while($r = mysqli_fetch_array($sql)){

// ADICIONAMOS OS PADRÕES DE DESTINATRIO
$para = $r["email"];

//Criando a classe PHPMailer para envio de newsletter

$mail = new PHPMailer();
$mail->SMTPDebug = 3; // debugging: 1 = errors and messages, 2 = messages only
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = ('bravoscap@gmail.com');
$mail->Password = ('crescerparaamarepregar');
$mail->Sender = ('bravoscap@gmail.com');
$mail->From = ('bravoscap@gmail.com');
$mail->FromName = $de;
$mail->Addbcc ($para);
$mail->AddReplyTo = ('bravoscap@gmail.com');
$mail->Wordwrap = 50;
$mail->Subject = ($assunto);
$mail->IsHTML = (true);

$texto = 'Caso a mensagem não seja exibida, favor observar a informações no grupo de WhatsApp';

$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
echo "<hr />Mensagem enviada para: ". $para ."<br />";

//Altero o código para 1 para parar o envio do loop

@mysqli_query($conexao, "UPDATE". $tabela ."SET codStatus = 1 WHERE id = 1".$id);

} else {
echo "Mensagem não enviada para: ". $para ."<br />";
}
}

echo "Mala direta executada com sucesso!";
echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=home'>";

echo "<br>";
echo "<br>";
echo "<form class='form-horizontal'>";
echo "<button  class='btn btn-default btn-sm' onClick='history.go(-1)'>Voltar </button>";
echo "<button  class='btn btn-default btn-sm' onCLick='history.forward()'>Avançar </button>";
echo "<button  class='btn btn-default btn-sm' onClick='history.go(0)'>Atualizar</button>";
echo "</form>"


?>
