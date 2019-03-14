<?php

namespace ControlaNotas\Domain\Service;

use Carbon\Carbon;
use ControlaNotas\Domain\Model\Table\Nota;
use ControlaNotas\Domain\Repository\Table\Contracts\NotaProdutoRepositoryInterface;
use ControlaNotas\Domain\Repository\Table\Contracts\NotaRepositoryInterface;

class NotaService
{
    /**
     * @var NotaRepositoryInterface
     */
    protected $repository;

    /**
     * @var NotaProdutoRepositoryInterface
     */
    protected $notaProdutoRepository;

    /**
     * NotaService constructor.
     * @param NotaRepositoryInterface $repository
     * @param NotaProdutoRepositoryInterface $notaProdutoRepository
     */
    public function __construct(NotaRepositoryInterface $repository, NotaProdutoRepositoryInterface $notaProdutoRepository)
    {
        $this->repository = $repository;
        $this->notaProdutoRepository = $notaProdutoRepository;
    }

    public function cadastrar(array $nota): Nota
    {
        $novaNota = $this->repository->create([
            'data_emissao' => Carbon::createFromFormat('d/m/Y', $nota['data_emissao'])->format('Y-m-d'),
            'cliente_id' => $nota['cliente_id'],
            'codigo' => $nota['codigo'],
            'valor_total' => $nota['valor_total']
        ]);

        foreach($nota['quantidade'] as $index => $quantidade) {
            $notaProduto['nota_id'] = $novaNota->id;
            $notaProduto['quantidade'] = $quantidade;
            $notaProduto['produto_id'] = $nota['produto_id'][$index];
            $this->notaProdutoRepository->create($notaProduto);
        }

        return $novaNota;
    }

    public function obterNota(int $id): Nota
    {
        $nota = $this->repository->find($id);
        return $nota;
    }
}