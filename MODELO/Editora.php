<?php

class Editora {

    private $nome;
    private $link;
    private $metodo;

    function __construct($nome, $link, $metodo) {
        $this->nome = $nome;
        $this->link = $link;
        $this->metodo = $metodo;
    }

    function __destruct() {
        
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function getLink() {
        return $this->link;
    }
    
    public function getMetodo(){
        return $this->metodo;
    }
    

}

?>
