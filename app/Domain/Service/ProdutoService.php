<?php

namespace ControlaNotas\Domain\Service;

use ControlaNotas\Domain\Repository\Table\Contracts\ProdutoRepositoryInterface;

class ProdutoService
{
    /**
     * @var ProdutoRepositoryInterface
     */
    protected $repository;

    /**
     * ProdutoService constructor.
     * @param ProdutoRepositoryInterface $repository
     */
    public function __construct(ProdutoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


}