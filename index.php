<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="pt" xmlns="http://www.w3.org/1999/xhtml" lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Book Info</title>
		<script type="text/javascript" src="Scripts/script.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/widget.css" />
    </head>
    <body onload=loadCategorias()>
		<h2 class="titulo"><img src="img/logo.jpg" width="25" height="25" /> Book Info</h2>
		<form method="get" action="*">
			<br>
			<br>
			<p class="textEtiquetas">Categorias: 
			<select size="1" name="categorias" id="categorias" onChange=loadLivros(); >
				<option selected="selected" value="Porto">Porto</option>
                <option value="Lisboa">Lisboa</option>
                <option value="Braga">Braga</option>
                <option value="Viana">Viana do Castelo</option>
			</select></p>
	
			
			<div id="meteraquitabela">
			
			</div>
			
			<div id="rodape" class="rodape"><a href=""><img src="img/question.jpg" width="25" height="25" /></a></div>
		</form>
    </body>
</html>
