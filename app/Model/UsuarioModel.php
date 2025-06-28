<?php

namespace App\Model;

use Core\Library\ModelMain;

class UsuarioModel extends ModelMain
{
    protected $table = "usuario";

    public $validationRules = [
         "email"  => [
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
    public function getUserEmail($email)
{
    return $this->db
        ->table("usuario u")
        ->select("u.*, pf.nome")
        ->join("pessoa_fisica pf", "pf.id = u.pessoa_fisica_id")
        ->where("u.email", $email)
        ->first();
}



    public function insert($dados)
{
    return $this->db->table("usuario")->insert($dados);
}

}