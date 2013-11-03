function generateRDFa(book) {
    
    tagDiv = document.getElementById("divRDF");
    
    tagSpanTitulo = document.createElement("span");
    tagSpanTitulo.setAttribute("property","dc:title");
    txtTitle = document.createTextNode(book.childNodes[0].textContent);
    tagSpanTitulo.appendChild(txtTitle);
    tagDiv.appendChild(tagSpanTitulo);
    
    /*
    tagHTML = document.getElementsByTagName("html")[0];
    
    tagHTML.setAttribute("xmlns:ed", "http://www.dei.isep.ipp.pt/arqsi/editoras#");
    tagHTML.setAttribute("xmlns:rdf", "http://www.w3.org/1999/02/22-rdf-syntax-ns#");
    tagHTML.setAttribute("xmlns:h", "http://www.w3.org/1999/xhtml");
    tagHTML.setAttribute("xmlns", "http://www.w3.org/1999/xhtml");


    var i = 1;
    divRDF = document.getElementById("divRDF");
    tagSpan = document.createElement("span");
    tagSpan.setAttribute("typeof", "ed:book");
    tagSpan.setAttribute("resource", "#book1." + i);

    */
/*
    ulTagTitulo = document.createElement("ul");
    spanTitulo = document.createElement("span");
    
    spanTitulo.setAttribute("property", "ed:title");
    ulTxtNodeTitulo = document.createTextNode(book.childNodes[0].textContent);
    spanTitulo.appendChild(ulTxtNodeTitulo);
    ulTagTitulo.appendChild(spanTitulo);
    tagSpan.appendChild(ulTagTitulo);

    ulTagAuthor = document.createElement("ul");
    spanAuthor = document.createElement("span");
    
    spanAuthor.setAttribute("property", "ed:author");
    ulTxtNodeAuthor = document.createTextNode(book.childNodes[1].textContent);
    spanAuthor.appendChild(ulTxtNodeAuthor);
    ulTagAuthor.appendChild(spanAuthor)
    tagSpan.appendChild(ulTagAuthor);
    
    */
    /*
    ulTagCategory = document.createElement("ul");
    ulTagCategory.setAttribute("property", "ed:category");
    ulTxtNodeCategory = document.createTextNode(book.childNodes[2].textContent);
    ulTagCategory.appendChild(ulTxtNodeCategory);
    tagSpan.appendChild(ulTagCategory);
    
    ulTagIsbn = document.createElement("ul");
    ulTagIsbn.setAttribute("property", "ed:isbn");
    ulTxtNodeIsbn = document.createTextNode(book.childNodes[3].textContent);
    ulTagIsbn.appendChild(ulTxtNodeIsbn);
    tagSpan.appendChild(ulTagIsbn);
    
    ulTagPublicacao = document.createElement("ul");
    ulTagPublicacao.setAttribute("property", "ed:publicacao");
    ulTxtNodePublicacao = document.createTextNode(book.childNodes[4].textContent);
    ulTagPublicacao.appendChild(ulTxtNodePublicacao);
    tagSpan.appendChild(ulTagPublicacao);
    */
    
        
}
