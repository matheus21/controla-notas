<?php

namespace ControlaNotas\Domain\Service;

use ControlaNotas\Domain\Model\Table\Produto;
use ControlaNotas\Domain\Repository\Table\Contracts\ProdutoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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

    public function cadastrar(array $produto): Produto
    {
        $produto = $this->repository->create($produto);
        return $produto;
    }

    public function obterProdutos(array $campos): Collection
    {
        $produtos = $this->repository->all($campos);
        return $produtos;
    }

}