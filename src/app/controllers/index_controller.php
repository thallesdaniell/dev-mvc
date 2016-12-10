<?php

/**
 * Description of ajax_controller
 *
 * @author thalles
 */
#namespace App\controllers;

use Core;

class index_controller extends Core\Controller implements Core\Interfacemvc
{
    use \Core\Authentication;
    public function index()
    {
        $this->set_session_id(10);
        $this->set_session_nome('thalles');
        $this->set_session_duracao(40);
        $this->ativo();
        var_dump($_SESSION);
      # $this->View('login/login');
     
    }

    public function init()
    {
       # $this->ativo();
    }

}
