<?php

namespace ControlaNotas\Http\Controllers;

use ControlaNotas\Domain\Service\NotaService;

class NotaController extends Controller
{
    /**
     * @var NotaService
     */
    private $service;

    /**
     * NotaController constructor.
     * @param NotaService $service
     */
    public function __construct(NotaService $service)
    {
        $this->service = $service;
    }
}