<?php

error_reporting(0);
include './Dal.php';
define('RETURN_DEFAULT', "pedido invalido");

$dal = new Dal();

if (isset($_GET['titulo'])) {
    try {
        $dal->db_connect();
        $dal->db_selectDbName();
        $recordset = $dal->getBookByTitle($_GET['titulo']);
        $record = mysql_fetch_array($recordset);
        $resulados = 1;
        $i = 0;
        while ($record) {
            $strJson = "{";
            $strJson .= "\"book\" : [\n
            { \"title\":\"" . $record["title"] . "\" , \"author\":\"" . $record["author"] . "\" , 
              \"category\":\"" . $record["category"] . "\" , \"isbn\":\"" . $record["isbn"] . "\" ,  
              \"publicacao\":\"" . $record["publicacao"] . "\" , \"news\":\"" . $record["news"] . "\"
            }";
            $i++;
            if ($i < $resulados) {
                $strJson .= ",";
            }
            $strJson .= "]\n}";

            $record = mysql_fetch_array($recordset);
        }

        $dal->db_close();
        echo $strJson;
    } catch (Exception $e) {
        echo RETURN_DEFAULT;
    }

    return;
}

if (isset($_GET['categoria'])) {
// Pedidos de todas as categorias da editora
    if ($_GET['categoria'] == "todas") {
        try {
            $dal->db_connect();
            $dal->db_selectDbName();

            $recordset = $dal->getAllCategory();
            $record = mysql_fetch_array($recordset);
            $resulados = mysql_num_rows($recordset);
            $i = 0;
            $strJson .= "{ \"categorys\" : [";
            while ($record) {
                $strJson .= "{ \"category\":\"" . $record["category"] . "\"}";
                $i++;
                if ($i < $resulados) {
                    $strJson .= ",";
                }
                $record = mysql_fetch_array($recordset);
            }
            $strJson .= "]}";
            $dal->db_close();
            echo $strJson;
        } catch (Exception $e) {
            echo RETURN_DEFAULT;
        }
    } else {
        try {
            $dal->db_connect();
            $dal->db_selectDbName();
            $recordset = $dal->getBookByCategory($_GET['categoria']);
            $resulados = mysql_num_rows($recordset);
            $record = mysql_fetch_array($recordset);
            $i = 0;
            $strJson = "{ \"books\" : [";
            while ($record) {
                $strJson .= "
            { \"title\":\"" . $record["title"] . "\" , \"author\":\"" . $record["author"] . "\" , 
              \"category\":\"" . $record["category"] . "\" , \"isbn\":\"" . $record["isbn"] . "\" ,  
              \"publicacao\":\"" . $record["publicacao"] . "\" , \"news\":\"" . $record["news"] . "\"
            }";
                $i++;
                if ($i < $resulados) {
                    $strJson .= ",";
                }
                $record = mysql_fetch_array($recordset);
            }
            $strJson .= "]\n}";
            $dal->db_close();
            echo $strJson;
        } catch (Exception $e) {
            
        }
    }


    return;
}
echo RETURN_DEFAULT;
?>
