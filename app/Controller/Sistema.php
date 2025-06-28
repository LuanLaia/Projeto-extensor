<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Session;

class Sistema extends ControllerMain
{
    public function index()
    {
        return $this->loadView("sistema/home");
    }
}
