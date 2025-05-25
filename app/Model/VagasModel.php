<?php

namespace App\Model;

use Core\Library\ModelMain;

class VagasModel extends ModelMain
{
    protected $table = "vaga";

    protected $validationRules = [
        "descricao" => [
            "label" => 'Descrição',
            "rules" => 'required|min:3|max:60'
        ],
        "sobreaVaga" => [
            "label" => 'Sobre a Vaga',
            "rules" => 'required'
        ],
        "modalidade" => [
            "label" => 'Modalidade',
            "rules" => 'required|int'
        ],
        "vinculo" => [
            "label" => 'Vinculo',
            "rules" => 'required|int'
        ],
        "dtInicio" => [
            "label" => 'Data Inicio',
            "rules" => ''
        ],
        "dtFim" => [
            "label" => 'Data Fim',
            "rules" => ''
        ],
        "statusVaga" => [
            "label" => 'Status Vaga',
            "rules" => 'required|int'
        ]
        ];

        
}



