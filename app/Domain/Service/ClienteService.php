<?php

namespace ControlaNotas\Domain\Service;

use ControlaNotas\Domain\Repository\Table\Contracts\ClienteRepositoryInterface;

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


}