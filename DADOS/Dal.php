<?php

class Dal {
    /* Array com todos os endereços das editoras */

    private $editoras;

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    /* Retorna todas as categorias sem repetições TESTADO */

    public function getTodasCategorias() {

        if (!$this->editoras) {
            $this->carregaEditoras();
        }
        $vetCategorias = array();
        foreach ($this->editoras AS $editora) {
            $CatByEd = $this->getCategoriasEditora($editora . "?categoria=todas");
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
            $livro = new DOMDocument();
            $linkEditora = $editora->getLink() . "?titulo=$titulo";
            $livro->load($linkEditora);
            $noInit = $livro->childNodes->item(0)->nodeValue;
            if ($noInit != 'vazio' && $noInit != null && $noInit != 'invalido') {
                return $livro->saveXML();
            }
        }
        return false;
    }

    public function getDadosNLivros($n) {
        if (!$this->editoras) {
            $this->carregaEditoras();
        }
        /*
          $livros = "<?xml version=\"1.0\"?><editoras>";
          foreach ($this->editoras AS $editora){
          $nomeEditora = $editora->getNome();
          $livros = $livros . "<editora name=" . $nomeEditora . ">";

          $link = $editora->getLink() . "?numero=$n";
          $resEditora = file_get_contents($link);
          $livros = $livros . $resEditora;

          $livros = $livros . "</editora>";
          }

          $livros = $livros . "</editoras>";

          return $livros;
         */

        $livros = new DOMDocument();
        $editorasElem = $livros->createElement("editoras");
        $livros->appendChild($editorasElem);

        foreach ($this->editoras AS $editora) {
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
        $temp = $livros->saveXML();
        echo '';
//echo $livros->saveXML();
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
        include 'MODELO/Editora.php';
        $fxml = 'DADOS/editoras.xml';
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

}

?>
