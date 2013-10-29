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

function MakeXMLHTTPCallNLivros(n)
{
    xmlHttpObj = CreateXmlHttpRequestObject();

    if (xmlHttpObj)
    {
        // Definição do URL para efectuar pedido HTTP - método GET
        var url = "AJAX/PedidosHTTP.php?idPedido=3&numero=" + n;
        xmlHttpObj.open("GET", url, true);

        // Registo do EventHandler
        xmlHttpObj.onreadystatechange = stateHandler;
        xmlHttpObj.send(null); // pedido enviado ao servidor
    }
}

function stateHandler()
{
    if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
    {
        var xml = xmlHttpObj.responseText;

        // A criar função de tratamento conversão de string recebida para xml
        //var $doc = new DOMParser().parseFromString(xml, "text/html");
        if (window.DOMParser)
        {
            parser = new DOMParser();
            htmlDoc = parser.parseFromString(xml, "text/html");
        }
        else
        {
            htmlDoc = new ActiveXObject("Microsoft.HTMLDOM");
            htmlDoc.async = false;
            htmlDoc.loadHTML(xml);
        }
        var editoras = window.htmlDoc.documentElement.childNodes[1].childNodes[0];
        for(var i = 0; i < editoras.lenght; i++){
            var editora = editoras[i].childNodes;
            for(var j = 0; j < editora.lenght; j++){
                var book = editora[j].childNodes;
                alert("Titulo: " + book[j].text);
            }
        }
        
        alert(txt);
    }
}





