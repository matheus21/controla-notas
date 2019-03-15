<?php

namespace ControlaNotas\Http\Controllers;

use ControlaNotas\Domain\Model\Table\Nota;
use ControlaNotas\Domain\Service\ClienteService;
use ControlaNotas\Domain\Service\NotaService;
use ControlaNotas\Domain\Service\ProdutoService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function form($id = null)
    {
        $nota = new Nota();
        $notaProdutos = null;
        if($id) {
            $nota = $this->service->obterNota($id);
        }

        $clientes = $this->clienteService->obterClientes(['id', 'nome']);
        $produtos = $this->produtoService->obterProdutos(['id', 'nome', 'valor']);


        return view('nota.form', compact('clientes', 'produtos', 'nota', 'notaProdutos'));
    }

    public function post(Request $request)
    {
        $nota = $request->all();
        $this->service->cadastrar($nota);

        return redirect()->route('nota.list');
    }

    public function put(Request $request, $id)
    {
        $nota = $request->all();
        $this->service->atualizar($nota, $id);

        return redirect()->route('nota.list');
    }

    public function list(Request $request)
    {
        $clientes = $this->clienteService->obterClientes(['id', 'nome']);
        $notas = $this->service->listarNotas($request->all());

        return view('nota.list', compact('clientes', 'notas'));
    }

    public function pdf(Request $request)
    {
        $notas = $this->service->listarNotas($request->all(), false);

        return PDF::loadView('nota.relatorio', compact('notas'))
            ->download('relatorio_notas.pdf');
    }
}