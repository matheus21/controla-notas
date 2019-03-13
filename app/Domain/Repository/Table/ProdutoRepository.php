<?php

namespace ControlaNotas\Domain\Repository\Table;

use ControlaNotas\Domain\Model\Table\Produto;
use ControlaNotas\Domain\Repository\Table\Contracts\ProdutoRepositoryInterface;

class ProdutoRepository extends AbstractRepository implements ProdutoRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Produto::class;
    }
}
