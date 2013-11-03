function generateRDFa(book) {
    tagHTML = document.getElementsByName("html")[0];
    tagHTML.setAttributeNS("xmlns:ed", "http://www.dei.isep.ipp.pt/arqsi/editoras#");
    tagHTML.setAttributeNS("xmlns:rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
    tagHTML.setAttributeNS("xmlns:h", "http://www.w3.org/1999/xhtml");
    tagHTML.setAttributenS("xmlns", "http://www.w3.org/1999/xhtml");


    var i = 1;
    divRDF = document.getElementById("divRDF");
    tagSpan = document.createElement("span");
    tagSpan.setAttribute("typeof", "ed:book");
    tagSpan.setAttribute("resource", "#book1." + i);

    ulTagTitulo = document.createElement("ul");
    ulTagTitulo.setAttribute("property", "ed:title");
    ulTxtNodeTitulo = document.createElement(book.childNodes[0].nodeValue);
    ulTagTitulo.appendChild(ulTxtNodeTitulo);
    tagSpan.appendChild(ulTagTitulo);

    ulTagAuthor = document.createElement("ul");
    ulTagAuthor.setAttribute("property", "ed:author");
    ulTxtNodeAuthor = document.createElement(book.childNodes[1].nodeValue);
    ulTagAuthor.appendChild(ulTxtNodeAuthor);
    tagSpan.appendChild(ulTagAuthor);
    
    ulTagCategory = document.createElement("ul");
    ulTagCategory.setAttribute("property", "ed:category");
    ulTxtNodeCategory = document.createElement(book.childNodes[2].nodeValue);
    ulTagCategory.appendChild(ulTxtNodeCategory);
    tagSpan.appendChild(ulTagCategory);
    
    ulTagIsbn = document.createElement("ul");
    ulTagIsbn.setAttribute("property", "ed:isbn");
    ulTxtNodeIsbn = document.createElement(book.childNodes[3].nodeValue);
    ulTagIsbn.appendChild(ulTxtNodeIsbn);
    tagSpan.appendChild(ulTagIsbn);
    
    ulTagPublicacao = document.createElement("ul");
    ulTagPublicacao.setAttribute("property", "ed:publicacao");
    ulTxtNodePublicacao = document.createElement(book.childNodes[4].nodeValue);
    ulTagPublicacao.appendChild(ulTxtNodePublicacao);
    tagSpan.appendChild(ulTagPublicacao);
    
    divRDF.appendChild(tagSpan);
    
}
