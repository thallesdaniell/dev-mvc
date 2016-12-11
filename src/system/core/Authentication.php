<?php

namespace Core;

trait Authentication
{

    public function sessionSetPermissao($permissao)
    {
        $_SESSION['usu_permissao'] = $permissao;
    }

    public function sessionSetId($id)
    {
        $_SESSION['usu_id'] = $id;
    }

    public function sessionSetNome($nome)
    {
        $_SESSION['usu_nome'] = $nome;
    }

    public function sessionSetSetor($setor)
    {
        $_SESSION['usu_setor'] = $setor;
    }

    public function sessionSetTime(int $duracao)
    {
        $_SESSION['usu_duracao'] = time() + $duracao;
    }

    public function sessionGetId()
    {
        return $_SESSION['usu_id'];
    }

    public function sessionGetNome()
    {
        return $_SESSION['usu_nome'];
    }

    public function sessionGetSetor()
    {
        return $_SESSION['usu_setor'];
    }

    public function sessionGetTime()
    {
        return $_SESSION['usu_duracao'];
    }

    public function sessionGetPermissao()
    {
        return $_SESSION['usu_permissao'];
    }

    public function sessionGetOrigem()
    {
        return $_SESSION['usu_origem'];
    }

    public function sessionGetAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public function sessionGetIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function sessionSetOrigem()
    {
        $_SESSION['usu_origem'] = sha1($this->sessionGetAgent() . $this->sessionGetIp());
    }

    public function sessionValidarOrigem()
    {
        $valid = sha1($this->sessionGetAgent() . $this->sessionGetIp());
        if ($this->sessionGetOrigem() == $valid)
            echo 'origem valida';
    }

    protected function sessionAtivo()
    {

        if ($this->sessionGetId() ==! null AND $this->sessionGetTime() > time())
        {
            $time = time() + 720;
            $this->sessionSetTime($time);
            return true;
        }
        else
        {
            $this->sessionToLogout();
            return false;
        }
    }

    protected function sessionToLogout()
    {
        $this->sessionDestruir();

        header("Location: " . BASEURL);
    }

    protected function sessionDestruir()
    {
        session_unset();
        session_destroy();
        session_regenerate_id();
    }

    protected function sessionPermissaoModulo($modulo, $item)
    {
        $permissao = $this->sessionGetPermissao();

        if (in_array($item, array_values($permissao[$modulo])))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    protected function sessionToLogin()
    {
        header("Location: " . BASEURL);
    }

}
