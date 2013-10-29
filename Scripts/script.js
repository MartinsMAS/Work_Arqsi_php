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
		MakeXMLHTTPCallCategorias();
		//loadLivros();
	}
        //MakeXMLHTTPCallNLivros(6);
}
			
function loadLivros(){
	
	var ret = createTableBook();
	elementDiv = document.getElementById("middle");
	elementDiv.innerHTML=ret;
}

function createCategorias(){
		t  = document.createElement("table");  
        tb = document.createElement("tbody");
		tr = document.createElement("tr"); 
		td1 = document.createElement("td");
		td2 = document.createElement("td2");
		text1 = document.createTextNode("Categorias: ");
		select1 = document.createElement("select");
		text2 = document.createTextNode("Ver Apenas: ");
		select2 = document.createElement("select");
		div = document.createElement("div");
		optionS = document.createElement("option");
		option1 = document.createElement("option");
		option2 = document.createElement("option");
		option3 = document.createElement("option");
		optionTextS = document.createTextNode("--");
		optionText1 = document.createTextNode("5");
		optionText2 = document.createTextNode("10");
		optionText3 = document.createTextNode("25");

	div.setAttribute("id","formChosses");
	div.setAttribute("class","formChosses");
	
	t.setAttribute("class","tabelaCategorias");
	
	td1.setAttribute("id","categorias");
	td1.setAttribute("class","categorias");
	
	select1.setAttribute("id","comboCategorias");
	select1.setAttribute("class","comboCategorias");
	select1.setAttribute("size","1");
	select1.setAttribute("onChange","loadLivros();");
	
	td2.setAttribute("id","showNResults");
	td2.setAttribute("class","showNResults");

	select2.setAttribute("id","comboShowNResults");
	select2.setAttribute("class","comboShowNResults");
	select2.setAttribute("size","1");
	select2.setAttribute("onChange","loadLivros();");
	
	optionS.setAttribute("selected","selected");
	optionS.setAttribute("value","none");
	option1.setAttribute("value","5");
	option2.setAttribute("value","10");
	option3.setAttribute("value","25");
	
	
	
	option1.appendChild(optionText1);
	option2.appendChild(optionText2);
	option3.appendChild(optionText3);
	optionS.appendChild(optionTextS);
	
	
	select2.appendChild(optionS);
	select2.appendChild(option1);
	select2.appendChild(option2);
	select2.appendChild(option3);
	
	td1.appendChild(text1);
	td1.appendChild(select1);
	td2.appendChild(text2);
	td2.appendChild(select2);
	
	tr.appendChild(td1);
	tr.appendChild(td2);
	
	tb.appendChild(tr);

	t.appendChild(tb);
	div.appendChild(t);
	
	elementDiv = document.getElementById("secondMenu");
	elementDiv.appendChild(div);
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