var xmlHttpObj = null;

function CreateXmlHttpRequestObject( )
{

    if (window.XMLHttpRequest)
    {
        xmlHttpObj = new XMLHttpRequest();

    }
    else if (window.ActiveXObject)
    {
        xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlHttpObj;
}

function MakeXMLHTTPCallSinopse()
{
    //alert("Chegou ao Make");
    xmlHttpObj = CreateXmlHttpRequestObject();

    if (xmlHttpObj)
    {
        // Definição do URL para efectuar pedido HTTP - método GET
        xmlHttpObj.open("GET", "AJAX/PedidosHTTP.php?idPedido=7", true);

        // Registo do EventHandler
        xmlHttpObj.onreadystatechange = stateHandlerNew;
        xmlHttpObj.send(null); // pedido enviado ao servidor
    }
}

function stateHandlerSinopse()
{
    if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
    {
        var text = xmlHttpObj.responseText;
        //CHAMADA À FUNÇÃO QUE PREENCHE SINOPSE
    }
}






