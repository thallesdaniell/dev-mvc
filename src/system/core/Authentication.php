<?php

namespace Core;

trait Authentication
{

    private $_session_id;
    private $_session_nome;
    private $_session_setor;
    private $_session_time;
    private $_session_permissao;

    private function construtor()
    {
        $this->_session_id        = $_SESSION['usu_id'];
        $this->_session_nome      = $_SESSION['usu_nome'];
        $this->_session_setor     = $_SESSION['usu_setor'];
        $this->_session_permissao = $_SESSION['usu_permissao'];
        $this->_session_time      = $_SESSION['usu_duracao'];
        return $this;
    }

    public function getSessionId()
    {
        $this->construtor();
        return $this->_session_id;
    }

    public function getSessionNome()
    {
        $this->construtor();
        return $this->_session_nome;
    }

    public function getSessionSetor()
    {
        $this->construtor();
        return $this->_session_setor;
    }

    public function getSessionTime()
    {
        $this->construtor();
        return $this->_session_time;
    }

    public function getSessionPermissao()
    {
        $this->construtor();
        return $this->_session_permissao;
    }

    public function setSessionPermissao($permissao)
    {
        $_SESSION['usu_permissao'] = $permissao;
    }

    public function setSessionId($id)
    {
        $_SESSION['usu_id'] = $id;
    }

    public function setSessionNome($nome)
    {
        $_SESSION['usu_nome'] = $nome;
    }

    public function setSessionSetor($setor)
    {
        $_SESSION['usu_setor'] = $setor;
    }

    public function setSessionTime(int $duracao)
    {
        $_SESSION['usu_duracao'] = time() + $duracao;
    }

    protected function sessionAtivo()
    {
        $this->construtor();

        if (isset($this->_session_id) AND $this->_session_time > time())
        {
            $time = time() + 720;
            $this->setSessionTime($time);

            return true;
        }
        else
        {
            $this->sessionLogout();

            return false;
        }
    }

    protected function sessionLogout()
    {
        $this->destruirSession();

        header("Location: " . BASEURL);
    }

    protected function destruirSession()
    {
        session_unset();
        session_destroy();
        session_regenerate_id();
    }

    public function permissaoModulo($modulo, $item)
    {
        $this->construtor();
        $permissao = $this->_session_permissao;

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
