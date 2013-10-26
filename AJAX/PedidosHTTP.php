<?php
include '../DADOS/Dal.php';

if(isset($_GET['idPedido'])){
    analisarPedido();
}else{
    echo'<resultado>pedido invalido</resultado>';
}

function analisarPedido(){
    $idPedido = $_GET['idPedido'];
    
    switch ($idPedido){
       case 1:
           getTodasCategorias();
           break;
       default:
           echo'<resultado>pedido invalido</resultado>';
   }
}

function  getTodasCategorias(){
    $dal = new Dal();
    $xmlReturn = $dal->getTodasCategorias();
    $categorias = $xmlReturn->getElementsByTagName('categoria');
    $str = "";
    $i = 0;
    foreach ($categorias AS $categoria){
        $str = $str .  $categoria->nodeValue;
        $i += 1;
        if($categorias->length > $i){
            $str = $str . ",";
        }
    }
    echo $str;
    
}
    

?>
