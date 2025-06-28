<?php

namespace App\Model;

use Core\Library\ModelMain;

class PessoaFisicaModel extends ModelMain
{

    /**
     * Cria nova pessoa física
     *
     * @param array $dados
     * @return int ID da pessoa física criada
     */
    public function criar(array $dados)
    {
        return $this->db
            ->table("pessoa_fisica")
            ->insert($dados); // retorna o ID conforme sua estrutura
    }
}
