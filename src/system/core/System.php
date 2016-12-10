<?php

namespace Core;

class System extends \Helper\funcoes_helper
{

    private $_url;
    private $_explode;
    private $_controlador;
    private $_metodo;

    function __construct()
    {
        $this->setUrl();
        $this->setExplode();
        $this->setControlador();
        $this->setMetodo();
    }

    /*
     * Metodo para recuperar GET da URL
     * Casa exista recupera o controoler solicitado
     * Caso nao tenha deixa valor padrao 'index'
     */

    private function setUrl()
    {
        $this->_url = (empty($_GET['url']) ? 'index' : $_GET['url']);
    }

    /*
     * Metodo para separar GET da URL metodo/acao
     */

    private function setExplode()
    {
        $this->_explode = explode('/', $this->_url);
    }

    /*
     * Metodo para definir Controller pelo Array 0
     */

    private function setControlador()
    {
        $this->_controlador = $this->_explode[0];
    }

    /*
     * Metodo para definir Acao pelo Array 0
     * Caso nao tenha, defini como padrao 'index_action'
     */

    private function setMetodo()
    {
        $this->_metodo = (empty($this->_explode[1]) OR $this->_explode[1] == null) ? 'index' : $this->_explode[1];
    }

    public function run()
    {
        $controller       = $this->_controlador . '_controller';
        $controlador_path = CONTROLLERS . $controller . '.php';

        if (!file_exists($controlador_path))
        {
            die($this->includes('page_404'));
        }

        require_once ($controlador_path);
        $controlador = new $controller();
        $metodo      = $this->_metodo;

        if (!method_exists($controlador, $metodo))
        {
            die($this->includes('page_404'));
        }

        $controlador->init();
        $controlador->$metodo();
    }

}
