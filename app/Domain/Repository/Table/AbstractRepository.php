<?php

namespace ControlaNotas\Domain\Repository\Table;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository;

abstract class AbstractRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $likeable = [];

    /**
     * @var array
     */
    protected $betweenable = [];

    /**
     * @param array $attributes
     * @param array $relations
     * @param array $with
     * @param array $operableAttribute
     * @return Builder
     * @Example Example usage:
     *      $attributes:
     *      [
     *          'id' : 1,
     *          'nome' : 'Fulano',
     *          'tipo' : [1, 2, 3]
     *      ],
     *      $operableAttribute:
     *      [
     *          '' : [
     *                  'valor' : ['2', '<=']
     *          ],
     *          'relacao' : [
     *                  'valor' : ['1', '!=']
     *          ]
     *      ]
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function findBy(array $attributes, array $relations = [], array $with = [], $operableAttribute = []): Builder
    {
        $model = $this->makeModel();

        $fillable = $model->getFillable();

        $primaryKey = $model->getKeyName();

        $builder = $model->whereRaw('1 = 1');

        foreach ($attributes as $key => $value) {
            if (!in_array($key, $fillable) && $key != $primaryKey) {
                continue;
            }

            if (is_array($value)) {
                if (in_array($key, $this->betweenable)) {
                    $builder = $builder->whereBetween($key, $value);
                } else {
                    $builder = $builder->whereIn($key, $value);
                }
            } elseif (in_array($key, $this->likeable)) {
                $builder = $builder->where($key, 'like', '%' . $value . '%');
            } else {
                $builder = $builder->where($key, $value);
            }
        }

        foreach ($operableAttribute as $relation => $conditions) {
            if (empty($relation)) {
                foreach ($conditions as $column => list($value, $operator)) {
                    $builder = $builder->where($column, $operator, $value);
                }
            } else {
                $builder = $builder->with(
                    [
                        $relation => function ($query) use ($conditions) {
                            foreach ($conditions as $column => list($value, $operator)) {
                                $query->where($column, $operator, $value);
                            }
                        }
                    ]
                );
            }
        }

        foreach ($relations as $relation => $conditions) {
            $builder = $builder->whereHas($relation, function ($query) use ($conditions) {
                foreach ($conditions as $key => $value) {
                    if (is_array($value)) {
                        $query->whereIn($key, $value);
                    } else {
                        $query->where($key, $value);
                    }
                }
            });
        }

        foreach ($with as $relation => $conditions) {
            $builder = $builder->with(
                [
                    $relation => function ($query) use ($conditions) {
                        foreach ($conditions as $key => $value) {
                            if (is_array($value)) {
                                if (empty($value)) {
                                    $query->with([$key]);
                                } else {
                                    $query->whereIn($key, $value);
                                }
                            } else {
                                $query->where($key, $value);
                            }
                        }
                    }
                ]
            );
        }

        return $builder;
    }

    public function paginatedFindBy(
        $attributes,
        $orderColumn = null,
        $order = 'ASC',
        $itemsPerPage = 20,
        $relations = [],
        $groupBy = [],
        $with = []
    ) {
        $builder = $this->findBy($attributes, $relations, $with);
        if ($orderColumn) {
            $builder->orderBy($orderColumn, $order);
        }

        if (!empty($groupBy)) {
            $builder->groupBy($groupBy);
        }

        $paginator = $builder->paginate($itemsPerPage)->withPath('');

        return $paginator;
    }
}
