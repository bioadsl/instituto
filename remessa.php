<?php
//---
ini_set("display_errors", "1");
error_reporting(E_ALL);


require_once('class/db.class.php');
//require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
//require_once('protege.php');
///////////////////

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

if (@$_SESSION['idusuario'] != 1)
    header('Location: login.php');

//---



?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Tarefas</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
   </head>


    </head>
    <body>
<div align="center">

<label >Produto:</label>
<select name="produto" id="produto" >
<?php
  require_once('class/conexao.php');
  
//seleciona os dados da tabela produto
  $pdo = new Conexao(); 
  $resultado = $pdo->select( "SELECT * FROM categoria");
  $pdo->desconectar();
                                  
  if(count($resultado)){
     foreach ($resultado as $res) {
  ?>                                             
    <option  value="<?php echo $res['id'];?>" ><?php echo $res['descricao'];?></option> 
  <?php      
    }
  }
?>
</select>
</form>
</div>
    </body>

</div>
</html>