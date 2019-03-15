function converteFormatoMoedaEmFloat(campo) {
    let valor = campo.val();
    valor = parseFloat(valor.replace(".", "").replace(",", "."));
    $('#valor').val(isNaN(valor) ? 0.00 : valor);
}

function select2() {
    $(document).ready(function() {
        $('select').select2({
            allowClear: true,
            placeholder: "Todos"
        });
    });
}

function adicionarProduto() {

    let campoValorTotal = $('#valor_total');
    let quantidade = $('#quantidade');
    let selectProdutos = $('#produto_id');

    if(quantidade.val() === ""|| parseFloat(quantidade.val()) === 0 || selectProdutos.val() === null) {
        exibirAlerta("Insira uma quantidade superior a zero e selecione um produto!", "Ok");
        return;
    }

    let valorProduto = parseFloat(selectProdutos.find(':selected').data('valor'));
    let nomeProduto = selectProdutos.find(':selected').text();
    let idProduto = selectProdutos.find(':selected').val();
    let valorDosProdutos = parseFloat(quantidade.val()) * valorProduto;

    if($('#item' + idProduto).length > 0) {
        exibirAlerta("Você já adicionou este produto!", "Ok");
        return;
    }

    let clone = $('#item_clone').not(':visible').clone();
    clone.attr('id', 'item' + idProduto);
    clone.find('input[type=hidden][name="quantidade[]"]').val(quantidade.val());
    clone.find('input[type=hidden][name="produto_id[]"]').val(idProduto);
    clone.find('input[type=hidden][name="valor_produto[]"]').val(valorProduto);
    clone.attr('data-valor-produtos', valorDosProdutos);
    clone.find('.nome_produto').text(nomeProduto);
    clone.find('.badge').text(quantidade.val());
    clone.css('display', 'block');

    let valorTotalAtual = isNaN(parseFloat(campoValorTotal.val())) ? 0.00 : parseFloat(campoValorTotal.val());
    campoValorTotal.val(valorTotalAtual + valorDosProdutos);
    selectProdutos.val('').change();
    quantidade.val('');

    $('.list-group').append(clone);
}

function removerProduto(botaoRemover) {

    swal({
        text: "Deseja remover o produto?",
        icon: "warning",
        buttons: {cancel: "Fechar", confirm: "Ok"},
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let valorProdutos = botaoRemover.parent().data('valor-produtos');
            let campoValorTotal = $('#valor_total');
            campoValorTotal.val(parseFloat(campoValorTotal.val()) - parseFloat(valorProdutos));
            botaoRemover.parent().remove();
        }
    });
}

function removerClone(form) {
    let quantidadeProdutos = $('.list-group-item:visible').length;

    if(quantidadeProdutos <= 0) {
        swal({
            title: "Aviso",
            text: "Insira ao menos um produto na nota!",
            icon: "error",
            button: "Ok",
        });
        return false;
    }

    $('#item_clone').not(':visible').remove();
    form.submit();
}

function exibirAlerta(texto, botao){
    swal({
        text: texto,
        button: botao,
    });
}

function alteraActionForm(botaoSubmit){
    let route = botaoSubmit.data('route');
    let form = botaoSubmit.closest('form');
    form.attr('action', route);
}

select2();

