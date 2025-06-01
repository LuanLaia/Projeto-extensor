<?php

namespace App\Model;

use Core\Library\ModelMain;

class CurriculoModel extends ModelMain
{

    protected $table = "curriculum";

    public $validationRules = [
        "logradouro" => [
            "label" => 'Logradouro',
            "rules" => 'required|min:3|max:60'
        ],
        "numero" => [
            "label" => 'Número',
            "rules" => 'max:10'
        ],
        "complemento" => [
            "label" => 'Complemento',
            "rules" => 'max:20'
        ],
        "bairro" => [
            "label" => 'Bairro',
            "rules" => 'required|min:3|max:50'
        ],
        "cep" => [
            "label" => 'CEP',
            "rules" => 'required|size:8'
        ],
        "cidade_id" => [
            "label" => 'Cidade',
            "rules" => 'required|int'
        ],
        "celular" => [
            "label" => 'Celular',
            "rules" => 'required|size:11'
        ],
        "dataNascimento" => [
            "label" => 'Data de Nascimento',
            "rules" => 'required|date'
        ],
        "sexo" => [
            "label" => 'Sexo',
            "rules" => 'required|in:M,F'
        ],
        "email" => [
            "label" => 'E-mail',
            "rules" => 'required|email|max:120'
        ],
        "apresentacaoPessoal" => [
            "label" => 'Apresentação Pessoal',
            "rules" => ''
        ]
    ];

   
}