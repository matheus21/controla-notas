<?php

namespace ControlaNotas\Domain\Service;

use Carbon\Carbon;
use ControlaNotas\Domain\Model\Table\Cliente;
use ControlaNotas\Domain\Repository\Table\Contracts\ClienteRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ClienteService
{
    /**
     * @var ClienteRepositoryInterface
     */
    protected $repository;

    /**
     * ClienteService constructor.
     * @param ClienteRepositoryInterface $repository
     */
    public function __construct(ClienteRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function cadastrar(array $cliente): Cliente
    {
        $cliente['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $cliente['data_nascimento'])->format('Y-m-d');
        $cliente = $this->repository->create($cliente);
        return $cliente;
    }

    public function obterClientes(array $campos): Collection
    {
        $clientes = $this->repository->all($campos);
        return $clientes;
    }

    public function obterCliente(int $id): Cliente
    {
        $cliente = $this->repository->find($id);
        return $cliente;
    }
}