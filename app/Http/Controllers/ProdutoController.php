<?php

namespace ControlaNotas\Http\Controllers;

use ControlaNotas\Domain\Service\ProdutoService;

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

    public function form()
    {
        return view('produto.form');
    }
}