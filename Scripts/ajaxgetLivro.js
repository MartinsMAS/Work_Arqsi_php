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

function MakeXMLHTTPCallLivro(titulo)
{
    xmlHttpObj = CreateXmlHttpRequestObject();

    if (xmlHttpObj)
    {
        // Defini��o do URL para efectuar pedido HTTP - m�todo GET
        var url = "AJAX/PedidosHTTP.php?idPedido=2&titulo=" + titulo;
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
        var xml = xmlHttpObj.responseXML;
        
        alert();
    }
}

function carregaLivro(text)
{
   
}