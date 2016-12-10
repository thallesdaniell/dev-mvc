<?php

namespace App\models;

use Core\Model as Model;

Class autocomplete_model extends Model
{

    private $_get;

    public function __construct($get)
    {
        $this->_get = $get;
    }

    public function listarEnderecos()
    {
        if (!strtolower($this->getParam('q')))
            return;
        $select = "endereco where end_endereco LIKE '%$this->_get%'";

        foreach ($this->select($select) as $value)
        {
            echo $value['end_endereco'] . "|" . $value['end_bairro'] . "|" . $value['end_cep'] . "|" . $value['end_id'] . "|" . $value['end_cidade'] . "\n";
        }
    }

}
