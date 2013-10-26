function init(){
    MakeXMLHTTPCallCategorias();
}

function loadCategorias(){
	//alert("Carreguei Categorias!!!!");
}
			
function loadLivros(){
	
	var ret = createTableBook();
	elementDiv = document.getElementById("meteraquitabela");
	elementDiv.innerHTML=ret;
}

function createTableBook(){
	
	var retorno = "";
	for(i=0;i<10;i++){
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
	}
	return retorno;
}