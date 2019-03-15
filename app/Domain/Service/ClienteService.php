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
        $cliente = $this->repository->create($cliente);
        return $cliente;
    }

    public function atualizar(array $cliente, int $id): Cliente
    {
        $cliente = $this->repository->update($cliente, $id);
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

    public function listarClientes(array $parametros, $paginar = true)
    {
        $parametros = array_filter($parametros);
        $clientes = $this->repository->findBy($parametros)->get();
        if ($paginar) {
            $clientes = $this->repository->findBy($parametros)->paginate(5);
        }
        return $clientes;
    }
}