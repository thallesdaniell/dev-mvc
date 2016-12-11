<?php
/**
 * Classe [ GeraLog ]
 * Reponsável por gerar logs para analise posterior
 * dados para preenchimento dos inputs.
 * 
 * @copyright (c) 2016, SISGES Sistema de Gestão da SEMA
 */
namespace Helper;

use Core;

class geralog extends \Core\Model
{

    public static $instance;
    private $_data;
    private $_post;
    private $_session;
    private $_erroid;
    private $_errotipo;
    private $_erromsg;
    /**
     * <b>getInstance:</b> Garente que sera criada uma unica instancia do objeto
     * @return obj objeto;
     * @example geralog->getInstance();
     */
    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new GeraLog();

        return self::$instance;
    }
    
    
    /**
     * <b>LogAlerta:</b> Retorna erro para o HTML e com protoclo
     * @return string alerta HTML;
     * @example $this->logAlerta();
     */
    protected function inserirLog($erro, $saida)
    {
        $this->_data     = date("d.m.Y-H.i.s");
        $this->_post     = serialize($_POST);
        $this->_erromsg  = addslashes($saida);
        $this->_session  = serialize($_SESSION);
        $this->_erroid   = time();
        $this->_errotipo = $erro;
        
        $this->setPath();
        $this->setDir();
        
        $this->logTexto();
        $this->logBanco();
        $this->logAlerta();
    }
    /**
     * <b>setPath:</b> Defini diretorio do log texto
     * @return Void;
     * @example $this->setPath();
     */  
    private function setPath()
    {
        $this->_diretorio = 'system/logs';
    }
    /**
     * <b>setDir:</b> Cria diretorio caso nao exita
     * @return Void;
     * @example $this->setDir();
     */ 
    private function setDir()
    {
        if (!is_dir($this->_diretorio))
        {
            mkdir($this->_diretorio, 0777, true);
        }
    }
    /**
     * <b>LogAlerta:</b> Gerar um txt na pasta logs
     * @return Void;
     * @example $this->logTexto();
     */
    protected function logTexto()
    {
        $msg = "[" . $this->_data . "]\n\n
		Erro: Código: " . $this->_errotipo . "\n\n
		Mensagem: " . $this->_erromsg . " \n\n
		Sessao: " . $this->_session . " \n\n
		Post: " . $this->_post;

        $ftp = fopen("" . DIR_ROOT . BASEURL . LOGS . "ERROR_LOG_PHP_DATA_" . $this->_data . "_PROTOCOLO_" . $this->_erroid . ".txt", 'a+');
        fwrite($ftp, $msg);
        fclose($ftp);
    }
    /**
     * <b>LogAlerta:</b> Em fase de testes
     * @return string alerta HTML;
     * @example $this->logAlerta();
     */
    protected function logEmail()
    {
        
    }
    /**
     * <b>LogBanco:</b> Insere erro no Banco
     * @return string inserir no banco;
     * @example $this->logBanco();
     */
    protected function logBanco()
    {
        $dados = [
            'log_err_protocolo' => $this->_erroid,
            'log_err_data'      => $this->_data,
            'log_err_erro_cod'  => $this->_errotipo,
            'log_err_descricao' => $this->_erromsg,
            'log_err_sessao'    => $this->_session,
            'log_err_post'      => $this->_post];
        $this->insert('log_erro', $dados);
    }
    /**
     * <b>LogAlerta:</b> Retorna erro para o HTML e com protoclo
     * @return string alerta HTML;
     * @example $this->logAlerta();
     */
    protected function logAlerta()
    {
        echo $this->alertas('erro', 'Ops!', 'Ocorreu um erro inesperado ao tentar executar esta ação, foi gerado um LOG do mesmo: ' . $this->_erroid . ', tente novamente mais tarde.');
    }

}
