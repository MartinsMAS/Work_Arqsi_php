<?php

include '../DADOS/Dal.php';
error_reporting(0);

define('RETURN_DEFAULT', "<?xml version='1.0' encoding='utf-8'?><resultado>pedido invalido</resultado>");

if (isset($_GET['idPedido'])) {
    analisarPedido();
} else {
    echo RETURN_DEFAULT;
}

function analisarPedido() {
    $idPedido = $_GET['idPedido'];

    switch ($idPedido) {
        case 1:
            getTodasCategorias();
            break;
        case 2:
            getDadosLivro();
            break;
        case 3:
            getDadosNLivros();
            break;
        case 5:
            getLivrosPorCategoria();
            break;
        case 6:
            getNomesEditoras();
            break;
        case 7:
            getSinopsePorIsbn();
            break;
        default:
            echo RETURN_DEFAULT;
    }
}

function getTodasCategorias() {
    $dal = new Dal();
    $xmlReturn = $dal->getTodasCategorias();
    $categorias = $xmlReturn->getElementsByTagName('categoria');
    $str = "";
    $i = 0;
    foreach ($categorias AS $categoria) {
        $str = $str . $categoria->nodeValue;
        $i += 1;
        if ($categorias->length > $i) {
            $str = $str . ",";
        }
    }
    echo $str;
}

function getDadosLivro() {
    header("Content-Type: text/xml; charset=iso-8859-1");
    if (isset($_GET['titulo'])) {
        $dal = new Dal();
        $strXML = $dal->getDadosLivro($_GET['titulo']);
        if ($strXML) {
            $dal->insereRegistoPedido($_SERVER['REQUEST_URI']);
            echo $strXML;
        } else {
            echo RETURN_DEFAULT;
        }
    } else {
        echo RETURN_DEFAULT;
    }
}

function getDadosNLivros() {
    header("Content-Type: text/xml; charset=iso-8859-1");
    if (isset($_GET['numero'])) {
        $dal = new Dal();
        $editoras = $dal->getEditoras();

        $xmlDoc = new DOMDocument();

        $tagRoot = $xmlDoc->createElement("editoras");
        $xmlDoc->appendChild($tagRoot);

        $arrLinksImg = array();

        foreach ($editoras AS $editora) {

            $tagEditora = $xmlDoc->createElement("editora");
            $tagEditora->setAttribute("name", $editora->getNome());
            $tagRoot->appendChild($tagEditora);

            $htmlRequest = new DOMDocument();
            $strRequest = $dal->getDadosNLivros($_GET['numero']);
            $htmlRequest->loadHTML($strRequest);
            $strFromHtml = $htmlRequest->saveXML();
            $xmlResult = new DOMDocument();
            $xmlResult->loadXML($strFromHtml, LIBXML_NOWARNING);

            $nosLivros = $xmlResult->getElementsByTagName("book");
            foreach ($nosLivros AS $livro) {
                // criar a nova tag book e inserir dentro da editora
                $newTagBook = $xmlDoc->createElement("book");
                $tagEditora->appendChild($newTagBook);

                $childsBook = $livro->childNodes;
                $isbn;
                foreach ($childsBook AS $child) {
                    $tagName = $child->nodeName;
                    switch ($tagName) {
                        case 'title':
                            $node = $xmlDoc->createElement("title");
                            $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                            $node->appendChild($nodeText);
                            $newTagBook->appendChild($node);
                            break;
                        case 'author':
                            $node = $xmlDoc->createElement("author");
                            $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                            $node->appendChild($nodeText);
                            $newTagBook->appendChild($node);
                            break;
                        case 'category':
                            $node = $xmlDoc->createElement("category");
                            $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                            $node->appendChild($nodeText);
                            $newTagBook->appendChild($node);
                            break;
                        case 'isbn':
                            $node = $xmlDoc->createElement("isbn");
                            $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                            $node->appendChild($nodeText);
                            $newTagBook->appendChild($node);
                            $isbn = $child->nodeValue; // A usar no request da imagem e sinopse
                            break;
                        case 'publicacao':
                            $node = $xmlDoc->createElement("publicacao");
                            $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                            $node->appendChild($nodeText);
                            $newTagBook->appendChild($node);
                            break;
                        case 'news':
                            $node = $xmlDoc->createElement("news");
                            $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                            $node->appendChild($nodeText);
                            $newTagBook->appendChild($node);
                            break;
                    }
                }
                // Acrescentar link para imagem
                $test = $arrLinksImg[$isbn];
                if ($test != null) {
                    $linkImg = $arrLinksImg[$isbn];
                    if ($linkImg) {
                        $tagLinkImg = $xmlDoc->createElement("cover");
                        $tagTxtNodeLinkImg = $xmlDoc->createTextNode($linkImg);
                        $tagLinkImg->appendChild($tagTxtNodeLinkImg);
                        $newTagBook->appendChild($tagLinkImg);
                    }
                } else {
                    $linkImg = $dal->getUrlImgLivro($isbn);
                    if ($linkImg) {
                        $tagLinkImg = $xmlDoc->createElement("cover");
                        $tagTxtNodeLinkImg = $xmlDoc->createTextNode($linkImg);
                        $tagLinkImg->appendChild($tagTxtNodeLinkImg);
                        $newTagBook->appendChild($tagLinkImg);
                        $arrLinksImg[$isbn] = $linkImg;
                    }else{
                        $arrLinksImg[$isbn] = "Imagem indisponivel";
                    }
                }
            }
        }
        $dal->insereRegistoPedido($_SERVER['REQUEST_URI']);
        echo $xmlDoc->saveXML();
    } else {
        echo RETURN_DEFAULT;
    }

    /*
      $dal = new Dal();
      if (isset($_GET['numero'])) {
      $load = $dal->getDadosNLivros($_GET['numero']);
      $dal->insereRegistoPedido($_SERVER['REQUEST_URI']);
      echo $load;
      } else {
      echo RETURN_DEFAULT;
      }
     * 
     */
}

function getNomesEditoras() {
    $dal = new Dal();
    echo $dal->getNomesEditoras();
}

function getLivrosPorCategoria() {
    header("Content-Type: text/xml; charset=iso-8859-1");

    if (isset($_GET['categoria'])) {
        $dal = new Dal();
        $editoras = $dal->getEditoras();

        $xmlDoc = new DOMDocument();

        $tagRoot = $xmlDoc->createElement("editoras");
        $xmlDoc->appendChild($tagRoot);

        foreach ($editoras AS $editora) {
            if ($editora->getMetodo() == "xml") {

                $tagEditora = $xmlDoc->createElement("editora");
                $tagEditora->setAttribute("name", $editora->getNome());
                $tagRoot->appendChild($tagEditora);

                $htmlRequest = new DOMDocument();
                $strRequest = $dal->getLivrosPorCategoria($editora->getLink(), $_GET['categoria']);
                $htmlRequest->loadHTML($strRequest);
                $strFromHtml = $htmlRequest->saveXML();
                $xmlResult = new DOMDocument();
                $xmlResult->loadXML($strFromHtml, LIBXML_NOWARNING);

                $nosLivros = $xmlResult->getElementsByTagName("book");
                foreach ($nosLivros AS $livro) {
                    // criar a nova tag book e inserir dentro da editora
                    $newTagBook = $xmlDoc->createElement("book");
                    $tagEditora->appendChild($newTagBook);

                    $childsBook = $livro->childNodes;
                    foreach ($childsBook AS $child) {
                        $tagName = $child->nodeName;
                        switch ($tagName) {
                            case 'title':
                                $node = $xmlDoc->createElement("title");
                                $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                                $node->appendChild($nodeText);
                                $newTagBook->appendChild($node);
                                break;
                            case 'author':
                                $node = $xmlDoc->createElement("author");
                                $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                                $node->appendChild($nodeText);
                                $newTagBook->appendChild($node);
                                break;
                            case 'category':
                                $node = $xmlDoc->createElement("category");
                                $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                                $node->appendChild($nodeText);
                                $newTagBook->appendChild($node);
                                break;
                            case 'isbn':
                                $node = $xmlDoc->createElement("isbn");
                                $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                                $node->appendChild($nodeText);
                                $newTagBook->appendChild($node);
                                $isbn = $child->nodeValue; // A usar no request da imagem e sinopse
                                break;
                            case 'publicacao':
                                $node = $xmlDoc->createElement("publicacao");
                                $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                                $node->appendChild($nodeText);
                                $newTagBook->appendChild($node);
                                break;
                            case 'news':
                                $node = $xmlDoc->createElement("news");
                                $nodeText = $xmlDoc->createTextNode($child->nodeValue);
                                $node->appendChild($nodeText);
                                $newTagBook->appendChild($node);
                                break;
                        }
                    }
                    // Acrescentar link para imagem
                    $linkImg = $dal->getUrlImgLivro($isbn);
                    if ($linkImg) {
                        $tagLinkImg = $xmlDoc->createElement("cover");
                        $tagTxtNodeLinkImg = $xmlDoc->createTextNode($linkImg);
                        $tagLinkImg->appendChild($tagTxtNodeLinkImg);
                        $newTagBook->appendChild($tagLinkImg);
                    }
                }
            } else {
                try {
                    // Metodo de imporatção por json
                    $tagEditora = $xmlDoc->createElement("editora");
                    $tagEditora->setAttribute("name", $editora->getNome());
                    $tagRoot->appendChild($tagEditora);
                    $txtJson = $dal->getLivrosPorCategoria($editora->getLink(), $_GET['categoria']);
                    $objJson = json_decode($txtJson);

                    $arrBooks = $objJson->books;

                    foreach ($arrBooks AS $book) {
                        $newTagBook = $xmlDoc->createElement("book");

                        $node = $xmlDoc->createElement("title");
                        $nodeText = $xmlDoc->createTextNode($book->title);
                        $node->appendChild($nodeText);
                        $newTagBook->appendChild($node);

                        $node = $xmlDoc->createElement("author");
                        $nodeText = $xmlDoc->createTextNode($book->author);
                        $node->appendChild($nodeText);
                        $newTagBook->appendChild($node);

                        $node = $xmlDoc->createElement("category");
                        $nodeText = $xmlDoc->createTextNode($book->category);
                        $node->appendChild($nodeText);
                        $newTagBook->appendChild($node);

                        $node = $xmlDoc->createElement("isbn");
                        $nodeText = $xmlDoc->createTextNode($book->isbn);
                        $node->appendChild($nodeText);
                        $newTagBook->appendChild($node);
                        $isbn = $book->isbn;

                        $node = $xmlDoc->createElement("publicacao");
                        $nodeText = $xmlDoc->createTextNode($book->publicacao);
                        $node->appendChild($nodeText);
                        $newTagBook->appendChild($node);

                        $node = $xmlDoc->createElement("news");
                        $nodeText = $xmlDoc->createTextNode($book->news);
                        $node->appendChild($nodeText);
                        $newTagBook->appendChild($node);

                        // Acrescentar link para imagem
                        $linkImg = $dal->getUrlImgLivro($isbn);
                        if ($linkImg) {
                            $tagLinkImg = $xmlDoc->createElement("cover");
                            $tagTxtNodeLinkImg = $xmlDoc->createTextNode($linkImg);
                            $tagLinkImg->appendChild($tagTxtNodeLinkImg);
                            $newTagBook->appendChild($tagLinkImg);
                        }

                        $tagEditora->appendChild($newTagBook);
                    }
                } catch (Exception $e) {
                    // Caso levante a excepção não carrega a informação da editora
                }
            }
        }

        $dal->insereRegistoPedido($_SERVER['REQUEST_URI']);
        $teste = $xmlDoc->saveXML();
        echo $xmlDoc->saveXML();
    } else {
        echo RETURN_DEFAULT;
    }
}

function getSinopsePorIsbn() {
    if (isset($_GET['isbn'])) {
        $dal = new Dal();
        $strSinopse = $dal->getSinopseLivro($_GET['isbn']);
        if ($strSinopse) {
            echo $strSinopse;
        } else {
            return RETURN_DEFAULT;
        }
    } else {
        echo RETURN_DEFAULT;
    }
}

?>
