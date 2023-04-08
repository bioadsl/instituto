
<?php
header ('Content-Type: text/html; charset=utf-8');
ini_set('memory_limit', '256M');
ini_set("display_errors", "1");
error_reporting(E_ALL);
include 'error.php';


include ("phpmailer/class.phpmailer.php");
include ("modeloConexao.php");



//Campos para envio da mensagem

$de = utf8_decode('fabricio.4135@gmail.com');
$para = utf8_decode('fabricio.4135@gmail.com');
$assunto = utf8_decode('Atividade BRAVOS Batalhão Lacustre 21/11/2020');
$html = utf8_decode('<h1>🎺Atenção Senhores,</h1> 
<p>sábado dia 21/11, os 🦁BRAVOS foram convidados para visitar o 🚤Batalhão Lacustre, 
esse é o🚢 batalhão da PM que cuida do Lago Paranoá⛴️.</p>
<p>Localização: https://g.co/kgs/4GvFqy</p>
<p>Concentração na 💒CAP as 7:30h 🕢, partiremos logo após o cerimonial a bandeira as 8h 🕗, não se atrasem! 🦥
É obrigatório a participação de todos no cerimonial à bandeira🇧🇷 para treinar movimentos de ordem unida e receber instruções de👮🏻‍♀️👮🏻‍♂️ como se comportar dentro da organização militar!🚓
Tragam R$ 5,00 💸 para ajudar o com lanche🍌🥪🧃.</p>
<p></p>Confirme a presença ✍🏻de vocês para fazermos nossa logística, o limite de inscrição é a lotação do ônibus🚌, então corre pra não ficar de fora!🏃🏽‍♂️🏃🏽‍♀️🌪️
</p>
<p>⚠️Importante, Vão de tênis👟, quem ainda não tem uniforme vá camiseta preta e encomende a sua no link abaixo.
</p>
<p>Formulario de pedido da camiseta, valor R$ 30,00 : https://forms.gle/2zBX7pm1TTSuHreL8</p>
');

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
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
    printf("Connect ok <br>");
}


// SELECIONA O BANCO
mysqli_select_db( $conexao , $database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect db failed: %s\n", mysqli_connect_error());
    exit();
}else{
    printf("Connect db ok <br>");
}
// // RESGATA O VALOR DA GLOBAL INICIO
 $inicio = 0;
// // ATRIBUI O RESULTADO DA SOMA ENTRE INICIO E QUANT
$fim = $inicio + $quant;
// // VERIFICA SE FOI ATRIBUIDO VALOR A VARIAVEL "INICIO"
if($inicio === ''){

// // ATRIBUI O VALOR 0 CASO NÃO EXISTA VALOR ATRIBUIDO
$inicio = $_GET["inicio"];


}else{

// // ATRIBUI O VALOR DA GLOBAL INICIO CASO JA EXISTA VALOR ATRIBUIDO
$inicio = 0;
 }

// EXECUTA A CONSULTA OU INFORMA UM ERRO CASO OCORRA
$sql = mysqli_query( $conexao, 'SELECT '. $campos .' FROM '. $tabela .' WHERE codStatus = 0 LIMIT '. $inicio .','. $quant)or die(mysqli_connect_error());

// VERIFICA SE AINDA EXISTEM EMAILS A SEREM ENVIADOS
if(mysqli_num_rows($sql) == 0){

// ALTERANDO O VALOR DO CAMPO CODSTATUS PARA 0
@mysqli_query( $conexao, "UPDATE ". $tabela ." SET codStatus = 0");

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
	global $error;
$mail = new PHPMailer();
$mail->IsSMTP = ('smtp');
//$mail->IsSMTP();		// Ativar SMTP
$mail->Mailer = ('mail');
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//$mail->SMTPSecure = 'ssl';
$mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
$mail->SMTPAuth = true;
$mail->Username = ('fabricio.4135@gmail.com');
$mail->Password = ('#Q121l493');
$mail->Sender = ('fabricio.4135@gmail.com');
$mail->From = ('bravoscap@gmail.com');
$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
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

@mysqli_query( $conexao, "UPDATE ". $tabela ." SET codStatus = 1 WHERE id = 1". $id);

} else {
echo "Mensagem não enviada para: ". $para ."<br />";
}
}

?>
