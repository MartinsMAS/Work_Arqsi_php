<?php

class Editora {

    private $nome;
    private $link;

    function __construct($nome, $link) {
        $this->nome = $nome;
        $this->link = $link;
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

}

?>
