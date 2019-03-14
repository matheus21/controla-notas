function converteFormatoMoedaEmFloat(campo) {
    var valor = campo.val();
    valor = parseFloat(valor.replace(".", "").replace(",", "."));
    $('#valor').val(isNaN(valor) ? 0.00 : valor);
}

function select2() {
    $(document).ready(function() {
        $('select').select2();
    });
}

function adicionarProduto() {

    var campoValorTotal = $('#valor_total');
    var quantidade = $('#quantidade');
    var selectProdutos = $('#produto_id');

    if(quantidade.val() === ""|| parseFloat(quantidade.val()) === 0 || selectProdutos.val() === null) {
        console.log("Insira uma quantidade superior a 0");
        return;
    }

    var valorProduto = parseFloat(selectProdutos.find(':selected').data('valor'));
    var nomeProduto = selectProdutos.find(':selected').text();
    var idProduto = selectProdutos.find(':selected').val();
    var valorDosProdutos = parseFloat(quantidade.val()) * valorProduto;

    if($('#item' + idProduto).length > 0) {
        console.log("Voce ja adicionou este produto");
        return;
    }

    var clone = $('#item_clone').not(':visible').clone();
    clone.attr('id', 'item' + idProduto);
    clone.find('input[type=hidden]').first().val(quantidade.val());
    clone.find('input[type=hidden]').last().val(idProduto);
    clone.attr('data-valor-produtos', valorDosProdutos);
    clone.find('.nome_produto').text(nomeProduto);
    clone.find('.badge').text(quantidade.val());
    clone.css('display', 'block');

    var valorTotalAtual = isNaN(parseFloat(campoValorTotal.val())) ? 0.00 : parseFloat(campoValorTotal.val());
    campoValorTotal.val(valorTotalAtual + valorDosProdutos);
    selectProdutos.val('').change();
    quantidade.val('');

    $('.list-group').append(clone);
}

function removerProduto(botaoRemover) {
    var valorProdutos = botaoRemover.parent().data('valor-produtos');
    var campoValorTotal = $('#valor_total');
    campoValorTotal.val(parseFloat(campoValorTotal.val()) - parseFloat(valorProdutos));

    botaoRemover.parent().remove();
}

function removerClone() {
    $('#item_clone').not(':visible').remove();
}

select2();