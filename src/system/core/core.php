<?php

/* * -----------------------------------------------
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  --------------------------------------------------
 * Iniciar sessao no sistema                       *
 * -------------------------------------------------
 */
session_start();
/* * -----------------------------------------------
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  --------------------------------------------------
 * Define o fuso horario do sistema                *
 * -------------------------------------------------
 */
date_default_timezone_set('UTC');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo'); //'America/Recife'
//se nao pegar trocar no php.ini
//date.timezone = "America/Sao_Paulo"
/* * -----------------------------------------------
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  --------------------------------------------------
 * defnição das constantes                         *
 * -------------------------------------------------
 */
define('VERSAO', '1.1.0');
define('SYSTEM', 'src/system/');
define('INCLUDES', SYSTEM . 'includes/');
define('AJAX', SYSTEM . 'ajax/');
define('APLICACAO', 'src/app/');
define('CONTROLLERS', APLICACAO . 'controllers/');
define('MODELS', APLICACAO . 'models/');
define('VIEWS', APLICACAO . 'views/');
define('HELPERS', SYSTEM . 'helpers/');
define('CORE', SYSTEM . 'core/');
define('LIBS', SYSTEM . 'bibliotecas/');
define('LOGS', SYSTEM . 'logs/');
define('BASEURL', substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/") + 1));
define('DIR_ROOT', substr($_SERVER['DOCUMENT_ROOT'], 0, -1));
/* * -----------------------------------------------
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  --------------------------------------------------
 * Constantes do banco                             *
 * -------------------------------------------------
 */
define('DB_DRIVER', 'mysql');
define('DB_BANCO', 'sema');
define('DB_USUARIO', 'root');
define('DB_SENHA', '094789th');
define('DB_HOST', 'localhost');
/* * -----------------------------------------------
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  --------------------------------------------------
 * Parametros para ambiente de desenvolvimento     *
 * Quando for para producao alterar os parametros  *
 * -------------------------------------------------
 */
header('Content-Type: text/html; charset=utf-8');
header_remove('Cache-Control');
ini_set('error_log', 1);
$patch = DIR_ROOT . BASEURL . LOGS . 'ERROR_LOG_APACHE_DATA_' . date("d-m-Y H-i-s") . ".txt";
ini_set('error_log', $patch);
ini_set('session.gc_maxlifetime', (10 * 60)); // tempo máximo da seção em segundos
ini_set('session.use_strict_mode', true); // aceitar apenas sessões criadas pelo módulo session
ini_set('session.use_cookies', true); // usar junto com use_only_cookies
ini_set('session.use_only_cookies', true); // cookies gerados apenas pelo proprio usuário
ini_set('session.cookie_httponly', true); // cookies só acessíveis por HTTP (não JS)
ini_set('session.cookie_secure', true); // cookies só acessíveis por HTTPS
ini_set('session.hash_function', 'sha512'); // criptografa session: dificulta Session Hijacking
#ini_set('session.use_trans_sid', false); // suporte a SID transparente desabilitado
ini_set('session.referer_check', DIR_ROOT . BASEURL); // checa o referer
ini_set('session.cookie_domain', DIR_ROOT . BASEURL);
ini_set('session.cache_limiter', 'nocache'); // não fazer cache
error_reporting(E_ALL); //E_ALL
/* * -----------------------------------------------
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  --------------------------------------------------
 * Arquivo para auxiliar dentro do sistem com      *
 * pequenas funcoes                                *
 * -------------------------------------------------
 */

function trataErros($errno, $errstr, $errfile, $errline)
{
    $string = "Erro: [$errno] Tipo: [$errstr] No arquivo: [$errfile] na linha [$errline]\n";
    #file_put_contents('error.log', $string, FILE_APPEND);
    #print_r($string);
    #return TRUE;
}

set_error_handler('trataErros');
/* * -----------------------------------------------
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  --------------------------------------------------
 * Arquivo para auxiliar dentro do sistem com      *
 * pequenas funcoes                                *
 * -------------------------------------------------
 */
//    function __autoload($class)
//    {
//        if (file_exists(MODELS."{$class}.php"))
//        {
//            require_once(MODELS."{$class}.php");
//        }
//        elseif(file_exists(HELPERS."{$class}.php"))
//        {
//            require_once(HELPERS."{$class}.php");
//        }
//        elseif(file_exists(CORE."{$class}.php"))
//        {
//            require_once(CORE."{$class}.php");
//        }
//        else
//        {
//            die("erro ao incluir a classe:"." {$class} no sistema.");
//        }
//    }
/* * -----------------------------------------------
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
  --------------------------------------------------
 * Arquivo para auxiliar dentro do sistem com      *
 * pequenas funcoes                                *
 * -------------------------------------------------
 */
//    require_once(CORE . 'system.php');
//    require_once(CORE . 'model.php');
//    require_once(CORE . 'controller.php');







