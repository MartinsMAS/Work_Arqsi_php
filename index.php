<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="pt" xmlns="http://www.w3.org/1999/xhtml" lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Book Info</title>
		<script type="text/javascript" src="Scripts/script.js"></script>
                <script type="text/javascript" src="Scripts/ajaxgetCat.js"></script>
                <script type="text/javascript" src="Scripts/ajaxgetLivro.js"></script>
                <script type="text/javascript" src="Scripts/ajaxgetNLivros.js"></script>

                
                <link rel="stylesheet" type="text/css" href="CSS/widget.css" />
    </head>
    <body onload=init();>
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
			<div id="paging" class="paging">
			
			</div>
			
			<div id="help" class="help">
				<a href="">
					<img src="img/question.png" width="25" height="25" />&nbsp;&nbsp;&nbsp;
				</a>
			</div>
		</div>
			
			
		
    </body>
</html>
