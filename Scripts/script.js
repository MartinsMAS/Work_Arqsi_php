function init(){
    MakeXMLHTTPCallCategorias();
}

function loadCategorias(){
	//alert("Carreguei Categorias!!!!");
}

function inicializar(){
	var selectEscolha = document.getElementById("comboSelect");
	//var valorSelect = selectEscolha.options[selectEscolha.selectedIndex].text;
	
	if(selectEscolha.selectedIndex == '1'){
		createEditora();
		//loadLivros();
	}else if(selectEscolha.selectedIndex == '2'){
		createCategorias();
		//loadLivros();
	}
}
			
function loadLivros(){
	
	var ret = createTableBook();
	elementDiv = document.getElementById("middle");
	elementDiv.innerHTML=ret;
}

function createCategorias(){
	var write = "";
	
	write += "<div id=\"formChosses\" class=\"formChosses\">";			
	
	write += "<form method=\"get\" action=\"*\">";
	write += "<table class=\"tabelaCategorias\">";
	write += "<tr>";
	write += "<td class=\"categorias\" id=\"categorias\">Categorias: ";
	write += "<select size=\"1\" name=\"comboCategorias\" id=\"comboCategorias\" onChange=loadLivros();>";
	write += "<option selected=\"selected\" value=\"categorias\">categorias</option>";
	write += "<option value=\"categorias\">categorias</option>";
	write += "<option value=\"categorias\">categorias</option>";
	write += "<option value=\"categorias\">categorias</option>";
	write += "</select></td>";
	write += "<td class=\"showNResults\" id=\"showNResults\">Ver Apenas:";
	write += "<select size=\"1\" name=\"comboShowNResults\" id=\"comboShowNResults\" onChange=loadLivros();>";
	write += "<option selected=\"selected\" value=\"none\">--</option>";
	write += "<option value=\"5\">5</option>";
	write += "<option value=\"10\">10</option>";
	write += "<option value=\"25\">25</option>";
	write += "</select></td></tr></table></form>";
	
	write += "</div>";
			
	elementDiv = document.getElementById("secondMenu");
	elementDiv.innerHTML=write;		
}

function createEditora(){
	var write = "";
	
	write += "<div id=\"formChosses\" class=\"formChosses\">";
	
	write += "<form method=\"get\" action=\"*\">";
	write += "<table class=\"tabelaCategorias\">";
	write += "<tr>";
	write += "<td class=\"categorias\" id=\"categorias\">Categorias: ";
	write += "<select size=\"1\" name=\"comboEditoras\" id=\"comboEditoras\" onChange=loadLivros();>";
	write += "<option selected=\"selected\" value=\"editoras\">editoras</option>";
	write += "<option value=\"editoras\">editoras</option>";
	write += "<option value=\"editoras\">editoras</option>";
	write += "<option value=\"editoras\">editoras</option>";
	write += "</select></td>";
	write += "<td class=\"showNResults\" id=\"showNResults\">Por página:";
	write += "<input name=\"textSize\" id=\"textSize\" size=\"5\" type=\"text\" onChange=loadLivros(); />";
	write += "</td></tr></table></form>";
	
	write += "</div>";
			
	elementDiv = document.getElementById("secondMenu");
	elementDiv.innerHTML=write;		
}



function createTableBook(){
	
	var retorno = "";
	for(i=0;i<10;i++){
	
	retorno += "<div id=\"resultadoPesquisa\" class=\"resultadoPesquisa\">";
	retorno += "<div id=\"tabelaLivroDiv\" class=\"tabelaLivroDiv\">";
	
	retorno += "<table class=\"tabelaLivros\">";
	retorno += "<tr>";
	retorno += "<td class=\"imagemTabelaLivros\" id=\"imagemTabelaLivros\" rowspan=\"3\"><span><img class=\"imagemCapaLivroTabelaLivros\" src=\"img/logo.jpg\"  /></span></td>";
	retorno += "<td class=\"tituloTabelaLivros\" id=\"tituloTabelaLivros\" colspan=\"2\"><span>Titulo do Livro</span></td>";
	retorno += "</tr><tr>";
	retorno += "<td class=\"categoriasTabelaLivros\" id=\"categoriasTabelaLivros\"><span><b>Categoria:</b> Romance</span></td>";
	retorno += "<td class=\"autorTabelaLivros\" id=\"autorTabelaLivros\"><b>Autor:</b> Fernando Pessoa</td>";
	retorno += "</tr><tr>";
	retorno += "<td class=\"mensagemTabelaLivros\" id=\"mensagemTabelaLivros\" colspan=\"2\">Para mais info, carregue na capa do livro</td>";
	retorno += "</tr></table>";
	
	retorno += "</div>";
	retorno += "</div>";
	}
	return retorno;
}