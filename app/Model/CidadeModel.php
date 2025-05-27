<?php

namespace App\Model;

use Core\Library\ModelMain;

class CidadeModel extends ModelMain
{
    protected $table = "cidade";
    
    protected $validationRules = [
        "cidade"  => [
            "label" => 'Cidade',
            "rules" => 'required|min:3|max:200'
        ],
        "uf"  => [
            "label" => 'UF',
            "rules" => 'required|min:2|max:2'
        ]
    ];
}