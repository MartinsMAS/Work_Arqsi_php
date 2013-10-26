<?php

class Livro {

    private $titulo;
    private $autor;
    private $categoria;
    private $isbn;
    private $publicacao;
    private $novidade;

    function __construct($srtXml) {
        $xmlDom = new DOMDocument();
        $xmlDom->loadXML($srtXml);
        
        $this->titulo = $xmlDom->getElementsByTagName('title')->item(0)->nodeValue;
        $this->autor = $xmlDom->getElementsByTagName('author')->item(0)->nodeValue;
        $this->categoria = $xmlDom->getElementsByTagName('category')->item(0)->nodeValue;
        $this->isbn = $xmlDom->getElementsByTagName('isbn')->item(0)->nodeValue;
        $this->publicacao = $xmlDom->getElementsByTagName('publicacao')->item(0)->nodeValue;
        $nov = $xmlDom->getElementsByTagName('news')->item(0)->nodeValue;
        if ($nov == 'sim'){
            $this->novidade = true;
        }else{
            $this->novidade = false;
        }
        
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
