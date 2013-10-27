<?php

include '../DADOS/Dal.php';
header("Content-Type: text/xml; charset=utf-8");

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
    if (isset($_GET['titulo'])) {
        $dal = new Dal();
        if ($strXML = $dal->getDadosLivro($_GET['titulo'])) {
            
            echo $strXML;
        }else{
            echo RETURN_DEFAULT;
        }
    } else {
        echo RETURN_DEFAULT;
    }
}

?>
