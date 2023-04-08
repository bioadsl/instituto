<?php
$nome = (isset($_POST['nomecto'])) ? $_POST['nomecto'] : '';
$email = (isset($_POST['emailcto'])) ? $_POST['emailcto'] : '';
$from = "bravoscap@gmail.com";
$to = $email;
$subject = "Mensagem de contato BRAVOS de {$nome}";
$headers = "Content-Type: text/html; charset=iso-8859-1\r\nFrom:bravoscap@gmail.com\r\n";
$fonte = "<font size=\"-1\" face=\"Verdana, Arial, Helvetica, sans-serif\">";
$msg = (isset($_POST['mensagemcto'])) ? $_POST['mensagemcto'] : '';
mail($to, $subject, $msg, $headers);
echo "$nome<br>";
echo "Sua mensagem de contato foi enviada com sucesso!";
echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=home'>";
?>
