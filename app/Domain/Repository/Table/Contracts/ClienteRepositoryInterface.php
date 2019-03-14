<?php

namespace ControlaNotas\Domain\Repository\Table\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ClienteRepositoryInterface extends AbstractRepositoryInterface
{
    public function obterClientes(): Collection;
}
