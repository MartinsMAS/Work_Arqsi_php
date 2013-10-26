<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
        include './MODELO/Livro.php';
        $xmlLivro = file_get_contents("http://phpdev2.dei.isep.ipp.pt/~arqsi/trabalho1/editora1.php?titulo=Ficciones");
        $livro = new Livro($xmlLivro);
        
        echo $livro->getAutor();
        echo $livro->getCategoria();
        echo $livro->getIsbn();
        echo $livro->getPublicacao();
        echo $livro->getNovidade();
        */
        
        
        
        
   
        include './DADOS/Dal.php';
        
        $dal = new Dal();
        
        $dal->getTodasCategorias();
  
        ?>
    </body>
</html>
