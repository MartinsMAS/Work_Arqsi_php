<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="pt" xmlns="http://www.w3.org/1999/xhtml" lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Book Info</title>


            <!-- Add jQuery library -->
            <script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>

            <!-- Add fancyBox main JS and CSS files -->
            <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
            <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
            <link rel="stylesheet" type="text/css" href="CSS/fancybox.css" />

            <script type="text/javascript" src="Scripts/script.js"></script>
            <script type="text/javascript" src="Scripts/ajaxgetCat.js"></script>
            <script type="text/javascript" src="Scripts/ajaxgetLivro.js"></script>
            <script type="text/javascript" src="Scripts/ajaxgetNLivros.js"></script>
            <script type="text/javascript" src="Scripts/ajaxgetNomesEditoras.js"></script>
            <script type="text/javascript" src="Scripts/ajaxgetLivrosPorCategoria.js"></script>
            <script type="text/javascript" src="Scripts/generateRDF.js"></script>
            <script type="text/javascript" src="Scripts/fancybox.script.index.js"></script>

            <link rel="stylesheet" type="text/css" href="CSS/widget.css" />

    </head>
    <body onload=inicializar();>
        <div id="top" class="top">
            <div id="tituloWidget" class="tituloWidget">
                <h2 class="titulo"><img class="logotipo" src="img/logo.png" /> Book Info</h2>
            </div>

            <div id="methodChosses" class="formChosses">
                <form method="get" action="*">
                    <table class="tabelaCategorias">
                        <tr>
                            <td class="categorias" id="metodoEscolha">Método de Seleção: 
                                <select size="1" name="comboSelect" id="comboSelect" onChange=inicializar();>
                                    <option selected="selected" value="none">------</option>
                                    <option value="editora">Editora</option>
                                    <option value="categoria">Categoria</option>
                                </select>
                            </td>
                        </tr>
                    </table>					
                </form>
            </div>

            <div id="secondMenu" class="secondMenu">

            </div>
        </div>



        <div id="middle" class="middle">

        </div>



        <div id="bottom" class="bottom">
            <table>
                <tr>
                    <td>
                        <div class="pagingContainer">
                            <div id="paging" class="paging">

                            </div>
                        </div>
                    </td>
                    <td>
                        <div id="help" class="help">
                            <a class="fancybox" href="#inline2" title="Informações Widget">
                                <img src="img/question.png" width="25" height="25"/>&nbsp;&nbsp;&nbsp;
                            </a>
                        </div>	
                    </td>
                </tr>
            </table>
            <div id="inline1" name="inline1" style="width:500px; height:500px; display: none;">

            </div>

            <div id="inline2" name="inline2" style="width:500px; height:500px; display:none;">
                <table width="480" border="0" cellspacing="3" cellpadding="3">
                    <tr>
                        <td><center><h1 style="color:blue">Info</h1></center></td>
                    </tr>
                    <tr>
                        <td>Para poder incorporar este widget na sua página basta copiar o código abaixo e colocar onde desejar</td>
                    </tr>
                    <tr>
                        <td><b>Incorporação Pequeno:</b> <span style="color:orange">&lsaquo;iframe src="http://phpdev2.dei.isep.ipp.pt/~i111121/ProjArqsi/index.php" width="450px" height="600px" scrolling="yes"&rsaquo;&lsaquo;/iframe&rsaquo;</span></td>
                    </tr>
                    <tr>
                        <td><b>Incorporação Grande:</b> <span style="color:orange">&lsaquo;iframe src="http://phpdev2.dei.isep.ipp.pt/~i111121/ProjArqsi/index.php" width="450px" height="840px" scrolling="yes"&rsaquo;&lsaquo;/iframe&rsaquo;</span></td>
                    </tr>
                    <tr>
                        <td><h3>Autores:</h3>
                            Márcio Martins - Nº 111417
                            <br>Ricardo Brandão - Nº 1111121
                        </td>
                    </tr>
                    <tr>
                        <td><h3>Agradecimentos:</h3>
                            <p>Criadores da <a href="http://fancybox.net/">FancyBox</a></td>
                    </tr>
                </table>
            </div>

        </div>

        <div id="divRDF" xmlns:ed="http://phpdev2.dei.isep.ipp.pt" style="display:none">
            <p><span property="ed:title">PS, I Love You</span></p>
            <p><span property="ed:author">Cecelia Ahern</span></p>
            <p><span property="ed:category">Drama</span></p>
            <p><span property="ed:isbn">9780007279364</span></p>
            <p><span property="ed:publicacao">2008</span></p>
        </div>




    </body>
</html>
