<?php

namespace Helper;

use Core;

class geralog_model extends \Core\Model
{

    public static $instance;
    private $_data;
    private $_post;
    private $_session;
    private $_erroid;
    private $_errotipo;
    private $_erromsg;

    public static
            function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new geralog_model();

        return self::$instance;
    }

    public function inserirLog($erro, $saida)
    {
        $car             = [' ', '-', ':'];
        $this->_data     = str_replace($car, '_', $this->data('', 1));
        $this->_post     = serialize($_POST);
        $this->_erromsg  = addslashes($saida);
        $this->_session  = serialize($_SESSION);
        $this->_erroid   = time();
        $this->_errotipo = $erro;

        $this->logTexto();
        $this->logBanco();
        $this->logAlerta();
    }

//
//    private function criarTabelaLog()
//    {
//        $sql = "CREATE TABLE IF NOT EXISTS `log_erro` (
//                `log_err_id` int(11) NOT NULL AUTO_INCREMENT,
//                `log_err_protocolo` int(100) DEFAULT NULL,
//                `log_err_data` datetime DEFAULT NULL,
//                `log_err_erro_cod` varchar(100) DEFAULT NULL,
//                `log_err_descricao` varchar(5000) DEFAULT NULL,
//                `log_err_sessao` varchar(5000) DEFAULT NULL,
//                `log_err_post` varchar(5000) DEFAULT NULL,
//                PRIMARY KEY (`log_err_id`)
//              ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;";
//
//      #  $this->conn()->exec($sql);
//    }



    public function logTexto()
    {
        $msg = "[" . $this->_data . "]\n\n
		Erro: Código: " . $this->_errotipo . "\n\n
		Mensagem: " . $this->_erromsg . " \n\n
		Sessao: " . $this->_session . " \n\n
		Post: " . $this->_post;

        $ftp = fopen("" . DIR_ROOT . BASEURL . "scr/system/logs/ERROR_LOG_PHP_DATA_" . $this->_data . "_PROTOCOLO_" . $this->_erroid . ".txt", 'a+');
        fwrite($ftp, $msg);
        fclose($ftp);
    }

    public function logEmail()
    {
        
    }

    public function logBanco()
    {
//        $this->criarTabelaLog();
        $dados = [
            'log_err_protocolo' => $this->_erroid,
            'log_err_data'      => $this->_data,
            'log_err_erro_cod'  => $this->_errotipo,
            'log_err_descricao' => $this->_erromsg,
            'log_err_sessao'    => $this->_session,
            'log_err_post'      => $this->_post];
        $this->insert('log_erro', $dados);
    }

    public function logAlerta()
    {
        echo $this->alertas('erro', 'Ops!', 'Ocorreu um erro inesperado ao tentar executar esta ação, foi gerado um LOG do mesmo: ' . $this->_erroid . ', tente novamente mais tarde.');
    }

}
