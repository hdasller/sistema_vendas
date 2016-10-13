/*faz conexao com o banco para exibir os valores*/
var conectadb = function (local) {

    var produto = $('#produto').val();

    console.log(produto);

    $.post('process_name.php', {produto: produto}, function (data) {

        var obj = jQuery.parseJSON(data);

        for (var i in obj) {

            addbusca(obj[i].id, obj[i].codigo_Produto, obj[i].nome_Mercadoria, obj[i].quantidade, obj[i].preco);
        }

        if ($(".nome-mercadoria").click((chamaConexao))) {

        }

    });

};


/*conexao com o banco para compras*/

var dbaddcompra = function (valorencontrado, aux) {

    var produto = valorencontrado;


    $.post('process_name.php', {produto: produto}, function (data) {
        var obj = jQuery.parseJSON(data);
        for (var i in obj) {

            if (obj[i].nome_Mercadoria == valorencontrado) {

                addcompra(obj[i].id, obj[i].codigo_Produto, obj[i].nome_Mercadoria, obj[i].preco, valorencontrado, aux);

            }

        }

    });

};
/*add compra a div1 que exibe os produtos*/
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

aux = 0;
/*add compra a div2 que gera os pedidos*/
var addcompra = function (id, codigo_Produto, nome_Mercadoria, preco, ultimo, aux) {

    var pegadiv = document.getElementById("div2");
    var criar = document.createElement("a");
    criar.setAttribute("id", "a".concat(aux));
    criar.setAttribute("class", "list-group-item");
    pegadiv.appendChild(criar);

    addtable2("a".concat(aux), aux);
    AddTableRowCompra(id, codigo_Produto, nome_Mercadoria, preco);

};

/*adiciona tabela para o campo compra */
var addtable2 = function (id, aux) {
    //  console.log("addtable");
    // console.log("a".concat(aux));
    var pegaa = document.getElementById(id);
    var criar = document.createElement("table");
    criar.setAttribute("id", "td".concat(aux));
    criar.setAttribute("class", "resultados-busca");
    //criar.setAttribute("class", "list-group-item");
    pegaa.appendChild(criar);



};

/*adiciona tabela para o campo busca */
var addtable = function (id) {

    var pegaa = document.getElementById(id);
    var criar = document.createElement("table");
    criar.setAttribute("id", "t".concat(id));
    criar.setAttribute("class", "resultados-busca");

    pegaa.appendChild(criar);

};
/*adiciona colunas dinamicamente para o campo de compra*/
var colunas2 = function (id, param, classe) {
    console.log("Coluna");
    var cparam = id.concat(param);

    var td = '<td width="217px" id="td';
    var ctd = td.concat(cparam);
    var td1 = ctd.concat('" class="');
    var td2 = td1.concat("t".concat(classe));
    var ctd1 = td2.concat('">');

    var tdcon = ctd1.concat(param);
    var tdcon2 = tdcon.concat('</td>');

    return tdcon2;

};

/*adiciona linhas dinamicamente para o campo de compra*/
var AddTableRowCompra = function (id, codigo_Produto, nome_Mercadoria, preco) {
//console.log("AddTableRowCompra");
    var newRow = $("<tr>");
    var cols = "";

    cols += colunas2(id, codigo_Produto, "codigo-produto");
    cols += colunas2(id, nome_Mercadoria, "nome-mercadoria");
    cols += colunas2(id, preco, "tpreco");
    cols += '<td id="tquantidades" class="quantidades"><input type="number" class="qtd-total"> <td>';
    //  console.log(colunas(id));
    newRow.append(cols);

    $("#a".concat(aux)).append(newRow);

};


var gerapedidos = function (){
    var preco = $('.ttpreco');
    var qtd = $('.qtd-total');
    var produto = $('.tcodigo-produto');
    var total = $("#total-valor");
    var cliente = $('#cliente');
    $.post('salvapedido.php', {preco: preco, qtd: qtd, produto: produto, total: total, cliente:cliente}, function (data) {

    });
    
};




/*Faz calculo dos valores dos campos de compra quantidade/preco */
var calcular = function () {

    var qtd = $('.qtd-total');
    var qtdTotal = 0;
    var preco = $('.ttpreco');
    var precoTotal = 0;

    for (var i = 0; i < qtd.length; i++) {

        var aux = $(qtd[i]);

        var total = parseFloat(aux.val());

        qtdTotal = qtdTotal + total;

    }



    for (var i = 0; i < preco.length; i++) {

        var aux = $(preco[i]);

        var total = parseFloat(aux.text());

        precoTotal = precoTotal + total;


    }

    precoTotal = precoTotal * qtdTotal;
    var precott = "Valor total: ".concat(precoTotal);
    $('#total-valor').text(precott);


};
/*adiciona linhas dinamicamente para o campo de busca*/
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
/*chama a conexao passando contador aux como parametro*/
var chamaConexao = function (event) {

    aux++;
    event.preventDefault();

    var self = $(this);
    var ultimo = self.closest("td").text();

    dbaddcompra(ultimo, aux);

};

/*remover conteudo da tabela*/
var remove = function (event) {

    event.preventDefault();
    var self = $(this);
    self.closest().remove();
};
var aposInicializado = function () {

    $(".remove-table").click(remove);

    $('#bt2').click(auxiliar);
    $('#gerapedido').click(calcular);


// console.log("aposInicializado");


};
/*Ao clicar na tecla Enter  chama a conexao com o bd */
$(document).keypress(function (e) {
    if (e.which === 13) {

        conectadb("div1");
    }
});

$(aposInicializado);


