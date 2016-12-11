<?php

namespace App\models;

use Core\Model as Model;

class usuario_model extends Model
{
    use Authentication;

    private $_usu_id;
    private $_dep_id;
    private $_usu_nome;
    private $_usu_login;
    private $_usu_senha;
    private $_usu_resetarsenha;
    private $_usu_primeiroacesso;
    private $_usu_ativo;
    private $_usu_ultimoacesso;
    private $_usu_permissao;
    private $_usu_cpf;
    private $_usu_dt_nascimento;

    public function __construct()
    {
        $this->setDados();
    }

    public function setDados()
    {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $this->_usu_id             = $dados['usu_id'];
        $this->_dep_id             = $dados['dep_id'];
        $this->_usu_nome           = $dados['usu_nome'];
        $this->_usu_login          = $dados['usu_login'];
        $this->_usu_senha          = $dados['usu_senha'];
        $this->_usu_resetarsenha   = (empty($dados['usu_resetarsenha'])) ? 'n' : 's';
        $this->_usu_primeiroacesso = (empty($dados['usu_primeiroacesso'])) ? 'n' : 's';
        $this->_usu_ativo          = (empty($dados['usu_ativo'])) ? 'n' : 's';
        $this->_usu_ultimoacesso   = $dados['usu_ultimoacesso'];
        $this->_usu_permissao      = $dados['usu_permissao'];
        $this->_usu_cpf            = $this->limparCarateres($dados['usu_cpf']);
        $this->_usu_dt_nascimento  = $this->data($dados['usu_dt_nascimento'], 3);
    }

    /**
     * @param $dados array com dados do login para validacao
     */
    public function logar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if ($this->validar())
            {
                if ($this->_usu_ativo == 'n')
                {
                    $this->destruirSession();

                    return [
                        "status" => "inativo",
                        "msg"    => $this->alertas('erro', 'Ops!', 'Usuário Inativo.')];
                }
                elseif ($this->_usu_primeiroacesso == 's')
                {
                    $this->destruirSession();

                    return [
                        "status"            => "primeiroacesso",
                        "usu_nome"          => $this->_usu_nome,
                        "usu_cpf"           => $this->_usu_cpf,
                        "usu_login"         => $this->_usu_login,
                        "usu_dt_nascimento" => $this->data($this->_usu_dt_nascimento, 2),
                        "titulo"            => "Primeiro Acesso",
                        "frase"             => "esse é o seu primeiro acesso, por isso pedimos que altere sua senha padrão para uma mais segura:"];
                }
                elseif ($this->_usu_resetarsenha == 's')
                {
                    $this->destruirSession();

                    return [
                        "usu_nome" => $this->_usu_nome,
                        "status"   => "resetar",
                        "titulo"   => "Resetar Senha",
                        "frase"    => "você está recebendo esse aviso por está usando a senha padrão ou solicitou resetar a senha.
                    Por segurança solicitamos que altere para uma senha mais segura:"];
                }
                else
                {
                    $dados = [
                        'usu_ultimoacesso' => date('Y-m-d H:i:s')];

                    $this->update('usuario', 'usu_id', $this->_usu_id, $dados);

                    header("Location: " . BASEURL . "home");
                }
            }
            else
            {
                return [
                    "status" => "senha",
                    "msg"    => $this->alertas('erro', 'Ops!', 'Matrícula ou senha incorretos.')];
            }
        }
    }

    /**
     * @return true ou false verifica se login e valido ou nao e registra atributos e session
     */
    private function validar()
    {
        $tabela = "usuario as u join departamento as d on d.dep_id= u.dep_id";

        $sql = $this->select($tabela, 'usu_login', $this->_usu_login, null, 0);

        if (password_verify($this->_usu_senha, $sql['usu_senha']))
        {

            $this->_usu_ativo          = $sql['usu_ativo'];
            $this->_usu_resetarsenha   = $sql['usu_resetarsenha'];
            $this->_usu_primeiroacesso = $sql['usu_primeiroacesso'];
            $this->_usu_id             = $sql['usu_id'];
            $this->_usu_nome           = $sql['usu_nome'];
            $this->_usu_cpf            = $sql['usu_cpf'];
            $this->_usu_dt_nascimento  = $sql['usu_dt_nascimento'];
            $this->_usu_login          = $sql['usu_login'];
            
            $this->setSessionNome($sql['usu_nome']);
            $this->setSessionId($sql['usu_id']);
            $this->setSessionPermissao($sql['dep_nome'].' '.$sql['usu_permissao']);
            $this->setSessionSetor($sql['dep_descricao']);
            $this->setSessionTime(time() + 720);

            return true;
        }
        else
        {
            $this->tentativa();

            return false;
        }
    }

    /**
     * @return void registra tentativa do usuario
     */
    private function tentativa()
    {
        $dados = [
            'log_ten_login' => $this->_usu_login,
            'log_ten_senha' => $this->_usu_senha,
            'log_ten_data'  => $this->data('', 1),
            'log_ten_agent' => $this->agent(),
            'log_ten_ip'    => $this->ip()];

        $this->insert('log_tentativa', $dados);
    }

    /**
     * @return $nova string nova senha
     * @param $param string gera senha criptografada
     */
    public function criptartSenha($param)
    {
        return password_hash($param, PASSWORD_DEFAULT);
    }

    /**
     * @param $param array permissao do usuario
     * @return true ou false se atualizou correto ou erro no update
     */
    public function atualizar()
    {
        $dados = [
            'usu_permissao'      => serialize($this->_usu_permissao),
            'usu_resetarsenha'   => $this->_usu_resetarsenha,
            'usu_primeiroacesso' => $this->_usu_primeiroacesso,
            'usu_ativo'          => $this->_usu_ativo,
            'usu_login'          => $this->_usu_login,
            'dep_id'             => $this->_dep_id,
            'usu_nome'           => $this->_usu_nome,
            'usu_cpf'            => $this->_usu_cpf,
            'usu_dt_nascimento'  => $this->_usu_dt_nascimento];

        if ($this->_usu_resetarsenha == 's')
        {
            $senha = ['usu_senha' => '$2y$10$kBe77gyVKKcnVOLjziQDieSNYxCjby.P2VnOPfDOObqH4/hzeXxXK'];

            $dados = array_merge($dados, $senha);
        }

        if ($this->update('usuario', 'usu_id', $this->_usu_id, $dados))
        {
            return $this->alertas('sucesso', 'Dados!', 'Atualizada com sucesso.');
        }
        else
        {
            return $this->alertas('erro', 'Aviso!', 'Falha ao atualizar dados.');
        }
    }

    /**
     * @param $id int recupera a permissao do usuario
     * @param permissao do usuario serialzada
     */
    public function consultar()
    {
        return $this->select('usuario', 'usu_id', $this->_usu_id, null, 0);
    }

    /**
     * @param $post array post com dados para cadastro
     */
    public function cadastrar()
    {
        $consulta = $this->select('usuario', 'usu_login', $this->_usu_login, null, 0);

        if ($consulta)
        {
            return $this->alertas('erro', 'Matricúla', 'já existe no sistema');
        }
        else
        {
            $dados = [
                'dep_id'            => $this->_dep_id,
                'usu_nome'          => $this->_usu_nome,
                'usu_login'         => $this->_usu_login,
                'usu_cpf'           => $this->_usu_cpf,
                'usu_dt_nascimento' => $this->_usu_dt_nascimento,
                'usu_permissao'     => serialize($this->_usu_permissao)];

            if ($this->insert('usuario', $dados))
            {
                return $this->alertas('sucesso', 'Sucesso!', 'cadastro realizado com sucesso');
            }
            else
            {
                return $this->alertas('erro', 'Erro!', 'falha ao cadastrar tente novamente mais tarde');
            }
        }
    }

    public function alterarSenha($senha, $tipo)
    {
        if ($tipo == 'resetar')
        {
            $coluna = "usu_cpf = '" . $this->_usu_cpf . "' and usu_dt_nascimento = '" . $this->_usu_dt_nascimento . "' and usu_login";
        }
        else
        {
            $coluna = 'usu_login';
        }

        $usuario = $this->select('usuario', $coluna, $this->_usu_login, null, 0);

        if ($usuario['usu_resetarsenha'] == 'n' OR $usuario['usu_primeiroacesso'] == 'n')
        {
            $array = [
                "usu_senha"          => $this->criptartSenha($senha),
                "usu_resetarsenha"   => 'n',
                "usu_primeiroacesso" => 'n'];

            $array2 = [
                "usu_cpf"           => $this->_usu_cpf,
                "usu_dt_nascimento" => $this->_usu_dt_nascimento];

            if ($this->_usu_cpf !== "undefined")
                $array = array_merge($array, $array2);

            $this->update("usuario", "usu_login", $this->_usu_login, $array);

            return $this->alertas("sucesso", "Atualização", "Bem sucedida!!!");
        } else
        {
            return $this->alertas("erro", "Atualização", "Dados não encontrado ou alterado recentemente, tente novamente mais tarde.");
        }
    }

}
