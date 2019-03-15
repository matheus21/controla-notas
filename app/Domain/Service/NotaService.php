<?php

namespace ControlaNotas\Domain\Service;

use Carbon\Carbon;
use ControlaNotas\Domain\Model\Table\Nota;
use ControlaNotas\Domain\Repository\Table\Contracts\NotaProdutoRepositoryInterface;
use ControlaNotas\Domain\Repository\Table\Contracts\NotaRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
            'data_emissao' => $nota['data_emissao'],
            'cliente_id' => $nota['cliente_id'],
            'codigo' => $nota['codigo'],
            'valor_total' => $nota['valor_total']
        ]);

        foreach($nota['quantidade'] as $index => $quantidade) {
            $notaProduto['nota_id'] = $novaNota->id;
            $notaProduto['quantidade'] = $quantidade;
            $notaProduto['produto_id'] = $nota['produto_id'][$index];
            $notaProduto['valor_produto'] = $nota['valor_produto'][$index];
            $this->notaProdutoRepository->create($notaProduto);
        }

        return $novaNota;
    }

    public function atualizar(array $nota, int $id): Nota
    {
        $notaAtualizada = $this->repository->update([
            'data_emissao' => $nota['data_emissao'],
            'cliente_id' => $nota['cliente_id'],
            'codigo' => $nota['codigo'],
            'valor_total' => $nota['valor_total']
        ], $id);

        $this->notaProdutoRepository->deleteWhere(['nota_id' => $id]);

        foreach($nota['quantidade'] as $index => $quantidade) {
            $notaProduto['nota_id'] = $notaAtualizada->id;
            $notaProduto['quantidade'] = $quantidade;
            $notaProduto['produto_id'] = $nota['produto_id'][$index];
            $notaProduto['valor_produto'] = $nota['valor_produto'][$index];
            $this->notaProdutoRepository->create($notaProduto);
        }

        return $notaAtualizada;
    }

    public function obterNota(int $id): Nota
    {
        $nota = $this->repository->find($id);
        return $nota;
    }

    public function listarNotas(array $parametros, $paginar = true)
    {
        $parametros = array_filter($parametros);
        $notas = $this->repository->findBy($parametros)->get();
        if ($paginar) {
            $notas = $this->repository->findBy($parametros)->paginate(5);
        }
        return $notas;
    }
}