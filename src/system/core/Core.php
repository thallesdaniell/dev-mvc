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
date_default_timezone_set('America/Recife');
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
 * DEBUG true ou false                     *
 * -------------------------------------------------
 */
define('DEBUG', true);

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
 * defnição das constantes     j                   *
 * -------------------------------------------------
 */
define('VERSAO', '1.1.0');
define('SYSTEM', 'src/system/');
define('INCLUDES', SYSTEM . 'includes/');
//define('AJAX', SYSTEM . 'ajax/');
define('APLICACAO', 'src/app/');
define('CONTROLLERS', APLICACAO . 'controllers/');
//define('MODELS', APLICACAO . 'models/');
define('VIEWS', APLICACAO . 'views/');
//define('HELPERS', SYSTEM . 'helpers/');
//define('CORE', SYSTEM . 'core/');
define('LIBS', SYSTEM . 'bibliotecas/');
define('LOGS', SYSTEM . 'logs/');
define('FONTS', SYSTEM . 'fonts/');
define('PROTEGIDO', SYSTEM . 'protegido/');
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
define('DB_BANCO', 'teste');
define('DB_USUARIO', 'root');
define('DB_SENHA', '');
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
session_name(sha1('' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));
ini_set("register_globals",0); //globais false na inicializacao


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
 * DEBUG*
 * -------------------------------------------------
 */
if (DEBUG == true)
{
    ini_set('error_log', 1);
    $patch = LOGS . 'ERROR_LOG_APACHE_DATA_' . date("d-m-Y H-i-s") . ".txt";
    ini_set('error_log', $patch);

    function trataErros($errno, $errstr, $errfile, $errline)
    {
        global $patch;
        
        $string = "Erro: [$errno] Tipo: [$errstr] No arquivo: [$errfile] na linha [$errline]\n";
        file_put_contents($patch, $string, FILE_APPEND);
        print_r($string);
        #se retornar TRUE não faz o tratamento padrão do erro no PHP
        return TRUE;
    }

    set_error_handler('trataErros');
}

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
 * Tete Conexao Banco
 * -------------------------------------------------
 */
if (DEBUG == true)
{
    try
    {
        $dbo = new PDO('mysql:host=' . DB_HOST. ';dbname=' . DB_BANCO, DB_USUARIO, DB_SENHA);
    } catch (PDOException $e)
    {
        switch ($e->getCode())
        {
            case 1049:
                 die("Nome do banco invalido!<br/>");
                break;
            
            case 1045:
                 die("Usuário ou senha inválidos!<br/>");
                break;
            
            case 2002:
                 die("Host Incorreto!<br/>");
                break;
        }
    }
}