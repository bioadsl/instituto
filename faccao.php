
<?php


ini_set("display_errors", "0");
error_reporting(E_ALL);

require 'conexao.php';
require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente o administrador pode ter acesso a esta página.
// O administrador é o primeiro usuário cadastrado, ou seja, o usuário com id = 1
// Protege a página
require_once('protege.php');
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
$sql = "SELECT count(id_pedido) as total_registros from tb_pedido  where  situacao <> 'Reservado'  and  situacao <> 'Entregue' ";
$stm = $conexao->prepare($sql);
$stm->execute();
$stm->bindValue(':total_registros', $total_registros);
$total = $stm->fetchAll(PDO::FETCH_OBJ);


// $conexao = conexao::getInstance();
// $sql = 'SELECT remessa from tb_pedido';
// $stm = $conexao->prepare($sql);
// $stm->execute();
// //$stm->bindValue(':remessas', $remessas);
// $remessa = $stm->fetchAll(PDO::FETCH_OBJ)

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_p from tb_pedido where tamanho_pedido LIKE '%P%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_p = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_p1 from tb_pedido where tamanho_pedido LIKE '%P%' and id_produto='001' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_p1 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_p2 from tb_pedido where tamanho_pedido LIKE '%P%' and id_produto='002' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_p2 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_p3 from tb_pedido where tamanho_pedido LIKE '%P%' and id_produto='003' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_p3 = $stm->fetchAll(PDO::FETCH_OBJ);

//=================================================================================================================

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_m from tb_pedido where tamanho_pedido LIKE '%M%' and situacao <> 'Reservado' and situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_m = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_m1 from tb_pedido where tamanho_pedido LIKE '%M%' and id_produto='001' and situacao <> 'Reservado' and situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_m1 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_m2 from tb_pedido where tamanho_pedido LIKE '%M%' and id_produto='002' and situacao <> 'Reservado' and situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_m2 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_m3 from tb_pedido where tamanho_pedido LIKE '%M%' and id_produto='003' and situacao <> 'Reservado' and situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_m3 = $stm->fetchAll(PDO::FETCH_OBJ);

//=================================================================================================================

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_g from tb_pedido where tamanho_pedido LIKE '%G%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_g = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_g1 from tb_pedido where tamanho_pedido LIKE '%G%' and id_produto='001' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_g1 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_g2 from tb_pedido where tamanho_pedido LIKE '%G%' and id_produto='002' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_g2 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_g3 from tb_pedido where tamanho_pedido LIKE '%G%' and id_produto='003' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_g3 = $stm->fetchAll(PDO::FETCH_OBJ);

//=================================================================================================================

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_xg from tb_pedido where tamanho_pedido LIKE '%XG%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_xg = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_xg1 from tb_pedido where tamanho_pedido LIKE '%XG%' and id_produto='001' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_xg1 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_xg2 from tb_pedido where tamanho_pedido LIKE '%XG%' and id_produto='002' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_xg2 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_xg3 from tb_pedido where tamanho_pedido LIKE '%XG%' and id_produto='003' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_xg3 = $stm->fetchAll(PDO::FETCH_OBJ);

//=================================================================================================================

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_12 from tb_pedido where tamanho_pedido LIKE '%12%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_12 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_12_1 from tb_pedido where tamanho_pedido LIKE '%12%' and id_produto='001' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_12_1 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_12_2 from tb_pedido where tamanho_pedido LIKE '%12%' and id_produto='002' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_12_2 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_12_3 from tb_pedido where tamanho_pedido LIKE '%12%' and id_produto='003' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_12_3 = $stm->fetchAll(PDO::FETCH_OBJ);

//=================================================================================================================

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_10 from tb_pedido where tamanho_pedido LIKE '%10%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_10 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_10_1 from tb_pedido where tamanho_pedido LIKE '%10%' and id_produto='001' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_10_1 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_10_2 from tb_pedido where tamanho_pedido LIKE '%10%' and id_produto='002' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_10_2 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_10_3 from tb_pedido where tamanho_pedido LIKE '%10%' and id_produto='003' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_10_3 = $stm->fetchAll(PDO::FETCH_OBJ);

//=================================================================================================================

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_8 from tb_pedido where tamanho_pedido LIKE '%8%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_8 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_8_1 from tb_pedido where tamanho_pedido LIKE '%8%' and id_produto='001' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_8_1 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_8_2 from tb_pedido where tamanho_pedido LIKE '%8%' and id_produto='002' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_8_2 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_8_3 from tb_pedido where tamanho_pedido LIKE '%8%' and id_produto='003' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_8_3 = $stm->fetchAll(PDO::FETCH_OBJ);

//=================================================================================================================

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_6 from tb_pedido where tamanho_pedido LIKE '%6%' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_6 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_6_1 from tb_pedido where tamanho_pedido LIKE '%6%' and id_produto='001' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_6_1 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_6_2 from tb_pedido where tamanho_pedido LIKE '%6%' and id_produto='002' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_6_2 = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao = conexao::getInstance();
$sql = "SELECT count(tamanho_pedido) as total_6_3 from tb_pedido where tamanho_pedido LIKE '%6%' and id_produto='003' and situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
$total_6_3 = $stm->fetchAll(PDO::FETCH_OBJ);

//=================================================================================================================




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
            <h1>Facção</h1>
        </div>
    </div>
    <hr>

    <div class="container-fluid">

       
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
                                            <th class="col-sm-auto" scope="col">Tamanho/Total</th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 001 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 002 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 003 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                               
                                        <tr class="table-responsive" '> 
                                        
                                            <td class="col-sm-auto"> P  = 
                                                <?php foreach ($total_p as $t_p): ?> 
                                                 <?=$t_p->total_p;?> 
                                                <?php endforeach; ?>
                                            </td> 
                                                <?php foreach ($total_p1 as $t_p1): ?> 
                                                    <td class="col-sm-auto"> <?=$t_p1->total_p1;?> </td>
                                                <?php endforeach; ?>

                                                <?php foreach ($total_p2 as $t_p2): ?> 
                                                    <td class="col-sm-auto"> <?=$t_p2->total_p2;?> </td>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($total_p3 as $t_p3): ?> 
                                                    <td class="col-sm-auto"> <?=$t_p3->total_p3;?> </td>
                                                <?php endforeach; ?>
                                        </tr>
                                         
                                    </tbody>      
                            </table>
                                       
                  
                            <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho/Total</th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 001 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 002 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 003 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                               
                                        <tr class="table-responsive" '> 
                                        
                                            <td class="col-sm-auto"> M  = 
                                                <?php foreach ($total_m as $t_m): ?> 
                                                 <?=$t_m->total_m;?> 
                                                <?php endforeach; ?>
                                            </td> 
                                                <?php foreach ($total_m1 as $t_m1): ?> 
                                                    <td class="col-sm-auto"> <?=$t_m1->total_m1;?> </td>
                                                <?php endforeach; ?>

                                                <?php foreach ($total_m2 as $t_m2): ?> 
                                                    <td class="col-sm-auto"> <?=$t_m2->total_m2;?> </td>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($total_m3 as $t_m3): ?> 
                                                    <td class="col-sm-auto"> <?=$t_m3->total_m3;?> </td>
                                                <?php endforeach; ?>
                                        </tr>
                                         
                                    </tbody>      
                            </table>


                            <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho/Total</th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 001 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 002 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 003 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                               
                                        <tr class="table-responsive" '> 
                                        
                                            <td class="col-sm-auto"> G  = 
                                                <?php foreach ($total_g as $t_g): ?> 
                                                 <?=$t_g->total_g;?> 
                                                <?php endforeach; ?>
                                            </td> 
                                                <?php foreach ($total_g1 as $t_g1): ?> 
                                                    <td class="col-sm-auto"> <?=$t_g1->total_g1;?> </td>
                                                <?php endforeach; ?>

                                                <?php foreach ($total_g2 as $t_g2): ?> 
                                                    <td class="col-sm-auto"> <?=$t_g2->total_g2;?> </td>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($total_g3 as $t_g3): ?> 
                                                    <td class="col-sm-auto"> <?=$t_g3->total_g3;?> </td>
                                                <?php endforeach; ?>
                                        </tr>
                                         
                                    </tbody>      
                            </table>


                            <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho/Total</th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 001 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 002 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 003 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                               
                                        <tr class="table-responsive" '> 
                                        
                                            <td class="col-sm-auto"> XG  = 
                                                <?php foreach ($total_xg as $t_xg): ?> 
                                                 <?=$t_xg->total_xg;?> 
                                                <?php endforeach; ?>
                                            </td> 
                                                <?php foreach ($total_xg1 as $t_xg1): ?> 
                                                    <td class="col-sm-auto"> <?=$t_xg1->total_xg1;?> </td>
                                                <?php endforeach; ?>

                                                <?php foreach ($total_xg2 as $t_xg2): ?> 
                                                    <td class="col-sm-auto"> <?=$t_xg2->total_xg2;?> </td>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($total_xg3 as $t_xg3): ?> 
                                                    <td class="col-sm-auto"> <?=$t_xg3->total_xg3;?> </td>
                                                <?php endforeach; ?>
                                        </tr>
                                         
                                    </tbody>      
                            </table>

                            <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho/Total</th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 001 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 002 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 003 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                               
                                        <tr class="table-responsive" '> 
                                        
                                            <td class="col-sm-auto"> 12 Anos  = 
                                                <?php foreach ($total_12 as $t_12): ?> 
                                                 <?=$t_12->total_12;?> 
                                                <?php endforeach; ?>
                                            </td> 
                                                <?php foreach ($total_12_1 as $t_12_1): ?> 
                                                    <td class="col-sm-auto"> <?=$t_12_1->total_12_1;?> </td>
                                                <?php endforeach; ?>

                                                <?php foreach ($total_12_2 as $t_12_2): ?> 
                                                    <td class="col-sm-auto"> <?=$t_12_2->total_12_2;?> </td>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($total_12_3 as $t_12_3): ?> 
                                                    <td class="col-sm-auto"> <?=$t_12_3->total_12_3;?> </td>
                                                <?php endforeach; ?>
                                        </tr>
                                         
                                    </tbody>      
                            </table>

                            <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho/Total</th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 001 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 002 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 003 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                               
                                        <tr class="table-responsive" '> 
                                        
                                            <td class="col-sm-auto"> 10 Anos  = 
                                                <?php foreach ($total_10 as $t_10): ?> 
                                                 <?=$t_10->total_10;?> 
                                                <?php endforeach; ?>
                                            </td> 
                                                <?php foreach ($total_10_1 as $t_10_1): ?> 
                                                    <td class="col-sm-auto"> <?=$t_10_1->total_10_1;?> </td>
                                                <?php endforeach; ?>

                                                <?php foreach ($total_10_2 as $t_10_2): ?> 
                                                    <td class="col-sm-auto"> <?=$t_10_2->total_10_2;?> </td>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($total_12_3 as $t_12_3): ?> 
                                                    <td class="col-sm-auto"> <?=$t_10_3->total_10_3;?> </td>
                                                <?php endforeach; ?>
                                        </tr>
                                         
                                    </tbody>      
                            </table>

                            <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho/Total</th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 001 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 002 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 003 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                               
                                        <tr class="table-responsive" '> 
                                        
                                            <td class="col-sm-auto"> 8 Anos  = 
                                                <?php foreach ($total_8 as $t_8): ?> 
                                                 <?=$t_8->total_8;?> 
                                                <?php endforeach; ?>
                                            </td> 
                                                <?php foreach ($total_8_1 as $t_8_1): ?> 
                                                    <td class="col-sm-auto"> <?=$t_8_1->total_8_1;?> </td>
                                                <?php endforeach; ?>

                                                <?php foreach ($total_8_2 as $t_8_2): ?> 
                                                    <td class="col-sm-auto"> <?=$t_8_2->total_8_2;?> </td>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($total_8_3 as $t_8_3): ?> 
                                                    <td class="col-sm-auto"> <?=$t_8_3->total_8_3;?> </td>
                                                <?php endforeach; ?>
                                        </tr>
                                         
                                    </tbody>      
                            </table>


                            <table class="table table-hover able-responsive-sm" id="tabela" >
                                    <thead>
                                        <tr class='active'>
                                            <th class="col-sm-auto" scope="col">Tamanho/Total</th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 001 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 002 </th>
                                            <th class="col-sm-auto" scope="col">Subtotal Cod 003 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                               
                                        <tr class="table-responsive" '> 
                                        
                                            <td class="col-sm-auto"> 6 Anos  = 
                                                <?php foreach ($total_6 as $t_6): ?> 
                                                 <?=$t_6->total_6;?> 
                                                <?php endforeach; ?>
                                            </td> 
                                                <?php foreach ($total_6_1 as $t_6_1): ?> 
                                                    <td class="col-sm-auto"> <?=$t_6_1->total_6_1;?> </td>
                                                <?php endforeach; ?>

                                                <?php foreach ($total_6_2 as $t_6_2): ?> 
                                                    <td class="col-sm-auto"> <?=$t_6_2->total_6_2;?> </td>
                                                <?php endforeach; ?>
                                                
                                                <?php foreach ($total_6_3 as $t_6_3): ?> 
                                                    <td class="col-sm-auto"> <?=$t_6_3->total_6_3;?> </td>
                                                <?php endforeach; ?>
                                        </tr>
                                         
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