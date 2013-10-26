<?php

class Dal {
    /* Array com todos os endereços das editoras */

    private $editoras;

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    /* Retorna todas as categorias sem repetições TESTADO*/

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
        foreach($vetCategorias AS $categoria){
            $newnd = $xmlReturn->createElement('categoria', $categoria);
            $newnode->appendChild($newnd);
        }
        return $xmlReturn;
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
        $this->editoras = new ArrayIterator();
        /*
          $fxml = 'DADOS/editoras.xml';
          if (file_exists($fxml)) {
          $xmlProp = new DOMDocument();
          $xmlProp->load($fxml);
          } else {
          return false;
          }
          $root = $xmlProp->getElementsByTagName('editoras');
          $editoras = $root->item(0)->childNodes;
          foreach ($editoras AS $editora) {
          $nome = $editora->item(0)->nodeValue;
          $link = $editora->item(1)->nodeValue;
          $this->editoras[] = new Editora($nome, $link);
          }

         */
        $this->editoras->append("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php");
        $this->editoras->append("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora2.php");
    }

}

?>
