<?php

/**
 * Description of ajax_controller
 *
 * @author thalles
 */
class ajax_controller extends Core\Controller implements Core\Interfacemvc
{

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
        $_SESSION["duracao"] = time() + 600;
    }

    public function init()
    {
        $this->ativo();
    }

}
