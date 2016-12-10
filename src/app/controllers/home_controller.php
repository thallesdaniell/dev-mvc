<?php

/**
 * Description of ajax_controller
 *
 * @author thalles
 */
class home_controller extends Core\Controller implements Core\Interfacemvc
{

    public function index()
    {
        $this->View('home/home');
    }

    public function init()
    {
        $this->ativo();
    }

}
