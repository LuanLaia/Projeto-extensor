<?php

namespace App\Controller;

use App\Model\UsuarioModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;

class Login extends ControllerMain
{
    public function __construct()
    {
        $this->auxiliarConstruct();
        $this->model = new UsuarioModel();
        $this->loadHelper("formHelper");
    }

    public function index()
    {
        return $this->loadView("login/login", [], false);
    }

    public function signIn()
    {
        $post = $this->request->getPost();
        $aUser = $this->model->getUserByLogin($post['login']);

        if ($aUser) {
            if (!password_verify(trim($post["senha"]), $aUser['senha'])) {
                return Redirect::page("login", [
                    "msgError" => 'Login ou senha invalido.',
                    "inputs" => ["login" => $post["login"]]
                ]);
            }

            Session::set("userLogin", $aUser['login']);
            Session::set("userTipo", $aUser['tipo']);

            return Redirect::page("Home");

        } else {
            return Redirect::page("login", [
                "msgError" => 'Login ou senha invalido.',
                "inputs" => ["login" => $post["login"]]
            ]);
        }
    }

    public function signOut()
    {
        Session::destroy('userLogin');
        Session::destroy('userTipo');
        return Redirect::Page("home");
    }

    public function criaSuperUser()
    {
        $dados = [
            "pessoa_fisica_id" => "1252",
            "login" => "aldecir.fonseca@santamarcelina.edu.br",
            "senha" => password_hash(trim("fasm@2025"), PASSWORD_DEFAULT),
            "tipo" => "G"
        ];

        $aSuperUser = $this->model->getUserByLogin($dados['login']);

        if ($aSuperUser) {
            return Redirect::Page("login", ["msgError" => "Login ja existe."]);
        } else {
            if ($this->model->insert($dados)) {
                return Redirect::Page("login", ["msgSucesso" => "Login criado com sucesso."]);
            } else {
                return Redirect::Page("login", ["msgError" => "Erro ao criar login."]);
            }
        }
    }
}
