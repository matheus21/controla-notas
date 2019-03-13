<?php

namespace ControlaNotas\Domain\Repository\Table;

use ControlaNotas\Domain\Model\Table\Cliente;
use ControlaNotas\Domain\Repository\Table\Contracts\ClienteRepositoryInterface;

class ClienteRepository extends AbstractRepository implements ClienteRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cliente::class;
    }
}
