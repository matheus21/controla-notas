<?php

namespace ControlaNotas\Domain\Repository\Table;

use ControlaNotas\Domain\Model\Table\Nota;
use ControlaNotas\Domain\Repository\Table\Contracts\NotaRepositoryInterface;

class NotaRepository extends AbstractRepository implements NotaRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Nota::class;
    }
}
