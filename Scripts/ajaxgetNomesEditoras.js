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

function MakeXMLHTTPCallNomesEdtoras()
{
    xmlHttpObj = CreateXmlHttpRequestObject();

    if (xmlHttpObj)
    {
        // Definição do URL para efectuar pedido HTTP - método GET
        xmlHttpObj.open("GET", "AJAX/PedidosHTTP.php?idPedido=6", true);

        // Registo do EventHandler
        xmlHttpObj.onreadystatechange = stateHandlerNomesEditoras;
        xmlHttpObj.send(null); // pedido enviado ao servidor
    }
}

function stateHandlerNomesEditoras()
{
    if (xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
    {
        var text = xmlHttpObj.responseText;
        //preencheSelectCategorias(xml);
        preencheSelectNomesEditoras(text)
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

function valida() {
    var cx_nLivrosEditora = document.getElementById("nLivrosEditora").value;
    var cx_showNResultsPage = document.getElementById("showNResultsPage").value;

    var patt1 = /1|2|3|4|5|6|7|8|9/;

    var ok = true;
    var strErro = "Erro de preenchimento nos seguintes campos:\n";
    
    if (!patt1.test(cx_nLivrosEditora)) {
        strErro += "Resultados por editora.\n";
        ok = false;
    }

    if (!patt1.test(cx_showNResultsPage)) {
        strErro += "Resultados por página.\n";
        ok = false;
    }
    if (ok == false) {
        strErro += "Por favor, insira um valor entre 1 - 19";
        alert(strErro);
        return false;
    }else{
        return true;
    }




}





