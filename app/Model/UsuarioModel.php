<?php

namespace App\Model;

use Core\Library\ModelMain;

class UsuarioModel extends ModelMain
{
    protected $table = "usuario";

    public $validationRules = [
         "login"  => [
            "label" => 'Email',
            "rules" => 'required|min:5|max:150'
        ],
        "tipo"  => [
            "label" => 'Nível',
            "rules" => 'required|char'
        ],
    ];

    /**
     * getUserEmail
     *
     * @param string $email 
     * @return array
     */
    public function getUserByLogin($login)
    {
        return $this->db->where("login", $login)->first();
    }
}