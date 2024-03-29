<?php

namespace ControlaNotas\Domain\Model\Table;

class NotaProduto extends ModelAbstract
{
    protected $table = 'nota_produto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nota_id',
        'produto_id',
        'quantidade',
        'valor_produto'
    ];

    public function rules()
    {
        return [
            'nota_id'    => 'nullable|exists:nota,id',
            'produto_id' => 'nullable|exists:produto,id',
            'quantidade' => 'nullable',
            'valor_produto' => 'nullable'
        ];
    }

    public function nota()
    {
        return $this->belongsTo(Nota::class, 'nota_id', 'id');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}
