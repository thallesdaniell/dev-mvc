<?php

namespace Core;

Class Controller extends \Core\Model
{

    use Authentication;

    protected function View($layout = '', $dados = null)
    {
        if (file_exists(VIEWS . $layout . '.php'))
        {
            if (is_array($dados) AND count($dados) > 0)
                extract($dados);

            require_once(VIEWS . $layout . '.php');
        }
        else
        {
            echo 'erro nao achou a view';
        }
    }

    public function init()
    {
        
    }

}
