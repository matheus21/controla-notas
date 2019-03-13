<?php

namespace ControlaNotas\Domain\Repository\Table\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\RepositoryInterface;

interface AbstractRepositoryInterface extends RepositoryInterface
{
    public function findBy(
        array $attributes,
        array $relations = [],
        array $with = [],
        $operableAttribute = []
    ): Builder;

    public function paginatedFindBy(
        $attributes,
        $orderColumn = null,
        $order = 'ASC',
        $itemsPerPage = 20,
        $relations = [],
        $groupBy = [],
        $with = []
    );
}
