<?php

namespace ControlaNotas\Http\Controllers;

use ControlaNotas\Domain\Model\Table\Cliente;
use ControlaNotas\Domain\Service\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * @var ClienteService
     */
    private $service;

    /**
     * ClienteController constructor.
     * @param ClienteService $service
     */
    public function __construct(ClienteService $service)
    {
        $this->service = $service;
    }

    public function form($id = null)
    {
        $cliente = new Cliente();

        if($id){
            $cliente = $this->service->obterCliente($id);
        }

        return view('cliente.form', compact('cliente'));
    }

    public function post(Request $request)
    {
        $cliente = $request->all();
        $this->service->cadastrar($cliente);

        return view('cliente.form');
    }

}