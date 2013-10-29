<?php

include '../DADOS/Dal.php';


define('RETURN_DEFAULT', "<?xml version='1.0' encoding='utf-8'?><resultado>pedido invalido</resultado>");

if (isset($_GET['idPedido'])) {
    analisarPedido();
} else {
    echo RETURN_DEFAULT;
}

function analisarPedido() {
    $idPedido = $_GET['idPedido'];

    switch ($idPedido) {
        case 1:
            getTodasCategorias();
            break;
        case 2:
            getDadosLivro();
            break;
        case 3:
            getDadosNLivros();
            break;
        case 6:
            getNomesEditoras();
            break;
        default:
            echo RETURN_DEFAULT;
    }
}

function getTodasCategorias() {
    $dal = new Dal();
    $xmlReturn = $dal->getTodasCategorias();
    $categorias = $xmlReturn->getElementsByTagName('categoria');
    $str = "";
    $i = 0;
    foreach ($categorias AS $categoria) {
        $str = $str . $categoria->nodeValue;
        $i += 1;
        if ($categorias->length > $i) {
            $str = $str . ",";
        }
    }
    echo $str;
}

function getDadosLivro() {
    header("Content-Type: text/xml; charset=iso-8859-1");
    if (isset($_GET['titulo'])) {
        $dal = new Dal();
        if ($strXML = $dal->getDadosLivro($_GET['titulo'])) {

            echo $strXML;
        } else {
            echo RETURN_DEFAULT;
        }
    } else {
        echo RETURN_DEFAULT;
    }
}

function getDadosNLivros() {
    $dal = new Dal();
    if (isset($_GET['numero'])){
        $load = $dal->getDadosNLivros($_GET['numero']);
        echo $load;
    }else{
        echo RETURN_DEFAULT;
    }
}

function getNomesEditoras(){
    $dal = new Dal();
    echo $dal->getNomesEditoras();
}

?>
