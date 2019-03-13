<?php

namespace ControlaNotas\Domain\Model\Table;

class Produto extends ModelAbstract
{
    protected $table = 'produto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'marca',
        'tamanho',
        'cor',
        'valor',
    ];

    public function rules()
    {
        return [
            'nome'    => 'nullable',
            'marca'   => 'nullable',
            'tamanho' => 'nullable',
            'cor'     => 'nullable',
            'valor'   => 'nullable'
        ];
    }

    public function notaProduto()
    {
        return $this->belongsTo(NotaProduto::class, 'nota_id', 'id');
    }
}
