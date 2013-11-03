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

function MakeXMLHTTPCallLivrosPorTitulo(titulo)
{
    xmlHttpObj = CreateXmlHttpRequestObject();

    if (xmlHttpObj)
    {
        // Definição do URL para efectuar pedido HTTP - método GET
        xmlHttpObj.open("GET", "editora3.php?titulo=" + titulo, true);

        // Registo do EventHandler
        xmlHttpObj.onreadystatechange = stateHandlerLivrosPorTitulo;
        xmlHttpObj.send(null); // pedido enviado ao servidor
    }
}

function stateHandlerLivrosPorTitulo()
{
    if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
    {
        var xml = xmlHttpObj.responseXML;
        if (xml.activeElement.nodeValue == null) {
            //testa se é json
            var txt = xmlHttpObj.responseText;
            try {
                var objJson = eval("(" + txt + ")");
                var printTeste = "Titulo: " + objJson.book[0].title + "\n"
                        + "Autor: " + objJson.book[0].author + "\n"
                        + "Categoria: " + objJson.book[0].category + "\n"
                        + "Isbn: " + objJson.book[0].isbn + "\n"
                        + "News: " + objJson.book[0].news;
                alert(printTeste);
            } catch (err) {
                
            }

        }
        
    }
}







