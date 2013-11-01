<?php

error_reporting(0);

class Dal {
    /* Array com todos os endereços das editoras */

    private $editoras;

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
        /* Ciclo que pesquisa em todas as editoras se encontra o livro, na primeira que encontre retorna o conteudo do livro. Se não encontra em nenhuma retorna falso */
        foreach ($this->editoras AS $editora) {
            try {
                $livro = new DOMDocument();
                $linkEditora = $editora->getLink() . "?titulo=$titulo";
                // $linkFinal = urlencode($linkEditora);
                $html = file_get_contents($linkEditora);
                $livro->loadHTML($html);

                $dal = new Dal();

                // Acrescentar o link da capa do livro ao XML
                $isbn = $livro->getElementsByTagName("isbn")->item(0)->nodeValue;

                $linkCover = $dal->getUrlImgLivro($isbn);
                if ($linkCover) {
                    $nodeBook = $livro->getElementsByTagName("book")->item(0);
                    $nodeLinkImg = $livro->createElement("cover");
                    $nodeTxtLinkImg = $livro->createTextNode($linkCover);
                    $nodeLinkImg->appendChild($nodeTxtLinkImg);
                    $nodeBook->appendChild($nodeLinkImg);
                }
                
                // Acrescentar a sinopse ao XML
                $strSinopse = $dal->getSinopseLivro($isbn);
               if($strSinopse){
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

        /*
          $livros = new DOMDocument();
          $editorasElem = $livros->createElement("editoras");
          $livros->appendChild($editorasElem);
         */
        $strFinal = "<editoras>";
        foreach ($this->editoras AS $editora) {
            $nomeEditora = $editora->getNome();
            $strFinal = $strFinal . "<editora name=" . $nomeEditora . ">";
            $link = $editora->getLink() . "?numero=$n";
            $load = file_get_contents($link);
            $strFinal = $strFinal . $load;
            $strFinal = $strFinal . "</editora>";

            /*
              // Colocação da tag editora com o seu nome
              $newTagEditora = $livros->createElement("editora");
              $newTagEditora->setAttribute("name", $editora->getNome());
              $editorasElem->appendChild($newTagEditora);

              $link = $editora->getLink() . "?numero=$n";
              $load = $load . file_get_contents($link);
              $loadHTML = new DOMDocument();
              $loadHTML->loadHTML($load);

              $tagBook = $loadHTML->getElementsByTagName("book");
              foreach ($tagBook AS $book) {

              // criar a nova tag book e inserir dentro da editora
              $newTagBook = $livros->createElement("book");
              $newTagEditora->appendChild($newTagBook);

              $childsBook = $book->childNodes;
              foreach ($childsBook AS $child) {
              $tagName = $child->nodeName;
              switch ($tagName) {
              case 'title':
              $node = $livros->createElement("title");
              $nodeText = $livros->createTextNode($child->nodeValue);
              $node->appendChild($nodeText);
              $newTagBook->appendChild($node);
              break;
              case 'author':
              $node = $livros->createElement("author");
              $nodeText = $livros->createTextNode($child->nodeValue);
              $node->appendChild($nodeText);
              $newTagBook->appendChild($node);
              break;
              case 'category':
              $node = $livros->createElement("category");
              $nodeText = $livros->createTextNode($child->nodeValue);
              $node->appendChild($nodeText);
              $newTagBook->appendChild($node);
              break;
              case 'isbn':
              $node = $livros->createElement("isbn");
              $nodeText = $livros->createTextNode($child->nodeValue);
              $node->appendChild($nodeText);
              $newTagBook->appendChild($node);
              break;
              case 'publicacao':
              $node = $livros->createElement("publicacao");
              $nodeText = $livros->createTextNode($child->nodeValue);
              $node->appendChild($nodeText);
              $newTagBook->appendChild($node);
              break;
              case 'news':
              $node = $livros->createElement("news");
              $nodeText = $livros->createTextNode($child->nodeValue);
              $node->appendChild($nodeText);
              $newTagBook->appendChild($node);
              break;
              }
              }
              }
              }
              //$retorno = $livros->saveXML();
              return $livros->saveHTML();
             * 
             */
        }
        $strFinal = $strFinal . "</editoras>";
        return $strFinal;
    }

    /* Metodo que retorna todas as categorias de uma editora TESTADO */

    private function getCategoriasEditora($linkEditora) {
        $vetCategorias = array();
        $xmlCat = new DOMDocument();
        $xmlCat->load($linkEditora);

        $categorias = $xmlCat->getElementsByTagName('categorias')->item(0)->childNodes;
        foreach ($categorias AS $categoria) {
            $textCat = $categoria->nodeValue;
            $vetCategorias[] = $textCat;
        }
        return $vetCategorias;
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
            $obj;
            $this->editoras[] = new Editora($nome, $link);
        }
    }

    public function getLivrosPorCategoria($linkEditora, $categoria) {
        $strRequest = file_get_contents($linkEditora . "?categoria=" . $categoria);
        return $strRequest;
    }

    public function getUrlImgLivro($isbn) {
        $arrJson = $this->getArrayJsonByIsbn($isbn);
        $linkImg = $arrJson['items'][0]['volumeInfo']['imageLinks']['smallThumbnail'];
        if ($linkImg) {
            return $linkImg;
        } else {
            return false;
        }
    }

    public function getSinopseLivro($isbn) {
        $arrJson = $this->getArrayJsonByIsbn($isbn);
        $sinJson = $arrJson['items'][0]['volumeInfo']['description'];
        if ($sinJson) {
            return $sinJson;
        } else {
            return false;
        }
    }

    private function getArrayJsonByIsbn($isbn) {
        $link = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn;
        $txtJson = file_get_contents($link);
        $arrJson = json_decode($txtJson, true);
        return $arrJson;
    }

}

?>
