function init(){
    MakeXMLHTTPCallNLivros(6);
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
	//ELEMENTO DIV
	var div = document.createElement("div");
	//ATRIBUTOS DIV
	var atributo = document.createAttribute("id");
	atributo.nodeValue="formChosses";
	div.setAttribute("id","formChosses");
	//div.setAttribute(atributo);
	atributo = document.createAttribute("class");
	atributo.nodeValue="formChosses";
	div.setAttribute(atributo);
	//CONTEUDO DO DIV
	//ASSOCIAR CONTEUDO DIV AO SUPERIOR
	elementDiv = document.getElementById("secondMenu");
	elementDiv.appendChild(div);
	
	//ELEMENTO TABLE
	var tabela = documet.createElement("table");
	//ATRIBUTOS TABLE
	atributo = document.createAttribute("class");
	atributo.nodeValue="tabelaCategorias";
	tabela.setAttribute(atributo);
	//CONTEUDO DO TABLE
	//ASSOCIAR CONTEUDO TABLE AO SUPERIOR
	div.appendChild(tabela);
	
	
	//ELEMENTO TR
	var linha = documet.createElement("tr");
	//ATRIBUTOS TR
	//CONTEUDO DO TR
	//ASSOCIAR CONTEUDO TR AO SUPERIOR
	tabela.appendChild(linha);
	
	//ELEMENTO TD
	var coluna = documet.createElement("td");
	//ATRIBUTOS TD
	atributo = document.createAttribute("id");
	atributo.nodeValue="categorias";
	coluna.setAttribute(atributo);
	atributo = document.createAttribute("class");
	atributo.nodeValue="categorias";
	coluna.setAttribute(atributo);
	//CONTEUDO DO TD
	var text = document.createTextNode("Categorias: ");
	coluna.appendChild(text);
	//ASSOCIAR CONTEUDO TD AO SUPERIOR
	linha.appendChild(coluna);
	
	//ELEMENTO SELECT
	var select1 = documet.createElement("select");
	//ATRIBUTOS SELECT
	atributo = document.createAttribute("id");
	atributo.nodeValue="comboCategorias";
	select1.setAttribute(atributo);
	atributo = document.createAttribute("class");
	atributo.nodeValue="comboCategorias";
	select1.setAttribute(atributo);
	atributo = document.createAttribute("size");
	atributo.nodeValue="1";
	select1.setAttribute(atributo);
	atributo = document.createAttribute("onChange");
	atributo.nodeValue="loadLivros();";
	select1.setAttribute(atributo);
	//CONTEUDO DO SELECT
	//ASSOCIAR CONTEUDO SELECT AO SUPERIOR
	coluna.appendChild(select1);
	
	
	
	
	
	
	//ELEMENTO TD
	coluna = documet.createElement("td");
	//ATRIBUTOS TD
	atributo = document.createAttribute("id");
	atributo.nodeValue="showNResults";
	coluna.setAttribute(atributo);
	atributo = document.createAttribute("class");
	atributo.nodeValue="showNResults";
	coluna.setAttribute(atributo);
	//CONTEUDO DO TD
	text = document.createTextNode("Ver Apenas: ");
	coluna.appendChild(text);
	//ASSOCIAR CONTEUDO TD AO SUPERIOR
	linha.appendChild(coluna);
	
	
	
	
	//ELEMENTO SELECT
	var select2 = documet.createElement("select");
	//ATRIBUTOS SELECT
	atributo = document.createAttribute("id");
	atributo.nodeValue="comboShowNResults";
	select2.setAttribute(atributo);
	atributo = document.createAttribute("class");
	atributo.nodeValue="comboShowNResults";
	select2.setAttribute(atributo);
	atributo = document.createAttribute("size");
	atributo.nodeValue="1";
	select2.setAttribute(atributo);
	atributo = document.createAttribute("onChange");
	atributo.nodeValue="loadLivros();";
	select2.setAttribute(atributo);
	//CONTEUDO DO SELECT
	//ASSOCIAR CONTEUDO SELECT AO SUPERIOR
	coluna.appendChild(select2);
	
	//ELEMENTO OPTION SELECTED
	optionS = documet.createElement("option");
	//ATRIBUTOS OPTION SELECTED
	atributo = document.createAttribute("selected");
	atributo.nodeValue="selected";
	optionS.setAttribute(atributo);
	atributo = document.createAttribute("value");
	atributo.nodeValue="none";
	optionS.setAttribute(atributo);
	//CONTEUDO DO OPTION SELECTED
	var optionText = document.createTextNode("--");
	optionS.appendChild(optionText);
	//ASSOCIAR CONTEUDO OPTION SELECTED AO SUPERIOR
	select2.appendChild(optionS);
	
	
	//ELEMENTO OPTION
	option = documet.createElement("option");
	//ATRIBUTOS OPTION
	atributo = document.createAttribute("value");
	atributo.nodeValue="5";
	option.setAttribute(atributo);
	//CONTEUDO DO OPTION
	var optionText = document.createTextNode("5");
	option.appendChild(optionText);
	//ASSOCIAR CONTEUDO OPTION AO SUPERIOR
	select2.appendChild(option);
	
	//ELEMENTO OPTION
	option = documet.createElement("option");
	//ATRIBUTOS OPTION
	atributo = document.createAttribute("value");
	atributo.nodeValue="10";
	option.setAttribute(atributo);
	//CONTEUDO DO OPTION
	var optionText = document.createTextNode("10");
	option.appendChild(optionText);
	//ASSOCIAR CONTEUDO OPTION AO SUPERIOR
	select2.appendChild(option);
	
	//ELEMENTO OPTION
	option = documet.createElement("option");
	//ATRIBUTOS OPTION
	atributo = document.createAttribute("value");
	atributo.nodeValue="25";
	option.setAttribute(atributo);
	//CONTEUDO DO OPTION
	var optionText = document.createTextNode("25");
	option.appendChild(optionText);
	//ASSOCIAR CONTEUDO OPTION AO SUPERIOR
	select2.appendChild(option);
	
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