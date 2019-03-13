<?php

namespace ControlaNotas\Domain\Service;

use ControlaNotas\Domain\Repository\Table\Contracts\NotaProdutoRepositoryInterface;

class NotaProdutoService
{
    /**
     * @var NotaProdutoRepositoryInterface
     */
    protected $repository;

    /**
     * NotaProdutoService constructor.
     * @param NotaProdutoRepositoryInterface $repository
     */
    public function __construct(NotaProdutoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


}