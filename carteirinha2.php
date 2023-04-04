<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_cliente) && is_numeric($id_cliente)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, senha  FROM tab_bravos WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_cliente);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);


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

//---


?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <title>Edição de Membros</title>
    <!--<link rel="stylesheet" href="css/pure-min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<style>

.img-fluid { 
  max-width: 100%;
  height: auto;
}

.img { 
  background-image: url(fotos/CARTEIRINHA2.svg); 
} 
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) 
  { 
     .img { background-image: url(fotos/CARTEIRINHA2.svg); 
  } 
}



.bg  {
    position: absolute;
    object-fit: fill;
    max-width: 100%;
    width:100%;
    height:110%;
  
    z-index:-1;
    background-image: url("fotos/CARTEIRINHA2.svg");
    background-repeat: no-repeat;
    background-position: center; 
    
    margin-top: -1%;
}

.vertical-img {
transform: rotate(90deg);

}

.imgbg {
    max-width: 100%;
    max-height: 100%;
    background-image: url("fotos/CARTEIRINHA2.svg");
    background-repeat: no-repeat;
    background-position: center; 
}

.parent {
  position: relative;
}


.child {
    position: absolute;
    top: 80%;
    left: 44%;
    transform: translate(-50%, -50%);
}

.nome {
    position: absolute;
    top: 30%;
    left: 42%;
    transform: translate(-50%, -50%);
    margin-top: 6.5%;
    font-size:20px;
}

.ftid {
    position: absolute;
    transform: rotate(90deg); 
    max-width: 30%;
    max-height: 30%;
    left: 52.2%;
    margin-top: 6.5%;
    
}

.centro {
    width:100px;
    height:100px;
    position:relative;
    top:50%;
    left:50%;
    margin-top:-120px;
    margin-left:-300px;
    margin-right:200px;
}


</style>

</head>

<body>


   

   
            <?php if(empty($cliente)): ?>
            <h3 class="text-center text-danger">Membro não encontrado!</h3>
            <?php else: ?>

                    
<div class="row">
    <div class="col-6">
        <img src="fotos/<?=$cliente->foto?>" class="ftid">
    </div>
</div>
<br>
<br>


<div class='bg'>

<div class="child">

<div class="row">

<div class="nome" > 
                  
<?=$cliente->nome?>

</div>




    <div class="col-6">
       <B> PLANO DE SAUDE:</B> <?=$cliente->pl_saude?>
    </div>

    <div class="col-6">
        <?=$cliente->carteirinha?>
    </div>

</div>

<?=$cliente->tp_sanguineo?>
         
<?=$cliente->ft_rh?>

<br>


<div class="col"> 

                  
<?=$cliente->nome?>

</div>

<div class="col"> 
<br>

<?=$cliente->email?>
<br>

<?=$cliente->peso?>

<?=$cliente->altura?>
</div>
<div class="col"> 

<br> 

<?=$cliente->mae?>

<?=date('d/m/Y', strtotime($cliente->dt_nascimento));?>
</div>
<div class="col"> 

<?=$cliente->pai?>
<br>
<br>
</div>
<div class="col"> 

<?=$cliente->endereco?>

<?=$cliente->celular?>

<?=$cliente->telefone?>
</div>
 <div class="col"> 
 <br>
 <br>
 <br>


<?=$cliente->proximo?>
</div>
<div class="col">
<br>

   
<?=$cliente->tel_proximo?>


<?=$cliente->cel_proximo?>
</div>
<div class="col"> 
<?=$cliente->observacao?>
</div>

<br><br>

<a href='consulta.php' class="btn btn-danger">Voltar</a>

<?php endif; ?>

<?php endif; ?>

    </div>
</div>
    <script type="text/javascript" src="js/custom.js"></script>

   
</div>
</body>

</html>