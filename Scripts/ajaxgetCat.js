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

function MakeXMLHTTPCallCategorias()
{
    //alert("Chegou ao Make");
    xmlHttpObj = CreateXmlHttpRequestObject();

    if (xmlHttpObj)
    {
        // Definição do URL para efectuar pedido HTTP - método GET
        xmlHttpObj.open("GET", "AJAX/PedidosHTTP.php?idPedido=1", true);

        // Registo do EventHandler
        xmlHttpObj.onreadystatechange = stateHandlerNew;
        xmlHttpObj.send(null); // pedido enviado ao servidor
    }
}

function stateHandlerNew()
{
    if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
    {
        var text = xmlHttpObj.responseText;
        preencheSelectCategorias(text)
    }
}

function preencheSelectCategorias(text)
{
    var selectCategoria = document.getElementById("comboCategorias");
    selectCategoria.innerHTML = "";
    var vetCat = text.split(',');
    nodeoption = document.createElement("option");
    nodeoption.value = "none";
    nodeoption.text = "-----";
    selectCategoria.appendChild(nodeoption);
    for (var i = 0; i < vetCat.length; i++) {
        nodeoption = document.createElement("option");
        /*Atributo*/
        nodeoption.value = vetCat[i];
        nodeoption.text = vetCat[i];

        selectCategoria.appendChild(nodeoption);
    }
}





