<?php

class Livro {

    private $titulo;
    private $autor;
    private $categoria;
    private $isbn;
    private $publicacao;
    private $novidade;

    function __construct($xmlBook) {
        $xml = new DOMDocument();
        $xml->load($xmlBook);

        $this->titulo = $xml->getElementsByTagName('title');
        $this->autor = $xml->getElementsByTagName('author');
        $this->categoria = $xml->getElementsByTagName('category');
        $this->isbn = $xml->getElementsByTagName('isbn');
        if ($xml->getElementsByTagName('news') == 'sim')
            $this->novidade = true;
        else
            $this->novidade = false;
    }

    function __destruct() {
        
    }

    /* get's e set's */

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function setPublicacao($publicacao) {
        $this->publicacao = $publicacao;
    }

    public function getPublicacao() {
        return $this->publicacao;
    }

    public function setNovidade($novidade) {
        $this->novidade = $novidade;
    }

    public function getNovidade() {
        return $this->novidade;
    }

}

?>
