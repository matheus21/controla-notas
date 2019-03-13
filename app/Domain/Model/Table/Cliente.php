<?php

namespace ControlaNotas\Domain\Model\Table;

class Cliente extends ModelAbstract
{
    protected $table = 'cliente';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'cpf',
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cep',
        'telefone',
        'data_nascimento',
        'sexo'
    ];

    public function rules()
    {
        return [
            'nome'            => 'nullable',
            'cpf'             => 'nullable|max:14',
            'rua'             => 'nullable',
            'numero'          => 'nullable',
            'bairro'          => 'nullable',
            'complemento'     => 'nullable',
            'cep'             => 'nullable|max:9',
            'telefone'        => 'nullable|max:13',
            'data_nascimento' => 'nullable',
            'sexo'            => 'nullable|in:M,F'
        ];
    }

    public function nota()
    {
        return $this->hasMany(Nota::class, 'nota_id', 'id');
    }
}
