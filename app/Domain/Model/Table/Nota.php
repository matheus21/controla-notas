<?php

namespace ControlaNotas\Domain\Model\Table;

class Nota extends ModelAbstract
{
    protected $table = 'nota';
    protected $primaryKey = 'id';

    protected $fillable = [
        'data_emissao',
        'cliente_id',
        'codigo',
        'observacao',
        'valor_total',
    ];

    public function rules()
    {
        return [
            'data_emissao' => 'nullable|date_format:"Y-m-d"',
            'cliente_id'   => 'nullable|exists:cliente,cliente_id',
            'codigo'       => 'nullable',
            'observacao'   => 'nullable',
            'valor_total'  => 'nullable'
        ];
    }


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function notaProduto()
    {
        return $this->belongsTo(NotaProduto::class, 'nota_id', 'id');
    }
}
