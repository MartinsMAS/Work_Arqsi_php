function init() {
    MakeXMLHTTPCallNLivros(6);
}

function loadCategorias() {
    //alert("Carreguei Categorias!!!!");
}

function inicializar() {
    var selectEscolha = document.getElementById("comboSelect");
    //var valorSelect = selectEscolha.options[selectEscolha.selectedIndex].text;

    if (selectEscolha.selectedIndex == '1') {
        createEditora();
        //MakeXMLHTTPCallNomesEdtoras();
    } else if (selectEscolha.selectedIndex == '2') {
        createCategorias();
        MakeXMLHTTPCallCategorias();
        //loadLivros();
    }
    //MakeXMLHTTPCallNLivros(6);
    //MakeXMLHTTPCallLivrosPorCategoria("Romance");
}

function loadLivros() {
	MakeXMLHTTPCallLivrosPorCategoria("Romance");
}

function createCategorias() {
    elementDiv = document.getElementById("secondMenu");
    elementDiv.innerHTML = "";

    t = document.createElement("table");
    tb = document.createElement("tbody");
    tr = document.createElement("tr");
    td1 = document.createElement("td");
    td2 = document.createElement("td");
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

    div.setAttribute("id", "formChosses");
    div.setAttribute("class", "formChosses");

    t.setAttribute("class", "tabelaCategorias");

    td1.setAttribute("id", "categorias");
    td1.setAttribute("class", "categorias");

    select1.setAttribute("id", "comboCategorias");
    select1.setAttribute("class", "comboCategorias");
    select1.setAttribute("size", "1");
    select1.setAttribute("onChange", "loadLivros();");

    td2.setAttribute("id", "showNResults");
    td2.setAttribute("class", "showNResults");

    select2.setAttribute("id", "comboShowNResults");
    select2.setAttribute("class", "comboShowNResults");
    select2.setAttribute("size", "1");
    select2.setAttribute("onChange", "loadLivros();");

    optionS.setAttribute("selected", "selected");
    optionS.setAttribute("value", "none");
    option1.setAttribute("value", "5");
    option2.setAttribute("value", "10");
    option3.setAttribute("value", "25");



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

    elementDiv.appendChild(div);
}

function createEditora() {
    elementDiv = document.getElementById("secondMenu");
    elementDiv.innerHTML = "";

    t = document.createElement("table");
    tb = document.createElement("tbody");
    tr = document.createElement("tr");
    td1 = document.createElement("td");
    td2 = document.createElement("td");
    text1 = document.createTextNode("Nº Resultados Editora: ");
    input1 = document.createElement("input");
    text2 = document.createTextNode("Resultados por Pagina: ");
    input2 = document.createElement("input");
    div = document.createElement("div");

    div.setAttribute("id", "formChosses");
    div.setAttribute("class", "formChosses");

    t.setAttribute("class", "tabelaEditoras");

    td1.setAttribute("id", "editoras");
    td1.setAttribute("class", "editoras");

    input1.setAttribute("id", "nLivrosEditora");
    input1.setAttribute("class", "nLivrosEditora");
    input1.setAttribute("type", "text");
    input1.setAttribute("name", "nLivrosEditora");
    input1.setAttribute("size", "3");

    td2.setAttribute("id", "showNResultsPage");
    td2.setAttribute("class", "showNResultsPage");

    input2.setAttribute("id", "showNResultsPage");
    input2.setAttribute("class", "showNResultsPage");
    input2.setAttribute("type", "text");
    input2.setAttribute("name", "showNResultsPage");
    input2.setAttribute("size", "3");


    td1.appendChild(text1);
    td1.appendChild(input1);
    td2.appendChild(text2);
    td2.appendChild(input2);

    tr.appendChild(td1);
    tr.appendChild(td2);

    tb.appendChild(tr);

    t.appendChild(tb);
    div.appendChild(t);

    elementDiv.appendChild(div);

}

function createTitleDiv() {

}

function creteMiddleSection(xml) {
    elementDiv = document.getElementById("middle");
    //elementDiv.innerHTML="";

    resultadoPesquisa = document.createElement("div");

	var editoras = xml.getElementsByTagName("editora");
	
	
	for (i = 0; i < editoras.length; i++) {
		divCategoria = document.createElement("div");
		divCategoria.setAttribute("id", "divisoriaPesquisa");
		divCategoria.setAttribute("class", "divisoriaPesquisa");
		//tabelaDivisoria = createDivisoria();
		//divCategoria.appendChild(tabelaDivisoria);
		//resultadoPesquisa.appendChild(divCategoria);
		
		var books = editoras[i].getElementsByTagName("book");
		
		for (j = 0; j < books.length; j++) {
			tabelaLivro = createTableBook(books[j]);
			divTeste = document.createElement("div");
			divTeste.setAttribute("id", "resultadoPesquisa");
			divTeste.setAttribute("class", "resultadoPesquisa");
			divTeste.appendChild(tabelaLivro);
			resultadoPesquisa.appendChild(divTeste);
		}
    }

    elementDiv.appendChild(resultadoPesquisa);
}

function requestInformationPopUp(titulo) {
    MakeXMLHTTPCallLivro(titulo);
}

function preencheDivPopUp(xml) {

    divPrincipal = document.getElementById("inline1");
    divPrincipal.innerHTML = "";

    var title = xml.getElementsByTagName("title")[0].childNodes[0].nodeValue;
    var author = xml.getElementsByTagName("author")[0].childNodes[0].nodeValue;
    var category = xml.getElementsByTagName("category")[0].childNodes[0].nodeValue;
    var isbn = xml.getElementsByTagName("isbn")[0].childNodes[0].nodeValue;
    var news = xml.getElementsByTagName("news")[0].childNodes[0].nodeValue;

    pTitle = document.createElement("p");
    txtNodeTitle = document.createTextNode(title);
	labelNodeTitle = document.createTextNode("Título: ");
	spanLabelTitle = document.createElement("span");
	spanTextTitle = document.createElement("span");
	spanLabelTitle.setAttribute("class","textoLabelPopUp");
	spanTextTitle.setAttribute("class","textoTituloPopUp");
	spanLabelTitle.appendChild(labelNodeTitle);
	spanTextTitle.appendChild(txtNodeTitle);
	pTitle.appendChild(spanLabelTitle);
    pTitle.appendChild(spanTextTitle);
    divPrincipal.appendChild(pTitle);

	
    pAuthor = document.createElement("p");
    txtNodeAuthor = document.createTextNode(author);
	labelNodeAuthor = document.createTextNode("Autor: ");
	spanLabelAutor = document.createElement("span");
	spanTextAutor = document.createElement("span");
	spanLabelAutor.setAttribute("class","textoLabelPopUp");
	spanTextAutor.setAttribute("class","textoAtributosPopUp");
	spanLabelAutor.appendChild(labelNodeAuthor);
	spanTextAutor.appendChild(txtNodeAuthor);
    pAuthor.appendChild(spanLabelAutor);
	pAuthor.appendChild(spanTextAutor);
    divPrincipal.appendChild(pAuthor);

	
	
    pCategory = document.createElement("p");
    txtNodeCategory = document.createTextNode(category);
	labelNodeCategory = document.createTextNode("Categoria: ");
	spanLabelCategory = document.createElement("span");
	spanTextCategory = document.createElement("span");
	spanLabelCategory.setAttribute("class","textoLabelPopUp");
	spanTextCategory.setAttribute("class","textoAtributosPopUp");
	spanLabelCategory.appendChild(labelNodeCategory);
	spanTextCategory.appendChild(txtNodeCategory);
    pCategory.appendChild(spanLabelCategory);
	pCategory.appendChild(spanTextCategory);
    divPrincipal.appendChild(pCategory);

    pIsbn = document.createElement("p");
    txtNodeIsbn = document.createTextNode(isbn);
	labelNodeIsbn = document.createTextNode("ISBN: ");
	spanLabelIsbn = document.createElement("span");
	spanTextIsbn = document.createElement("span");
	spanLabelIsbn.setAttribute("class","textoLabelPopUp");
	spanTextIsbn.setAttribute("class","textoAtributosPopUp");
	spanLabelIsbn.appendChild(labelNodeIsbn);
	spanTextIsbn.appendChild(txtNodeIsbn);
    pIsbn.appendChild(spanLabelIsbn);
	pIsbn.appendChild(spanTextIsbn);
    divPrincipal.appendChild(pIsbn);

    
    txtNodeNews = document.createTextNode(news);
	if(txtNodeNews == "nao"){
		divNews = document.createElement("div");
		marquee = document.createElement("marquee");
		marquee.setAttribute("behavior","scroll");
		marquee.setAttribute("direction","left");
		text = document.createTextNode("Novidade");
		span = document.createElement("span");
		span.setAttribute("class","textoRolantePopUp");
		span.appendChild(text);
		marquee.appendChild(span);
		divNews.appendChild(marquee);
		divPrincipal.appendChild(divNews);
	}
    

}

function createTableBook(xml) {

	var title = xml.getElementsByTagName("title")[0].childNodes[0].nodeValue;
    var author = xml.getElementsByTagName("author")[0].childNodes[0].nodeValue;
    var category = xml.getElementsByTagName("category")[0].childNodes[0].nodeValue;
	//var image = xml.getElementsByTagName("cover")[0].childNodes[0].nodeValue;

    tabelaLivroDiv = document.createElement("div");
    t = document.createElement("table");
    tb = document.createElement("tbody");
    tr1 = document.createElement("tr");
    tr2 = document.createElement("tr");
    tr3 = document.createElement("tr");
    td1 = document.createElement("td");
    td2 = document.createElement("td");
    td3 = document.createElement("td");
    td4 = document.createElement("td");
    td5 = document.createElement("td");
    img = document.createElement("img");

    labelAutor = document.createTextNode("Autor: ");
    labelCategoria = document.createTextNode("Categoria: ");
    labelMensagem = document.createTextNode("Para mais info, carregue na capa do livro ou no título");

    //METER ISTO A RECEBER OS VALORES PASSADOS Á FUNÇAO 
    //titulo = document.createTextNode("Ficciones");
    //textAutor = document.createTextNode("Ze caroço");
    //textCategoria = document.createTextNode("Sexual");
	titulo = document.createTextNode(title);
    textAutor = document.createTextNode(author);
    textCategoria = document.createTextNode(category);

    span = document.createElement("span");
    a = document.createElement("a");
    a.setAttribute("href", "#inline1");
    a.setAttribute("class", "fancybox");
    a.setAttribute("title", "Informação");
    var txtTitulo = titulo.nodeValue;
    var callFunction = "requestInformationPopUp(\"" + txtTitulo + "\");";
    span.setAttribute("onclick", callFunction);
    a.appendChild(titulo);
    span.appendChild(a);


    tabelaLivroDiv.setAttribute("id", "tabelaLivroDiv");
    tabelaLivroDiv.setAttribute("class", "tabelaLivroDiv");

    t.setAttribute("class", "tabelaLivros");

	//METER ISTO A RECEBER OS VALORES PASSADOS Á FUNÇAO
    img.setAttribute("class", "imagemCapaLivroTabelaLivros");
    img.setAttribute("src", "img/logo.jpg");
	//img.setAttribute("src", image);
	
    td1.setAttribute("id", "imagemCapaLivro");
    td1.setAttribute("class", "imagemCapaLivro");
    td1.setAttribute("rowspan", "3");

    td2.setAttribute("id", "tituloLivro");
    td2.setAttribute("class", "tituloLivro");
    td2.setAttribute("colspan", "2");

    td3.setAttribute("id", "categoriaLivro");
    td3.setAttribute("class", "categoriaLivro");

    td4.setAttribute("id", "autorLivro");
    td4.setAttribute("class", "autorLivro");

    td5.setAttribute("id", "mensagemUser");
    td5.setAttribute("class", "mensagemUser");
    td5.setAttribute("colspan", "2");

    td5.appendChild(labelMensagem);
    td4.appendChild(labelAutor);
    td4.appendChild(textAutor);
    td3.appendChild(labelCategoria);
    td3.appendChild(textCategoria);
    td2.appendChild(span);
    td1.appendChild(img);

    tr1.appendChild(td1);
    tr1.appendChild(td2);

    tr2.appendChild(td3);
    tr2.appendChild(td4);

    tr3.appendChild(td5);

    tb.appendChild(tr1);
    tb.appendChild(tr2);
    tb.appendChild(tr3);

    t.appendChild(tb);
    tabelaLivroDiv.appendChild(t);

    return tabelaLivroDiv;
}