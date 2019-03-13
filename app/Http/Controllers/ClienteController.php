<?php

namespace ControlaNotas\Http\Controllers;

use ControlaNotas\Domain\Service\ClienteService;

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

    public function form()
    {
        return view('cliente.form');
    }

}