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
		<h2 class="titulo"><img src="img/logo.jpg" width="50" height="50" /> Book Info</h2>
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
	
			<!--<select size="1" name="sFreguesias" id="sFreguesias" onChange=alerta(); >
			</select>-->	
			
			To Have this Widget in your page:<br>
			&lt;iframe width=&#34;560&#34; height=&#34;315&#34; src=&#34;//www.youtube.com/embed/bpOSxM0rNPM&#34; frameborder=&#34;0&#34; allowfullscreen &gt;
&lt;/iframe&gt;
			
			<br><br><br><br>
			
			<table width="374" height="79" border="0" cellspacing="3">
				<tr>
					<td width="51" rowspan="3"><span class="titulo"><img src="img/logo.jpg" alt="" width="50" height="50" /></span></td>
					<td height="27" colspan="2" align="center" valign="middle"><strong style="font-family: Verdana, Geneva, sans-serif; font-size: 14px; color: #00F; font-weight: bold; text-align: center;"><span class="titulo"> Titulo do Livro </span></strong></td>
				</tr>
				<tr>
					<td width="135" height="24" style="font-family: Verdana, Geneva, sans-serif; font-size: 10px;"><span style="font-family: Verdana, Geneva, sans-serif; font-size: 11px;">Categoria:</span> Romance</td>
					<td width="170" style="text-align: right; font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Autor: Fernando Pessoa</td>
				</tr>
				<tr>
					<td height="14" colspan="2" align="center" valign="bottom" style="font-family: 'Courier New', Courier, monospace; font-size: 9px; text-align: center;">Para mais info, carregue na capa do livro</td>
				</tr>
			</table>
			
			<br><br><br><br>
			
			<div id="meteraquitabela">
			
			</div>
			
			<a href=""><img src="img/question.jpg" width="25" height="25" /></a>
		</form>
    </body>
</html>
