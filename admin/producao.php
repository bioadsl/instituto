
<?php


ini_set("display_errors", "0");
error_reporting(E_ALL);

require 'conexao.php';
require_once('class/db.class.php');
//require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente o administrador pode ter acesso a esta página.
// O administrador é o primeiro usuário cadastrado, ou seja, o usuário com id = 1
// Protege a página
//require_once('protege.php');
///////////////////

// $usuario_sessao = new usuario();
// $no_sessao_usuario = $usuario_sessao->usuarioInfo($_SESSION['idusuario']);

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

if (@$_SESSION['idusuario'] != 1)
    header('Location: login.php');


$usuario = new usuario();
$data = $usuario->todosPedidosInfo();


$conexao = conexao::getInstance();
$sql = "SELECT count(quantidade) as total_registros from tb_pedido WHERE situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$stm->bindValue(':total_registros', $total_registros);
$total = $stm->fetchAll(PDO::FETCH_OBJ);








// // Recebe o termo de pesquisa se existir
// $termo = (isset($_POST['termo'])) ? $_POST['termo'] : '';

// // Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
// if (empty($termo)):

// // $rmdate = date('m-Y');
// // $conexao = conexao::getInstance();
// // $sql = 'SELECT * from tb_pedido where remessa like $rmdate or like :remessa';
// // $stm = $conexao->prepare($sql);
// // $stm->execute();
// // $stm->bindValue(':remessa', $termo.'%');
// // $remessa = $stm->fetchAll(PDO::FETCH_OBJ)




// else:


$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_p from tb_pedido where tamanho_pedido LIKE '%P%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':ttp', $ttp);
$total_p = $stm->fetchAll(PDO::FETCH_OBJ);



$conexao = conexao::getInstance();
$sql = "SELECT * from tb_pedido where tamanho_pedido LIKE '%P%'   AND  situacao <> 'Reservado'  and  situacao <> 'Entregue' order by id_produto";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':pd_p', $pd_p);
$pedido_p = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_m from tb_pedido where tamanho_pedido LIKE '%M%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':ttm', $ttm);
$total_m = $stm->fetchAll(PDO::FETCH_OBJ);


$conexao = conexao::getInstance();
$sql = "SELECT * from tb_pedido where tamanho_pedido LIKE '%M%'  AND  situacao <> 'Reservado'  and  situacao <> 'Entregue' order by id_produto";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':pd_p', $pd_p);
$pedido_m = $stm->fetchAll(PDO::FETCH_OBJ);



$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_g from tb_pedido where tamanho_pedido LIKE '%G%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':ttg', $ttg);
$total_g = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT * from tb_pedido where tamanho_pedido LIKE '%G%'  AND  situacao <> 'Reservado'  and  situacao <> 'Entregue' order by id_produto";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':pd_p', $pd_p);
$pedido_g = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_xg from tb_pedido where tamanho_pedido LIKE '%XG%' ";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':ttxg', $ttxg);
$total_xg = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT * from tb_pedido where tamanho_pedido LIKE '%XG%' order by id_produto";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':pd_p', $pd_p);
$pedido_xg = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_12 from tb_pedido where tamanho_pedido LIKE '%12%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':tt12anos', $tt12);
$total_12 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT * from tb_pedido where tamanho_pedido LIKE '%12%'  and situacao <> 'Reservado'  and  situacao <> 'Entregue' order by id_produto";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':pd_p', $pd_p);
$pedido_12 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_10 from tb_pedido where tamanho_pedido LIKE '%10%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':tt10anos', $tt10);
$total_10 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT * from tb_pedido where tamanho_pedido LIKE '%10%' and situacao <> 'Reservado'  and  situacao <> 'Entregue' order by id_produto";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':pd_p', $pd_p);
$pedido_10 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_8 from tb_pedido where tamanho_pedido LIKE '%8%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':tt8anos', $tt8);
$total_8 = $stm->fetchAll(PDO::FETCH_OBJ);
 
$conexao = conexao::getInstance();
$sql = "SELECT * from tb_pedido where tamanho_pedido LIKE '%8%' and situacao <> 'Reservado'  and  situacao <> 'Entregue' order by id_produto";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':pd_p', $pd_p);
$pedido_8 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_6 from tb_pedido where tamanho_pedido LIKE '%6%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':tt8anos', $tt8);
$total_6 = $stm->fetchAll(PDO::FETCH_OBJ);
 
$conexao = conexao::getInstance();
$sql = "SELECT * from tb_pedido where tamanho_pedido LIKE '%6%' and situacao <> 'Reservado'  and  situacao <> 'Entregue' order by id_produto";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':pd_p', $pd_p);
$pedido_6 = $stm->fetchAll(PDO::FETCH_OBJ);

    

//endif;



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedidos</title>

<style>
.container {
    
    
.form-contact {
  width: 100%;
  font-family: "Arial", Times, serif;
}

.form-contact-input {
  width: 100%;
  color: #292929;
  font-size: 18px;
  background-color: #E9E9E9;
  border: 1px solid #E9E9E9;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  height: 40px;
  margin-bottom: 20px;
  border-bottom: 1px solid #ccc;
  border-left: 1px solid #ccc;
  text-indent: 20px;
}

.form-contact-textarea {
  width: 100%;
  color: #292929;
  font-size: 18px;
  background-color: #E9E9E9;
  border: 1px solid #E9E9E9;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  height: 200px;
  margin-bottom: 20px;
  border-bottom: 1px solid #ccc;
  border-left: 1px solid #ccc;
  text-indent: 20px;
  padding-top: 16px;
  padding-left: 0;
  padding-right: 0;
  font-family: "Arial", Times, serif;
}

.form-contact-button {
  width: 100%;
  font-size: 18px;
  border-radius: 4px;
  color: #fff;
  height: 40px;
  opacity: .8;
  margin-bottom: 20px;
  cursor: pointer;
  background: #B22222;
  display: block;
  border: none;
  border-bottom: 1px solid #500707;
  border-right: 1px solid #500707;
  transition: 1s;
}

.form-contact-button:hover {
  opacity: 1;
}


.img{
    border-radius: 0;
}


 .border-radius-none{
    border-radius: 0;
} 

</style>


    </head>

    <div class="row">
        <div class="col-lg-4">
            <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS' style="margin-left:100px;">
        </div>
        <div class="col-lg-8" style="margin-top: 30px;">
            <h1>Pedidos de camisetas</h1>
        </div>
    </div>
    <hr>

    <div class="container-fluid">

    <!-- <form action="/index.php?pagina=producao" method="post" id='form-contato' class="form-horizontal col-md-10">
											<div class="row">
												<div class="col-lg-6">
													<div class="input-group">
													<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome a Remessa">
													<span class="input-group-btn">
														<button type="submit" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
													</div>
													</span>
												</div>
											</div>
										</form> -->

    <div class="row">   
            <?php if(!empty($data)):?>
                 <?php foreach($remessa as $rm):?>
                    <div class="col-sm-4">
                         <p style="font-size: 30px;"><b>Remessa:<?=$rm->remessa;?></b></p></div> 
                    <?php endforeach; ?>


                    <?php foreach($total as $ttl):?>
                     <div class="col-sm-4">
                            <p style="font-size: 30px;">Total de pedidos:<?=$ttl->total_registros;?></p></div> 
                            <div class="col-sm-4">
                        <p style="font-size: 30px;">Qdt. de malha:<?=$ttl->total_registros/4;?> Kg</p></div>
                    <?php endforeach; ?>
                   
             </div>     
                       
                 <div id="divConteudo">
                        <table class="table table-hover able-responsive-sm" id="tabela" >
                            <thead>
                                <tr class='active'>
                                    <th class="col-sm-auto" scope="col">Tamanho</th>
                                    <th class="col-sm-auto" scope="col">Total</th>
                                    <th class="col-sm-auto" scope="col">Produto</th>
                                    <th class="col-sm-auto" scope="col">Nome</th>
                                    <th class="col-sm-auto" scope="col">QDT</th>
                                </tr>

                            </thead>
                                <tbody>
                          
                                    <?php foreach ($total_p as $t_p):?>
                                    <?php endforeach; ?>
                                    
                                    
                                         <tr class="table-responsive" '> 
                                        
                                        <td class="col-sm-auto" rowspan='<?=$t_p->total_p?>'>P </td>
                                        <td class="col-sm-auto"rowspan='<?=$t_p->total_p?>'><?=$t_p->total_p?> </td>
                                        
                                        <?php foreach ($pedido_p as $p): ?> 
                                        <td class="col-sm-auto"><?=$p->id_produto?></td> 
                                        <td class="col-sm-auto"><?=$p->nome_pedido?></td>
                                        <td class="col-sm-auto"><?=$p->quantidade?></td>
                                        <?php 
                                            for ($x = 5; $x <= $t_p->total_p; $x++) { 
                                                echo "<td colspan='<?=$t_p->total_p?>' ></td>";
                                            } ?>

                                        
                                        </tr>
                                        <?php endforeach; ?> 
                                </tbody>      
                        </table>

                                <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho</th>
                                            <th class="col-sm-auto" scope="col">Total</th>
                                            <th class="col-sm-auto" scope="col">Produto</th>
                                            <th class="col-sm-auto" scope="col">Nome</th>
                                            <th class="col-sm-auto" scope="col">QDT</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                               <?php foreach ($total_m as $t_m):?>
                                                     <?php endforeach; ?>
                                            
                                            
                                                <tr class="table-responsive"> 
                                                
                                                <td class="col-sm-auto" rowspan='<?=$t_m->total_m;?>'>M</td>
                                                <td class="col-sm-auto" rowspan='<?=$t_m->total_m;?>'><?=$t_m->total_m;?></td>
                                                
                                                <?php foreach ($pedido_m as $m): ?> 
                                                <td class="col-sm-auto"><?=$m->id_produto;?></td>  
                                                <td class="col-sm-auto"><?=$m->nome_pedido;?></td>
                                                <td class="col-sm-auto"><?=$m->quantidade;?></td>

                                                <?php 
                                                    for ($x = $t_m->total_m + 1; $x <= $t_m->total_m; $x++) { 
                                                        echo "<td colspan='<?=$t_m->total_m;?>' ></td>";   
                                                    } ?>
                                                
                                                
                                                </tr>
                                                <?php endforeach; ?> 
                                        </tbody> 
                                 </table>
                                        
                                    <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho</th>
                                            <th class="col-sm-auto" scope="col">Total</th>
                                            <th class="col-sm-auto" scope="col">Produto</th>
                                            <th class="col-sm-auto" scope="col">Nome</th>
                                            <th class="col-sm-auto" scope="col">QDT</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php foreach ($total_g as $t_g):?>
                                     <?php endforeach; ?>
                                    
                                    
                                         <tr class="table-responsive" '> 
                                        
                                        <td class="col-sm-auto" rowspan='<?=$t_g->total_g;?>'>G </td>
                                        <td class="col-sm-auto"rowspan='<?=$t_g->total_g;?>'><?=$t_g->total_g;?> </td>
                                        
                                        <?php foreach ($pedido_g as $g): ?> 
                                        <td class="col-sm-auto"><?=$g->id_produto;?></td>  
                                        <td class="col-sm-auto"><?=$g->nome_pedido;?></td>
                                        <td class="col-sm-auto"><?=$g->quantidade?></td>
                                        <?php 
                                            for ($x = 5; $x <= $t_g->total_g; $x++) { 
                                                echo "<td colspan='<?=$t_g->total_g;?>'></td>";
                                            } ?>

                                        
                                        </tr>
                                        <?php endforeach; ?> 
                        
                                        </tbody> 
                                        
                                        

                                        <?php foreach ($total_xg as $t_xg):?>
                                    <?php endforeach; ?>
                                    
                                  </table>
                                       
                                  
                                  
                                <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                        <th class="col-sm-auto" scope="col">Tamanho</th>
                                        <th class="col-sm-auto" scope="col">Total</th>
                                        <th class="col-sm-auto" scope="col">Produto</th>
                                        <th class="col-sm-auto" scope="col">Nome</th>
                                        <th class="col-sm-auto" scope="col">QDT</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    
                                         <tr class="table-responsive" '> 
                                        
                                        <td class="col-sm-auto" rowspan='<?=$t_xg->total_xg;?>'>XG </td>
                                        <td class="col-sm-auto"rowspan='<?=$t_xg->total_xg;?>'><?=$t_xg->total_xg;?> </td>
                                        
                                        <?php foreach ($pedido_xg as $xg): ?> 
                                        <td class="col-sm-auto"><?=$xg->id_produto;?></td> 
                                        <td class="col-sm-auto"><?=$xg->nome_pedido;?></td>
                                        <td class="col-sm-auto"><?=$xg->quantidade?></td>
                                        <?php 
                                         for ($x = 5; $x <= $t_xg->total_xg; $x++) { 
                                          echo "<td colspan='<?=$t_xg->total_xg;?>'></td>";
                                            } ?>

                                        
                                        </tr>
                                        <?php endforeach; ?> 
                        
                                        </tbody> 
                         </table>
                                        
                           <table class="table table-hover able-responsive-sm" id="tabela" >
                           <thead>
                                <tr class='active'>
                                    <th class="col-sm-auto" scope="col">Tamanho</th>
                                    <th class="col-sm-auto" scope="col">Total</th>
                                    <th class="col-sm-auto" scope="col">Produto</th>
                                    <th class="col-sm-auto" scope="col">Nome</th>
                                    <th class="col-sm-auto" scope="col">QDT</th>
                                </tr>

                            </thead>
                                    <tbody> 
                                        <?php foreach ($total_12 as $t_12):?>
                                    <?php endforeach; ?>
                                    
                                    
                                         <tr class="table-responsive" '> 
                                        
                                        <td class="col-sm-auto" rowspan='<?=$t_12->total_12;?>'>12 Anos </td>
                                        <td class="col-sm-auto"rowspan='<?=$t_12->total_12;?>'><?=$t_12->total_12;?> </td>
                                        
                                        <?php foreach ($pedido_12 as $a12): ?> 
                                        <td class="col-sm-auto"><?=$a12->id_produto;?></td>     
                                        <td class="col-sm-auto"><?=$a12->nome_pedido;?></td>
                                        <td class="col-sm-auto"><?=$a12->quantidade?></td>
                                        <?php 
                                          for ($x = 5; $x <= $t_12->total_12; $x++) { 
                                          echo "<td colspan='<?=$t_12->total_12;?>'></td>";
                                            } ?>

                                        
                                        </tr>
                                        <?php endforeach; ?> 
                                        </tbody> 
                                        </table>
                                        
                        

                                        <table class="table table-hover able-responsive-sm" id="tabela" >
                            <thead>
                            <thead>
                                <tr class='active'>
                                    <th class="col-sm-auto" scope="col">Tamanho</th>
                                    <th class="col-sm-auto" scope="col">Total</th>
                                    <th class="col-sm-auto" scope="col">Produto</th>
                                    <th class="col-sm-auto" scope="col">Nome</th>
                                    <th class="col-sm-auto" scope="col">QDT</th>
                                </tr>

                            </thead>
                                    <tbody> 
                                        <?php foreach ($total_10 as $t_10):?>
                                    <?php endforeach; ?>
                                    
                                    
                                         <tr class="table-responsive" '> 
                                        
                                        <td class="col-sm-auto" rowspan='<?=$t_10->total_10;?>'>10 Anos </td>
                                        <td class="col-sm-auto"rowspan='<?=$t_10->total_10;?>'><?=$t_10->total_10;?> </td>
                                        
                                        <?php foreach ($pedido_10 as $a10): ?> 
                                        <td class="col-sm-auto"><?=$a10->id_produto;?></td> 
                                        <td class="col-sm-auto"><?=$a10->nome_pedido;?></td>
                                        <td class="col-sm-auto"><?=$a10->quantidade?></td>
                                        <?php 
                                          for ($x = $t_10->total_10 + 1; $x <= $t_10->total_10; $x++) { 
                                          echo "<td colspan='<?=$t_12->total_12;?>'></td>";
                                            } ?>

                                        
                                        </tr>
                                        <?php endforeach; ?> 
                                        </tbody> 
                                        </table>


                                <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho</th>
                                            <th class="col-sm-auto" scope="col">Total</th>
                                            <th class="col-sm-auto" scope="col">Produto</th>
                                            <th class="col-sm-auto" scope="col">Nome</th>
                                            <th class="col-sm-auto" scope="col">QDT</th>
                                        </tr>

                                    </thead>
                                    <tbody> 
                                        <?php foreach ($total_8 as $t_8):?>
                                    <?php endforeach; ?>
                                    
                                         <tr class="table-responsive" '> 
                                        
                                        <td class="col-sm-auto" rowspan='<?=$t_8->total_8;?>'>8 Anos </td>
                                        <td class="col-sm-auto"rowspan='<?=$t_8->total_8;?>'><?=$t_8->total_8;?> </td>
                                        
                                        <?php foreach ($pedido_8 as $a8): ?> 
                                            <td class="col-sm-auto"><?=$a8->id_produto;?></td>  
                                            <td class="col-sm-auto"><?=$a8->nome_pedido;?></td>
                                            <td class="col-sm-auto"><?=$a8->quantidade?></td>
                                        <?php 
                                            for ($x = 5; $x <= $t_8->total_8; $x++) { 
                                            echo "<td colspan='<?=$t_8->total_8;?>' ></td>";
                                            } ?>

                                        
                                        </tr>
                                        <?php endforeach; ?> 
                                        </tbody> 
                            </table>
                        

                             <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho</th>
                                            <th class="col-sm-auto" scope="col">Total</th>
                                            <th class="col-sm-auto" scope="col">Produto</th>
                                            <th class="col-sm-auto" scope="col">Nome</th>
                                            <th class="col-sm-auto" scope="col">QDT</th>
                                        </tr>

                                    </thead>
                                    <tbody> 
                                        <?php foreach ($total_6 as $t_6):?>
                                    <?php endforeach; ?>
                                    
                                    
                                         <tr class="table-responsive" '> 
                                        
                                        <td class="col-sm-auto" rowspan='<?=$t_6->total_6;?>'>6 Anos </td>
                                        <td class="col-sm-auto"rowspan='<?=$t_6->total_6;?>'><?=$t_6->total_6;?> </td>
                                        
                                        <?php foreach ($pedido_6 as $a6): ?> 
                                            <td class="col-sm-auto"><?=$a6->id_produto;?></td>     
                                            <td class="col-sm-auto"><?=$a6->nome_pedido;?></td>
                                            <td class="col-sm-auto"><?=$a6->quantidade?></td>
                                        <?php 
                                            for ($x = 5; $x <= $t_6->total_6; $x++) { 
                                            echo "<td colspan='<?=$t_6->total_6;?>'></td>";
                                            } ?>

                                        
                                        </tr>
                                        <?php endforeach; ?> 
                                        </tbody> 
                                        

   
                        
                                </table>

            </div>
                                <?php  endif; ?>
                                            
                                            <script type="text/javascript">
                                            var elems = document.getElementsByClassName('confirmacao');
                                            var confirmIt = function (e) {
                                            if (!confirm('Tem certeza ?')) 
                                                e.preventDefault();
                                            };
                                            for (var i = 0, l = elems.length; i < l; i++) {
                                                elems[i].addEventListener('click', confirmIt, false);
                                            }
                                            </script>

                                <script>
                                $(function(){
                                    $("#tabela input").keyup(function(){       
                                        var index = $(this).parent().index();
                                        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
                                        var valor = $(this).val().toUpperCase();
                                        $("#tabela tbody tr").show();
                                        $(nth).each(function(){
                                            if($(this).text().toUpperCase().indexOf(valor) < 0){
                                                $(this).parent().hide();
                                            }
                                        });
                                    });
                                
                                    $("#tabela input").blur(function(){
                                        $(this).val("");
                                    });
                                });


                                </script>      
       
        </div>


</html>