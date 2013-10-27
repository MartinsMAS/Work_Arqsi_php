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

        $livros = new DOMDocument();
        $editorasElem = $livros->createElement("editoras");
        $livros->appendChild($editorasElem);
        foreach ($this->editoras AS $editora) {

            $elem = $livros->createElement("editora");
            $elem->setAttribute("name", $editora->getNome());
            $editorasElem->appendChild($elem);

            $link = $editora->getLink() . "?numero=$n";
            $dadosEditora = $livros->load($link);
            $elem->appendChild($dadosEditora);
        }
        $temp = $livros->saveXML();
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

}

?>
