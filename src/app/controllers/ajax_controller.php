<?php

class ajax_controller extends Core\Controller implements Core\Interfacemvc
{
    use \Core\Authentication;
 
    public function index()
    {
        
    }   
    public function endereco()
    {
        $autocomplete = new App\models\autocomplete_model();
        $autocomplete->listarEnderecos();
    }

    public function session()
    {
        echo 'OK';
        $this->setSessionTime(600);
    }

    public function init()
    {
        $this->sessionAtivo();
    }
}
