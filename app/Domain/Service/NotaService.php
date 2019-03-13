<?php

namespace ControlaNotas\Domain\Service;

use ControlaNotas\Domain\Repository\Table\Contracts\NotaRepositoryInterface;

class NotaService
{
    /**
     * @var NotaRepositoryInterface
     */
    protected $repository;

    /**
     * NotaService constructor.
     * @param NotaRepositoryInterface $repository
     */
    public function __construct(NotaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


}