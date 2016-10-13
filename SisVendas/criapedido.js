var conectadb = function (local) {

    var produto = $('#produto').val();

    console.log(produto);

    $.post('pegapedidos.php', {produto: produto}, function (data) {

       var obj = jQuery.parseJSON(data);

        for (var i in obj) {

            addbusca(obj[i].id, obj[i].codigo_Produto, obj[i].nome_Mercadoria, obj[i].quantidade, obj[i].preco);
        }

        if ($(".nome-mercadoria").click((chamaConexao))) {

        }

    });

};


var addbusca = function (id, codigo_Produto, nome_Mercadoria, quantidade, preco) {

    if (codigo_Produto === "") {
        return;
    } else {

        var pegadiv = document.getElementById("div1");
        var criar = document.createElement("a");

        criar.setAttribute("id", id);
        criar.setAttribute("class", "list-group-item");
        pegadiv.appendChild(criar);

        addtable(id);
        AddTableRow(id, codigo_Produto, nome_Mercadoria, quantidade, preco);

    }
};


/*adiciona tabela para o campo busca */
var addtable = function (id) {

    var pegaa = document.getElementById(id);
    var criar = document.createElement("table");
    criar.setAttribute("id", "t".concat(id));
    criar.setAttribute("class", "resultados-busca");

    pegaa.appendChild(criar);

};

/*cria colunas dinamicamente para o campo de busca*/
var colunas = function (id, param, classe) {
    //  console.log("Coluna");
    var cparam = id.concat(param);

    var td = '<td width="217px" id="td';
    var ctd = td.concat(cparam);
    var td1 = ctd.concat('" class="');
    var td2 = td1.concat(classe);
    var ctd1 = td2.concat('">');

    var tdcon = ctd1.concat(param);
    var tdcon2 = tdcon.concat('</td>');
    return tdcon2;

};

var AddTableRow = function (id, codigo_Produto, nome_Mercadoria, quantidade, preco) {
    // console.log("AddTableRow");

    var newRow = $("<tr>");
    var cols = "";

    cols += colunas(id, codigo_Produto, "codigo-produto");
    cols += colunas(id, nome_Mercadoria, "nome-mercadoria");
    cols += colunas(id, quantidade, "quantidade");
    cols += colunas(id, preco, "preco");
    //  console.log(colunas(id));
    newRow.append(cols);

    $("#t".concat(id)).append(newRow);

};