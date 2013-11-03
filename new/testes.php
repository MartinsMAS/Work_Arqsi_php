<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="scriptTesteEditora3.js"></script>
        <script type="text/javascript">var titulo = "PS, I Love You";</script>
    </head>
    <body onload="MakeXMLHTTPCallLivrosPorTitulo(titulo);">
        <?php
        
        include './Dal.php';
/*
        $dal = new Dal();
        $dal->db_connect();
        $dal->db_selectDbName();
        $recordset = $dal->getBookByCategory("Software");
        $record = mysql_fetch_array($recordset);
        while ($record) {
            echo $record["title"] . " – " . $record["author"] . " - " . $record["isbn"] . "<br/>";
            $record = mysql_fetch_array($recordset);
        }
        $dal->db_close();
        echo '';
         * 
         */
        $teste = file_get_contents("http://localhost:65000/EditoraArqsi/editora3.php?categoria=Software");
        $json = json_decode($teste);
        echo '';
//$str = $dom->saveXML();

        echo '';
        ?>
    </body>
</html>
