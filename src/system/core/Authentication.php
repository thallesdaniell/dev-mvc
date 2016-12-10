<?php

namespace Core;

trait Authentication
{

    private $_session_id;
    private $_session_nome;
    private $_session_time;
    private $_session_permissao;

    private function construtor()
    {
        $this->_session_id    = $_SESSION['usu_id'];
        $this->_session_nome  = $_SESSION['usu_nome'];
        $this->_session_permissao = $_SESSION['usu_permissao'];
        $this->_session_time   = $_SESSION['usu_duracao'];
        return $this;
    }

    public function get_session_id()
    {
        $this->construtor();
        return $this->_session_id;
    }

    public function get_session_nome()
    {

        $this->construtor();
        return $this->_session_nome;
    }

    public function get_session_time()
    {
        $this->construtor();
        return $this->_session_time;
    }

    public function get_session_permissao()
    {
        $this->construtor();
        return $this->_session_permissao;
    }

    
    
    public function set_session_permissao($permissao)
    {
        $_SESSION['usu_permissao'] = $permissao;
    }

    public function set_session_id($id)
    {
        $_SESSION['usu_id'] = $id;
    }

    public function set_session_nome($nome)
    {
        $_SESSION['usu_nome'] = $nome;
    }

    public function set_session_duracao(int $duracao)
    {
        $_SESSION['usu_duracao'] = time() +  $duracao;
    }

    /**
     * @return boleano
     */
    protected function ativo()
    {
        $this->construtor();

        if (isset($this->_session_id) AND $this->_session_time > time())
        {
            $time = time() + 720;
            $this->set_session_duracao($time);

            return true;
        }
        else
        {
            $this->sair();

            return false;
        }
    }

    protected function sair()
    {
        session_unset();
        session_destroy();
        session_regenerate_id();

        header("Location: " . BASEURL);
    }

    public function permissaoModulo($modulo,$item)
    {
        
        $permissao = $this->construtor()->_session_permissao;

        if (in_array($item, array_values($permissao[$modulo])))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function toLogin()
    {
        header("Location: " . BASEURL);
    }

}
