function loadCategorias(){
	alert("Carreguei Categorias!!!!");
}
			
function loadLivros(){
	alert("Carreguei Livros!!!!");
	
	var ret = createTableBook();
	alert("Carreguei Livros2222!!!!");
	elementDiv = document.getElementById("meteraquitabela");
	elementDiv.innerHTML=ret;	
}

function createTableBook(){
	
	var retorno = "";
	
	retorno += "<table class=\"tabelaLivros\">";
	retorno += "<tr>";
	retorno += "<td class=\"imagemTabelaLivros\"><img class=\"imagemCapaLivroTabelaLivros\" src=\"img/logo.jpg\"  /></td>";
	retorno += "<td class=\"tituloTabelaLivros\">Titulo do Livro</td>";
	retorno += "</tr><tr>";
	retorno += "<td class=\"categoriasTabelaLivros\"><b>Categoria:</b> Romance</td>";
	retorno += "<td class=\"autorTabelaLivros\"><b>Autor:</b> Fernando Pessoa</td>";
	retorno += "</tr><tr>";
	retorno += "<td class=\"mensagemTabelaLivros\">Para mais info, carregue na capa do livro</td>";
	retorno += "</tr></table>";

	return retorno;
}