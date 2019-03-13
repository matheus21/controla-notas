<?php

namespace ControlaNotas\Domain\Model\Table;

class NotaProduto extends ModelAbstract
{
    protected $table = 'nota_produto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nota_id',
        'produto_id',
        'quantidade'
    ];

    public function rules()
    {
        return [
            'nota_id'    => 'nullable|exists:nota,nota_id',
            'produto_id' => 'nullable|exists:produto,produto_id',
            'quantidade' => 'nullable'
        ];
    }

    public function nota()
    {
        return $this->hasMany(Nota::class, 'nota_id', 'id');
    }

    public function produto()
    {
        return $this->hasMany(Produto::class, 'produto_id', 'id');
    }
}
