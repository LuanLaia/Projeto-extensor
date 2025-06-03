<?php

namespace App\Model;

use Core\Library\ModelMain;

class UsuarioRecuperaSenhaModel extends ModelMain
{
    protected $table = "usuariorecuperasenha";

    public function getRecuperaSenhaChave($chave) 
    {
        return $this->db
            ->where(["statusRegistro" => 1, "chave" => $chave])
            ->first();
    }

    public function desativaChave($id) 
    {
        return $this->db
            ->where(["id" => $id])
            ->update([
                "statusRegistro" => 2,
                "updated_at" => date("Y-m-d H:i:s")
            ]) > 0;
    }

    public function desativaChaveAntigas($usuario_id, $idAtual = null) 
    {
        $cond = ["usuario_id" => $usuario_id];
        if ($idAtual) {
            $cond["id <>"] = $idAtual;
        }

        return $this->db
            ->where($cond)
            ->update([
                "statusRegistro" => 2,
                "updated_at" => date("Y-m-d H:i:s")
            ]) > 0;
    }

    public function salvarNovaChave($usuario_id, $chave) 
    {
        return $this->db->insert([
            "usuario_id" => $usuario_id,
            "chave" => $chave,
            "created_at" => date("Y-m-d H:i:s"),
            "statusRegistro" => 1
        ]);
    }
}
