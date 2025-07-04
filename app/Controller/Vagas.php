<?php

namespace App\Controller;

use App\Model\VagasModel;
use App\Model\CargoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;
use Core\Library\Validator;

class Vagas extends ControllerMain
{
    public function __construct() 
    {    
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
        $this->validaAcesso();
    }

    public function index()
    {
        return $this->loadView("sistema\listaVagas", $this->model->lista("descricao"));
    }

    public function form($action, $id)
    {
        
        $CargoModel = new CargoModel();

        $dados = [
            "data" => $this->model->getById($id),
            "aCargo" => $CargoModel->lista()
        ];

        return $this->loadView("sistema/formVagas", $dados);
    }

    public function insert()
    {
        $post = $this->request->getPost();

        if ($this->model->insert($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro inserido com sucesso."]);
        } else {
            return Redirect::page($this->controller . "/form/insert/0");
        }
    }

    public function update()
    {
        $post = $this->request->getPost();

        if ($this->model->update($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro alterado com sucesso."]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['id']);
        }
    }

    public function delete()
    {
        $post = $this->request->getPost();

        if ($this->model->delete($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro excluído com sucesso."]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}

