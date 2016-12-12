<?php

namespace Core;

Class Controller extends \Core\Model
{

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
            if (DEBUG == true)
            {
                die('Erro ao carregar View.');
            }
            else
            {
                die($this->includes('page_404'));
            }
        }
    }

    public function init()
    {
        
    }

}
