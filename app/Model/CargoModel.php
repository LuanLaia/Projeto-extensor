<?php

namespace App\Model;

use Core\Library\ModelMain;

class CargoModel extends ModelMain
{
    protected $table = "cargo";

    protected $validationRules = [
        "descricao" => [
            "label" => 'Cargo',
            "rules" => ''
        ]
    ];
}