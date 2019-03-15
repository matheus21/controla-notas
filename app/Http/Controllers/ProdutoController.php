<?php

namespace ControlaNotas\Http\Controllers;

use ControlaNotas\Domain\Model\Table\Produto;
use ControlaNotas\Domain\Service\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * @var ProdutoService
     */
    private $service;

    /**
     * ProdutoController constructor.
     * @param ProdutoService $service
     */
    public function __construct(ProdutoService $service)
    {
        $this->service = $service;
    }

    public function form($id = null)
    {
        $produto = new Produto();

        if($id) {
            $produto = $this->service->obterProduto($id);
        }

        return view('produto.form', compact('produto'));
    }

    public function post(Request $request)
    {
        $produto = $request->all();
        $this->service->cadastrar($produto);

        return view('produto.form');
    }

    public function list(Request $request)
    {
        $produtos = $this->service->listarProdutos($request->all());

        return view('produto.list', compact('produtos'));
    }

    public function put(Request $request, $id)
    {
        $produto = $request->all();
        $this->service->atualizar($produto, $id);

        return redirect()->route('produto.list');
    }
}