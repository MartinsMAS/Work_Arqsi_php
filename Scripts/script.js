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
    } else if (selectEscolha.selectedIndex == '0') {
		elementDiv = document.getElementById("middle");
		elementDiv.innerHTML="";
	
		elementPaging = document.getElementById("paging");
		elementPaging.style.display = "none";
		elementPaging.innerHTML="";
		
		elementDiv = document.getElementById("secondMenu");
		elementDiv.innerHTML = "";
	}
    //MakeXMLHTTPCallNLivros(6);
    //MakeXMLHTTPCallLivrosPorCategoria("Romance");
}

function loadLivrosCategorias() {
	elementDiv = document.getElementById("middle");
    elementDiv.innerHTML="";
	
	elementPaging = document.getElementById("paging");
	elementPaging.style.display = "none";
    elementPaging.innerHTML="";
	
	var x=document.getElementById("comboCategorias").selectedIndex;
	var y=document.getElementById("comboCategorias").options;
	
	divWaiting = document.createElement("div");
	divWaiting.setAttribute("class","loadingInformation");
	
	tableWaiting = document.createElement("table");
	tableWaiting.setAttribute("width","360");
	tableWaiting.setAttribute("align","center");
	tb = document.createElement("tbody");
	tr = document.createElement("tr");
	td1 = document.createElement("td");
	td2 = document.createElement("td");
	
	td1.setAttribute("width","60");
	td2.setAttribute("width","300");
	
	textNode = document.createTextNode("A carregar dados, por favor aguarde.");
	img = document.createElement("img");
	img.setAttribute("src","img/loading.gif");
	img.setAttribute("width","48");
	img.setAttribute("height","48");
	
	td2.appendChild(textNode);
	td1.appendChild(img);
	
	tr.appendChild(td1);
	tr.appendChild(td2);
	
	tb.appendChild(tr);
	
	tableWaiting.appendChild(tb);
	divWaiting.appendChild(tableWaiting);
	
	elementDiv.appendChild(divWaiting);
		
	MakeXMLHTTPCallLivrosPorCategoria(y[x].text);
}

function loadLivrosEditoras(){
	elementDiv = document.getElementById("middle");
    elementDiv.innerHTML="";
	
	elementPaging = document.getElementById("paging");
	elementPaging.style.display = "none";
    elementPaging.innerHTML="";
	
	
	//ALTERAR ESTA MERDA!!
	//var x=document.getElementById("comboCategorias").selectedIndex;
	//var y=document.getElementById("comboCategorias").options;
	
	divWaiting = document.createElement("div");
	divWaiting.setAttribute("class","loadingInformation");
	
	tableWaiting = document.createElement("table");
	tableWaiting.setAttribute("width","360");
	tableWaiting.setAttribute("align","center");
	tb = document.createElement("tbody");
	tr = document.createElement("tr");
	td1 = document.createElement("td");
	td2 = document.createElement("td");
	
	td1.setAttribute("width","60");
	td2.setAttribute("width","300");
	
	textNode = document.createTextNode("A carregar dados, por favor aguarde.");
	img = document.createElement("img");
	img.setAttribute("src","img/loading.gif");
	img.setAttribute("width","48");
	img.setAttribute("height","48");
	
	td2.appendChild(textNode);
	td1.appendChild(img);
	
	tr.appendChild(td1);
	tr.appendChild(td2);
	
	tb.appendChild(tr);
	
	tableWaiting.appendChild(tb);
	divWaiting.appendChild(tableWaiting);
	
	elementDiv.appendChild(divWaiting);
	
	MakeXMLHTTPCallNLivros(6);
}

function createCategorias() {

	elementDiv = document.getElementById("middle");
    elementDiv.innerHTML="";
	
	elementPaging = document.getElementById("paging");
	elementPaging.style.display = "none";
    elementPaging.innerHTML="";

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
    select1.setAttribute("onChange", "loadLivrosCategorias();");

    td2.setAttribute("id", "showNResults");
    td2.setAttribute("class", "showNResults");

    select2.setAttribute("id", "comboShowNResults");
    select2.setAttribute("class", "comboShowNResults");
    select2.setAttribute("size", "1");
    select2.setAttribute("onChange", "loadLivrosCategorias();");

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
	
	elementDiv = document.getElementById("middle");
    elementDiv.innerHTML="";
	
	elementPaging = document.getElementById("paging");
	elementPaging.style.display = "none";
    elementPaging.innerHTML="";

    elementDiv = document.getElementById("secondMenu");
    elementDiv.innerHTML = "";

    t = document.createElement("table");
    tb = document.createElement("tbody");
    tr = document.createElement("tr");
    td1 = document.createElement("td");
    td2 = document.createElement("td");
	td3 = document.createElement("td");
    text1 = document.createTextNode("Nº Resultados Editora: ");
    input1 = document.createElement("input");
    text2 = document.createTextNode("Results por Pagina: ");
    input2 = document.createElement("input");
    div = document.createElement("div");
	
	img = document.createElement("img");
	img.setAttribute("src","img/search.png");
	img.setAttribute("width","20");
	img.setAttribute("height","20");
	
    div.setAttribute("id", "formChosses");
    div.setAttribute("class", "formChosses");

    t.setAttribute("class", "tabelaEditoras");

    td1.setAttribute("id", "editoras");
    td1.setAttribute("class", "editoras");

    input1.setAttribute("id", "nLivrosEditora");
    input1.setAttribute("class", "nLivrosEditora");
    input1.setAttribute("type", "text");
    input1.setAttribute("name", "nLivrosEditora");
    input1.setAttribute("size", "2");

    td2.setAttribute("id", "showNResultsPage");
    td2.setAttribute("class", "showNResultsPage");

    input2.setAttribute("id", "showNResultsPage");
    input2.setAttribute("class", "showNResultsPage");
    input2.setAttribute("type", "text");
    input2.setAttribute("name", "showNResultsPage");
    input2.setAttribute("size", "2");
	
	td3.setAttribute("id", "search");
    td3.setAttribute("class", "pesquisarEditoras");
	img.setAttribute("onClick", "loadLivrosEditoras();");

    td1.appendChild(text1);
    td1.appendChild(input1);
	td3.appendChild(img);
    td2.appendChild(text2);
    td2.appendChild(input2);

    tr.appendChild(td1);
	tr.appendChild(td3);
    tr.appendChild(td2);

    tb.appendChild(tr);

    t.appendChild(tb);
    div.appendChild(t);

    elementDiv.appendChild(div);

}

function createTitleDiv(titulo) {
	
	div = document.createElement("div");
	
	divback = document.createElement("div");
	divback.setAttribute("class","divComDivDivisoria");
	divup = document.createElement("div");
	divup.setAttribute("class","divDivisoria");
	
	texto = document.createTextNode(titulo);
	
	span = document.createElement("span");
	span.setAttribute("text-align","center");
	span.setAttribute("valing","center");
	span.setAttribute("class","textoRolantePopUp");
	
	span.appendChild(texto);
	divup.appendChild(span);
	divback.appendChild(divup);
	
	div.appendChild(divback);
	
	return div;
}

function creteMiddleSection(xml) {
	var livros = xml.getElementsByTagName("book");
	var numPaginas;
		
	//var divisoes = new Array(numPaginas);
	
	var divisoes = new Array();
	
    elementDiv = document.getElementById("middle");
    elementDiv.innerHTML="";
	
	linkContainer = document.getElementById("paging");
	linkContainer.innerHTML="";
	
	//paging = document.getElementById("showNResultsPage");
	//paging = document.getElementById("comboShowNresults");
	paging=3;
	flag = 0;
	pagPrenchidas = 0;

    resultadoPesquisa = document.createElement("div");
	resultadoPesquisa.setAttribute("id","all");
	
	var editoras = xml.getElementsByTagName("editora");
	
	var divTemp = document.createElement("div");
	divTemp.setAttribute("class","divTemp");
	
	for (i = 0; i < editoras.length; i++) {
		divCategoria = document.createElement("div");
		divCategoria.setAttribute("id", "divisoriaPesquisa");
		divCategoria.setAttribute("class", "divisoriaPesquisa");
		
		//temp=editoras.getElementsByTagName("editora")[i];
		var title = editoras[i].getAttribute("name");

		var books = editoras[i].getElementsByTagName("book");
		
		if(books.length!=0){
		tabelaDivisoria = createTitleDiv(title);
		divCategoria.appendChild(tabelaDivisoria);
		divTemp.appendChild(divCategoria);
		}
		
		
		for (j = 0; j < books.length; j++) {
			if(paging==flag){
				//divTemp2 = document.createElement("div");
				//divTemp2 = divTemp;
				//resultadoPesquisa.appendChild(divTemp2);
				divisoes[pagPrenchidas] = divTemp;
				pagPrenchidas++;
				var divTemp = document.createElement("div");
				divTemp.setAttribute("class","divTemp");
				flag=0;
				
				divCategoria = document.createElement("div");
				divCategoria.setAttribute("id", "divisoriaPesquisa");
				divCategoria.setAttribute("class", "divisoriaPesquisa");
				var title = editoras[i].getAttribute("name");

				tabelaDivisoria = createTitleDiv(title);
				divCategoria.appendChild(tabelaDivisoria);
				divTemp.appendChild(divCategoria);
			}
			tabelaLivro = createTableBook(books[j]);
			divTeste = document.createElement("div");
			divTeste.setAttribute("id", "temporario");
			divTeste.setAttribute("class", "temporario");
			divTeste.appendChild(tabelaLivro);
			divTemp.appendChild(divTeste);
			flag++;
		}
    }
	divisoes[pagPrenchidas] = divTemp;
	for(x = 0; x < divisoes.length; x++){
		resultadoPesquisa.appendChild(divisoes[x]);
	}
	
	elementDiv.appendChild(resultadoPesquisa);
	createLinks();
    
}

function requestInformationPopUp(titulo) {
    divPrincipal = document.getElementById("inline1");
    divPrincipal.innerHTML = "";
    MakeXMLHTTPCallLivro(titulo);
}

function preencheDivPopUp(xml) {

	divPrincipal = document.getElementById("inline1");
	divPrincipal.innerHTML = "";
	
    var title = xml.getElementsByTagName("title")[0].childNodes[0].nodeValue;
    var author = xml.getElementsByTagName("author")[0].childNodes[0].nodeValue;
    var category = xml.getElementsByTagName("category")[0].childNodes[0].nodeValue;
    var isbn = xml.getElementsByTagName("isbn")[0].childNodes[0].nodeValue;
	var anopub = xml.getElementsByTagName("publicacao")[0].childNodes[0].nodeValue;
    var news = xml.getElementsByTagName("news")[0].childNodes[0].nodeValue;
	
	try{
        var image = xml.getElementsByTagName("cover")[0].childNodes[0].nodeValue;
    }catch (err){
        var image = false;
    }
	
	try{
        var synopse = xml.getElementsByTagName("sinopse")[0].childNodes[0].nodeValue;
    }catch (err){
        var synopse = false;
    }
	
    
	
	

    t = document.createElement("table");
    tb = document.createElement("tbody");
    tr1 = document.createElement("tr");
    tr2 = document.createElement("tr");
    tr3 = document.createElement("tr");
	tr4 = document.createElement("tr");
	tr5 = document.createElement("tr");
	tr6 = document.createElement("tr");
	tr7 = document.createElement("tr");
	tr8 = document.createElement("tr");
    td1 = document.createElement("td");
    td2 = document.createElement("td");
    td3 = document.createElement("td");
    td4 = document.createElement("td");
    td5 = document.createElement("td");
	td6 = document.createElement("td");
	td7 = document.createElement("td");
	td8 = document.createElement("td");
	td9 = document.createElement("td");
    
	t.setAttribute("class","tabelaInsidePopUp");
	td1.setAttribute("colspan","2");td1.setAttribute("class","titulo");td1.setAttribute("id","titulo");
	td2.setAttribute("width","180");td2.setAttribute("class","autor");td2.setAttribute("id","autor");
	td3.setAttribute("width","200");td3.setAttribute("class","imagem");td3.setAttribute("id","imagem");
	td3.setAttribute("rowspan","4");
	td4.setAttribute("class","categoria");td4.setAttribute("id","categoria");
	td5.setAttribute("class","isbn");td5.setAttribute("id","isbn");
	td6.setAttribute("colspan","2");td6.setAttribute("class","textoRolante");td6.setAttribute("id","textoRolante");
	td7.setAttribute("colspan","2");td7.setAttribute("class","sinopse");td7.setAttribute("id","sinopse");
	td8.setAttribute("colspan","2");td8.setAttribute("class","impressora");td8.setAttribute("id","impressora");
	
	
    txtNodeTitle = document.createTextNode(title);
	//labelNodeTitle = document.createTextNode("Título: ");
	//spanLabelTitle = document.createElement("span");
	spanTextTitle = document.createElement("span");
	//spanLabelTitle.setAttribute("class","textoLabelPopUp");
	spanTextTitle.setAttribute("class","textoTituloPopUp");
	//spanLabelTitle.appendChild(labelNodeTitle);
	spanTextTitle.appendChild(txtNodeTitle);
	//td1.appendChild(spanLabelTitle);
    td1.appendChild(spanTextTitle);

	
    txtNodeAuthor = document.createTextNode(author);
	labelNodeAuthor = document.createTextNode("Autor: ");
	spanLabelAutor = document.createElement("span");
	spanTextAutor = document.createElement("span");
	spanLabelAutor.setAttribute("class","textoLabelPopUp");
	spanTextAutor.setAttribute("class","textoAtributosPopUp");
	spanLabelAutor.appendChild(labelNodeAuthor);
	spanTextAutor.appendChild(txtNodeAuthor);
    td2.appendChild(spanLabelAutor);
	td2.appendChild(spanTextAutor);

	
    txtNodeCategory = document.createTextNode(category);
	labelNodeCategory = document.createTextNode("Categoria: ");
	spanLabelCategory = document.createElement("span");
	spanTextCategory = document.createElement("span");
	spanLabelCategory.setAttribute("class","textoLabelPopUp");
	spanTextCategory.setAttribute("class","textoAtributosPopUp");
	spanLabelCategory.appendChild(labelNodeCategory);
	spanTextCategory.appendChild(txtNodeCategory);
    td4.appendChild(spanLabelCategory);
	td4.appendChild(spanTextCategory);

    txtNodeIsbn = document.createTextNode(isbn);
	labelNodeIsbn = document.createTextNode("ISBN: ");
	spanLabelIsbn = document.createElement("span");
	spanTextIsbn = document.createElement("span");
	spanLabelIsbn.setAttribute("class","textoLabelPopUp");
	spanTextIsbn.setAttribute("class","textoAtributosPopUp");
	spanLabelIsbn.appendChild(labelNodeIsbn);
	spanTextIsbn.appendChild(txtNodeIsbn);
    td5.appendChild(spanLabelIsbn);
	td5.appendChild(spanTextIsbn);
	
	txtNodeAnoPub = document.createTextNode(anopub);
	labelNodeAnoPub = document.createTextNode("Ano Publicação: ");
	spanLabelAnoPub = document.createElement("span");
	spanTextAnoPub = document.createElement("span");
	spanLabelAnoPub.setAttribute("class","textoLabelPopUp");
	spanTextAnoPub.setAttribute("class","textoAtributosPopUp");
	spanLabelAnoPub.appendChild(labelNodeAnoPub);
	spanTextAnoPub.appendChild(txtNodeAnoPub);
    td9.appendChild(spanLabelAnoPub);
	td9.appendChild(spanTextAnoPub);

    
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
		td6.appendChild(divNews);
	}
	
	if(synopse){
		txtNodeSinopse = document.createTextNode(synopse);
    }else{
		txtNodeSinopse = document.createTextNode("(Sem sinopse disponivel)");
    }
	
	labelNodeSinopse = document.createTextNode("Sinopse: ");
	spanLabelSinopse = document.createElement("span");
	spanTextSinopse = document.createElement("span");
	spanLabelSinopse.setAttribute("class","textoLabelPopUp");
	spanTextSinopse.setAttribute("class","tabelaInsidePopUpSinopse");
	spanLabelSinopse.appendChild(labelNodeSinopse);
	spanTextSinopse.appendChild(txtNodeSinopse);
	td7.appendChild(spanLabelSinopse);
	td7.appendChild(spanTextSinopse); 
	
    
    
	img = document.createElement("img");
	if(image){
       img.setAttribute("src", image); 
    }else{
       img.setAttribute("src", "img/logo.png");  
    }
	img.setAttribute("width", "150");
	img.setAttribute("height", "200");
	img.setAttribute("class","imagemTituloPopUp");
	//img.setAttribute("src",image);
	spanImagem = document.createElement("span");
	spanImagem.setAttribute("class","spanImagemTituloPopUp");
	spanImagem.appendChild(img);
    td3.appendChild(spanImagem);
	
	tr1.appendChild(td1);
	tr2.appendChild(td2);
	tr2.appendChild(td3);
	tr3.appendChild(td4);
	tr4.appendChild(td5);
	tr8.appendChild(td9);
	tr5.appendChild(td6);
	tr6.appendChild(td7);
	tr7.appendChild(td8);
	
	tb.appendChild(tr1);
	tb.appendChild(tr2);
	tb.appendChild(tr3);
	tb.appendChild(tr4);
	tb.appendChild(tr8);
	tb.appendChild(tr5);
	tb.appendChild(tr6);
	tb.appendChild(tr7);
	
	t.appendChild(tb);
	
	divPrincipal.appendChild(t);

}

function createTableBook(xml) {

	var title = xml.getElementsByTagName("title")[0].childNodes[0].nodeValue;
    var author = xml.getElementsByTagName("author")[0].childNodes[0].nodeValue;
    var category = xml.getElementsByTagName("category")[0].childNodes[0].nodeValue;
	try{
        var image = xml.getElementsByTagName("cover")[0].childNodes[0].nodeValue;
    }catch (err){
        var image = false;
    }
	
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
    //img.setAttribute("src", "img/logo.jpg");
	//img.setAttribute("src", image);
	if(image){
       img.setAttribute("src", image); 
    }else{
       img.setAttribute("src", "img/logo.png");  
    }
	
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


function createCallback(div) {
        return function () {
            hideAllDivs();
            div.style.display = "block";
            return false;
        };   
}

function hideAllDivs() {
		divContainer = document.getElementById("all");
		allDivs = divContainer.getElementsByClassName("divTemp");
        var i;
        for (i = 0; i < allDivs.length; i++) {
            allDivs[i].style.display = "none";
        }
}

function showFirstPage(){
		hideAllDivs();
		divContainer = document.getElementById("all");
		allDivs = divContainer.getElementsByClassName("divTemp");
		current = allDivs[0];
        current.style.display = "block";
}

function createLinks() {
        var link, textNode, divContainer, linkContainer, i, current;
        
        divContainer = document.getElementById("all");
        linkContainer = document.getElementById("paging");
		linkContainer.style.display = "block";
		
        allDivs = divContainer.getElementsByClassName("divTemp");
		
			tablePages = document.createElement("table");
			tb = document.createElement("tbody");
			tr = document.createElement("tr");
			td1 = document.createElement("td");
			td2 = document.createElement("td");		
		
		img = document.createElement("img");
		img.setAttribute("src","img/tabulation.png");
		linkContainer.appendChild(img);
		
		span = document.createElement("span");
		
		txtNode = document.createTextNode("Páginas: ");
        span.appendChild(txtNode);
    
        for (i = 0; i < allDivs.length; i++) {
            current = allDivs[i];
            link = document.createElement("a");
            link.innerHTML = "" + (i + 1);
            link.href = "#";
            link.onclick = createCallback(current);
            span.appendChild(link);
            textNode = document.createTextNode(" ");
            span.appendChild(textNode);
        }
		
			td2.appendChild(span);
			td1.appendChild(img);
	
			tr.appendChild(td1);
			tr.appendChild(td2);
	
			tb.appendChild(tr);
	
			tablePages.appendChild(tb);
		
		linkContainer.appendChild(tablePages);
        showFirstPage();
}