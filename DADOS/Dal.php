<?php

error_reporting(0);

class Dal {
    /* Array com todos os endereços das editoras */

    private $editoras;
    // Acesso à base de dados
    private $servername = 'localhost';
    private $dbname = 'i111417';
    private $username = 'i111417';
    private $pass = '218300';
    private $conn;

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    public function getEditoras() {
        if (!$this->editoras) {
            $this->carregaEditoras();
        }

        return $this->editoras;
    }

    public function getNomesEditoras() {

        if (!$this->editoras) {
            $this->carregaEditoras();
        }
        $strReturn = "";
        $i = 0;
        $len = sizeof($this->editoras);
        foreach ($this->editoras AS $editora) {
            $strReturn = $strReturn . $editora->getNome();
            $i++;
            if ($i < $len) {
                $strReturn = $strReturn . ",";
            }
        }
        return $strReturn;
    }

    /* Retorna todas as categorias sem repetições TESTADO */

    public function getTodasCategorias() {

        if (!$this->editoras) {
            $this->carregaEditoras();
        }
        $vetCategorias = array();
        foreach ($this->editoras AS $editora) {
            $CatByEd = $this->getCategoriasEditora($editora->getLink() . "?categoria=todas");
            foreach ($CatByEd AS $Cat) {
                if (!in_array($Cat, $vetCategorias)) {
                    $vetCategorias[] = $Cat;
                }
            }
        }
        /* Reconstrução do XML a retornar */
        $xmlReturn = new DOMDocument();
        $newnode = $xmlReturn->createElement('categorias');
        $xmlReturn->appendChild($newnode);
        foreach ($vetCategorias AS $categoria) {
            $newnd = $xmlReturn->createElement('categoria', $categoria);
            $newnode->appendChild($newnd);
        }
        return $xmlReturn;
    }

    /* Função que retorna dados de um livro */

    public function getDadosLivro($titulo) {
        if (!$this->editoras) {
            $this->carregaEditoras();
        }
        $titulo = str_replace(" ", "+", $titulo);
        /* Ciclo que pesquisa em todas as editoras se encontra o livro, na primeira que encontre retorna o conteudo do livro. Se não encontra em nenhuma retorna falso */
        foreach ($this->editoras AS $editora)
            if ($editora->getMetodo() == "json") {
                try {
                    $livro = new DOMDocument();
                    $linkEditora = $editora->getLink() . "?titulo=$titulo";
                    $txtJson = file_get_contents($linkEditora);
                    $objJson = json_decode($txtJson);
                    if ($objJson == null) {
                        continue;
                    }

                    //Criação do xml de retorno
                    $livro = new DOMDocument();

                    $tagBook = $livro->createElement("book");

                    $tagTitle = $livro->createElement("title");
                    $txtNodeTitle = $livro->createTextNode($objJson->book[0]->title);
                    $tagTitle->appendChild($txtNodeTitle);
                    $tagBook->appendChild($tagTitle);

                    $tagAuthor = $livro->createElement("author");
                    $txtNodeAuthor = $livro->createTextNode($objJson->book[0]->author);
                    $tagAuthor->appendChild($txtNodeAuthor);
                    $tagBook->appendChild($tagAuthor);

                    $tagCategory = $livro->createElement("category");
                    $txtNodeCategory = $livro->createTextNode($objJson->book[0]->category);
                    $tagCategory->appendChild($txtNodeCategory);
                    $tagBook->appendChild($tagCategory);

                    $tagIsbn = $livro->createElement("isbn");
                    $txtNodeIsbn = $livro->createTextNode($objJson->book[0]->isbn);
                    $tagIsbn->appendChild($txtNodeIsbn);
                    $tagBook->appendChild($tagIsbn);
                    $isbn = $objJson->book[0]->isbn;

                    $tagPublicacao = $livro->createElement("publicacao");
                    $txtNodePublicacao = $livro->createTextNode($objJson->book[0]->publicacao);
                    $tagPublicacao->appendChild($txtNodePublicacao);
                    $tagBook->appendChild($tagPublicacao);

                    $tagNews = $livro->createElement("news");
                    $txtNodeNews = $livro->createTextNode($objJson->book[0]->news);
                    $tagNews->appendChild($txtNodeNews);
                    $tagBook->appendChild($tagNews);

                    // Acrescentar o link da capa do livro ao XML
                    $linkCover = $this->getUrlImgLivro($isbn);
                    if ($linkCover) {
                        $nodeLinkImg = $livro->createElement("cover");
                        $nodeTxtLinkImg = $livro->createTextNode($linkCover);
                        $nodeLinkImg->appendChild($nodeTxtLinkImg);
                        $tagBook->appendChild($nodeLinkImg);
                    }

                    // Acrescentar a sinopse ao XML
                    $strSinopse = $this->getSinopseLivro($isbn);
                    if ($strSinopse) {
                        $nodeSinopse = $livro->createElement("sinopse");
                        $nodeTxtSinopse = $livro->createTextNode($strSinopse);
                        $nodeSinopse->appendChild($nodeTxtSinopse);
                        $tagBook->appendChild($nodeSinopse);
                    }

                    $livro->appendChild($tagBook);
                    return $livro->saveXML();
                } catch (Exception $e) {
                    return false;
                }
            } else {
                try {
                    $livro = new DOMDocument();
                    $linkEditora = $editora->getLink() . "?titulo=$titulo";
                    // $linkFinal = urlencode($linkEditora);
                    $html = file_get_contents($linkEditora);
                    $livro->loadHTML($html);

                    if ($livro->textContent == "vazio") {
                        continue;
                    }

                    $isbn = $livro->getElementsByTagName("isbn")->item(0)->textContent;
                    // Acrescentar o link da capa do livro ao XML
                    $linkCover = $this->getUrlImgLivro($isbn);
                    if ($linkCover) {
                        $nodeBook = $livro->getElementsByTagName("book")->item(0);
                        $nodeLinkImg = $livro->createElement("cover");
                        $nodeTxtLinkImg = $livro->createTextNode($linkCover);
                        $nodeLinkImg->appendChild($nodeTxtLinkImg);
                        $nodeBook->appendChild($nodeLinkImg);
                    }

                    // Acrescentar a sinopse ao XML
                    $strSinopse = $this->getSinopseLivro($isbn);
                    if ($strSinopse) {
                        $nodeBook = $livro->getElementsByTagName("book")->item(0);
                        $nodeSinopse = $livro->createElement("sinopse");
                        $nodeTxtSinopse = $livro->createTextNode($strSinopse);
                        $nodeSinopse->appendChild($nodeTxtSinopse);
                        $nodeBook->appendChild($nodeSinopse);
                    }
                    if ($livro->getElementsByTagName("book")->item(0)) {
                        return $livro->saveXML();
                    }
                } catch (Exception $e) {
                    continue;
                }
            }
        return false;
    }

    public function getDadosNLivros($n) {

        if (!$this->editoras) {
            $this->carregaEditoras();
        }

        $strFinal = "<editoras>";
        foreach ($this->editoras AS $editora) {
            if ($editora->getMetodo() == "json") {
                continue; // Ignora editoras que retornam json
            }
            $nomeEditora = $editora->getNome();
            $strFinal = $strFinal . "<editora name=\"" . $nomeEditora . "\">";
            $link = $editora->getLink() . "?numero=$n";
            $load = file_get_contents($link);
            $strFinal = $strFinal . $load;
            $strFinal = $strFinal . "</editora>";
        }
        $strFinal = $strFinal . "</editoras>";
        return $strFinal;
    }

    /* Metodo que retorna todas as categorias de uma editora TESTADO */

    private function getCategoriasEditora($linkEditora) {
        $vetCategorias = array();
        $xmlCat = new DOMDocument();
        $xmlCat->load($linkEditora);
        if ($xmlCat->textContent != "") {
            $categorias = $xmlCat->getElementsByTagName('categorias')->item(0)->childNodes;
            foreach ($categorias AS $categoria) {
                $textCat = $categoria->nodeValue;
                $vetCategorias[] = $textCat;
            }
            return $vetCategorias;
        } else {
            try {
                $txtJson = file_get_contents($linkEditora);
                $objJson = json_decode($txtJson);
                $categorias = $objJson->categorys;
                foreach ($categorias AS $categoria) {
                    $vetCategorias[] = $categoria->category;
                }
                return $vetCategorias;
            } catch (Exception $e) {
                return false;
            }
        }
    }

    /* Carrega array de editoras */

    private function carregaEditoras() {
        $this->editoras = array();
        include '../MODELO/Editora.php';
        $fxml = '../DADOS/editoras.xml';
        if (file_exists($fxml)) {
            $xmlProp = new DOMDocument();
            $xmlProp->load($fxml);
        } else {
            return false;
        }
        $editoras = $xmlProp->getElementsByTagName('editora');
        foreach ($editoras AS $editora) {
            $nome = $editora->childNodes->item(0)->nodeValue;
            $link = $editora->childNodes->item(1)->nodeValue;
            $metodo = $editora->childNodes->item(2)->nodeValue;
            $obj;
            $this->editoras[] = new Editora($nome, $link, $metodo);
        }
    }

    public function getLivrosPorCategoria($linkEditora, $categoria) {
        $strRequest = file_get_contents($linkEditora . "?categoria=" . $categoria);
        return $strRequest;
    }

    public function getUrlImgLivro($isbn) {
        $ini_array = parse_ini_file("../propriedades.ini");
        $strConfig = $ini_array['api'];
        if ($strConfig == "goodreads") {
            if ($isbn) {
                $xml = $this->getXmlByIsbn($isbn);
                $urlImg = $xml->getElementsByTagName("image_url")->item(0)->nodeValue;
                if ($urlImg) {
                    if ($urlImg == "https://www.goodreads.com/assets/nocover/111x148.png") {
                        return false;
                    } else {
                        return $urlImg;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } elseif ($strConfig == "google") {
            if ($isbn) {
                $arrJson = $this->getArrayJsonByIsbn($isbn);
                $linkImg = $arrJson['items'][0]['volumeInfo']['imageLinks']['thumbnail'];
                if ($linkImg) {
                    return $linkImg;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function getSinopseLivro($isbn) {
        $ini_array = parse_ini_file("../propriedades.ini");
        $strConfig = $ini_array['api'];
        if ($strConfig == "goodreads") {
            if ($isbn) {
                $xml = $this->getXmlByIsbn($isbn);
                $urlSin = $xml->getElementsByTagName("description")->item(0)->nodeValue;
                if ($urlSin) {
                    return $urlSin;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } elseif ($strConfig == "google") {
            $arrJson = $this->getArrayJsonByIsbn($isbn);
            $sinJson = $arrJson['items'][0]['volumeInfo']['description'];
            if ($sinJson) {
                return $sinJson;
            } else {
                return false;
            }
        }
    }

    private function getArrayJsonByIsbn($isbn) {
        $link = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn . "&key=AIzaSyATOCr1deBCf9xY_2JDp7U1UXb_l1X4LSA";
        $txtJson = file_get_contents($link);
        $arrJson = json_decode($txtJson, true);
        return $arrJson;
    }

    private function getXmlByIsbn($isbn) {
        $link = "https://www.goodreads.com/book/isbn?format=xml&isbn=$isbn&key=edLS2N88gxC1P90Q8dUACw";
        $xml = new DOMDocument();
        $xml->load($link);
        return $xml;
    }

    /* BASE DE DADOS PHPDEV2 */

    function db_connect() {

        if (!$this->conn) {
            $this->conn = mysql_connect($this->servername, $this->username, $this->pass);
            if (!$this->conn) {
                return false;
            } else {
                return true;
            }
        }
    }

    function db_selectDbName() {
        if (!mysql_select_db($this->dbname, $this->conn)) {
            return false;
        } else {
            return true;
        }
    }

    function db_close() {
        mysql_close();
    }

    //TESTE
    function insereRegistoPedido($url) {
        $this->db_connect();
        $this->db_selectDbName();
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = date("H:i:s");
        $sql = "INSERT INTO Registo_Pedidos (url, time, ip) VALUES ('$url', '$time', '$ip')";
        mysql_query($sql, $this->conn);
        $this->db_close();

        //CONTINUAR AQUI
    }

}

?>
