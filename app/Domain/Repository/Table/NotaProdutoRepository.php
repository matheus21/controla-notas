<?php

namespace ControlaNotas\Domain\Repository\Table;

use ControlaNotas\Domain\Model\Table\NotaProduto;
use ControlaNotas\Domain\Repository\Table\Contracts\NotaProdutoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class NotaProdutoRepository extends AbstractRepository implements NotaProdutoRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NotaProduto::class;
    }
}
