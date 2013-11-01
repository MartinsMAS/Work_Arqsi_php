var xmlHttpObj = null;

function CreateXmlHttpRequestObject( )
{

    if (window.XMLHttpRequest)
    {
        xmlHttpObj = new XMLHttpRequest()

    }
    else if (window.ActiveXObject)
    {
        xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP")
    }
    return xmlHttpObj;
}

function MakeXMLHTTPCallLivrosPorCategoria(categoria)
{
    xmlHttpObj = CreateXmlHttpRequestObject();

    if (xmlHttpObj)
    {
        // Definição do URL para efectuar pedido HTTP - método GET
        xmlHttpObj.open("GET", "AJAX/PedidosHTTP.php?idPedido=5&categoria="+categoria, true);

        // Registo do EventHandler
        xmlHttpObj.onreadystatechange = stateHandlerLivrosPorCategoria;
        xmlHttpObj.send(null); // pedido enviado ao servidor
    }
}

function stateHandlerLivrosPorCategoria()
{
    if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
    {
        var xml = xmlHttpObj.responseXML;
		creteMiddleSection(xml);
        //TRATAMENTO DE XML PARA INSERIR OS LIVROS PESQUISADOS NA PÁGINA
        /*
         * FORMATO XML
         * <editoras>
         *      <editora name="Editora 1">
         *          <book>
         *              <title></title>
         *              ... restantes elementos do livro
         *          </book>
         *      </editora>
         *      <editora name="Editora 1">
         *          <book>
         *              <title></title>
         *              ... restantes elementos do livro
         *          </book>
         *      </editora>
         * </editoras> 
         * 
         */
        
    }
}

function preencheSelectNomesEditoras(text)
{
    var selectCategoria = document.getElementById("comboEditoras");
    selectCategoria.innerHTML = "";
    var vetCat = text.split(',');
    for (var i = 0; i < vetCat.length; i++) {
        nodeoption = document.createElement("option");
        /*Atributo*/
        nodeoption.value = vetCat[i];
        nodeoption.text = vetCat[i];

        selectCategoria.appendChild(nodeoption);
    }
}







