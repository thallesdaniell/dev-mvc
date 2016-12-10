<?php

/**
 * Description of ajax_controller
 *
 * @author thalles
 */
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
        $this->set_session_duracao(600);
    }

    public function init()
    {
        $this->ativo();
    }

 

}
