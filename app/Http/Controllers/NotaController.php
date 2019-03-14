<?php

namespace ControlaNotas\Http\Controllers;

use ControlaNotas\Domain\Service\ClienteService;
use ControlaNotas\Domain\Service\NotaService;
use ControlaNotas\Domain\Service\ProdutoService;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * @var NotaService
     */
    private $service;

    /**
     * @var ClienteService
     */
    private $clienteService;

    /**
     * @var ProdutoService
     */
    private $produtoService;

    /**
     * NotaController constructor.
     * @param NotaService $service
     * @param ClienteService $clienteService
     * @param ProdutoService $produtoService
     */
    public function __construct(
        NotaService $service,
        ClienteService $clienteService,
        ProdutoService $produtoService
    ){
        $this->service = $service;
        $this->clienteService = $clienteService;
        $this->produtoService = $produtoService;
    }

    public function form()
    {
        $clientes = $this->clienteService->obterClientes(['id', 'nome']);
        $produtos = $this->produtoService->obterProdutos(['id', 'nome', 'valor']);

        return view('nota.form', compact('clientes', 'produtos'));
    }

    public function post(Request $request)
    {
        $nota = $request->all();
        $this->service->cadastrar($nota);

        return view('cliente.form');
    }
}