<?php

namespace Helper;

Class funcoes_helper
{

    /**
     * @param $tabela tabela para listar
     * @param $coluna coluna para filtrar. Padrao null
     * @param $id id para filtro de dados. Padrao null
     * @example Help::listarTabela('usuario','departamento','1');
     * @return array retorna um array fetch all
     */
    public static function listarTabela($tabela, $coluna = null, $id = null)
    {
        return (new Crud())->select($tabela, $coluna, $id);
    }

    /**
     * @example Help::ip();
     * @return ip real do usuario
     */
    public static function ip()
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

    /**
     * @example Help::agent();
     * @return agent navegador do usuario
     */
    public static function agent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * @param $dados set os dados nos atributos e trata
     * @example $tipo = 1 data hora atual Y-m-d H:i:s 
     * @example $tipo = 2 d/m/Y
     * @example $tipo = 3 Y-m-d
     * @example $tipo = 4 d/m/Y H:i:s
     * @example $tipo = 5 Y-m-d H:i:s

     */
    public static function data($data, $tipo = 3)
    {
        switch ($tipo)
        {
            case 1:
                $return = date('Y-m-d H:i:s');
                break;

            case 2:
                if (isset($data))
                {
                    $nova   = str_replace('-', '/', $data);
                    $return = date('d/m/Y', strtotime($nova));
                }
                else
                {
                    $return = null;
                }
                break;
            case 3:
                if (isset($data))
                {
                    $nova   = str_replace('/', '-', $data);
                    $return = date('Y-m-d', strtotime($nova));
                }
                else
                {
                    $return = null;
                }
                break;
            case 4:
                if (isset($data))
                {
                    $nova   = str_replace('-', '/', $data);
                    $return = date('d/m/Y H:i:s', strtotime($nova));
                }
                else
                {
                    $return = null;
                }
                break;
            case 5:
                if (isset($data))
                {
                    $nova   = str_replace('/', '-', $data);
                    $return = date('Y-m-d H:i:s', strtotime($nova));
                }
                else
                {
                    $return = null;
                }
                break;

            default:
                $return = null;
                break;
        }
        return $return;
    }

    function datateste($data, $formato, $saida)
    {
        $dt   = substr($data, 0, 10);
        list($exp1, $exp2, $exp3) = (strstr($dt, '/')) ? explode('/', $dt) : explode('-', $dt);
        $mes  = $exp2;
        $dia  = (strlen($exp3) == 2) ? $exp3 : $exp1;
        $ano  = (strlen($exp3) == 2) ? $exp1 : $exp3;
        $form = ['Y-m-d ', $ano . '-' . $mes . '-' . $dia];

        if ($formato == 'br')
        {
            $form = ['d/m/Y ', $dia . '/' . $mes . '/' . $ano];
        }

        if ($saida == 'dh')
        {
            $form[1] .= substr($data, 10);
            $form[0] .= 'H:i:s';
        }
        elseif (($saida == 'h'))
        {
            $form = ['H:i:s', substr($data, 11)];
        }

        switch ($data)
        {
            case 'atual':
                return date($form[0]);
            case isset($data):
                return $form[1];
            case '':
                return NULL;
        }

        # $dt = '1986-12-17 23:10:37';
    }

    /**
     * @example Help::validapost();
     * @return boleano
     */
    public static function validaPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $request = md5(serialize($_POST));

            if (isset($_SESSION['validaPost']) && $_SESSION['validaPost'] == $request)
            {
                return false; //refresh
            }
            else
            {
                $_SESSION['validaPost'] = $request;
                return true; //post
            }
        }
    }

    /**
     * @param $num int numero para criacao do protocolo
     * @example Help::protocolo(1);
     * @return vachar Gera um protocolo
     * a partir do insert no banco ex:
     * ano 16, mes 06, ID 05 com 5 "0" a esquerda e letra 
     * do departamento  Protocolo: 160600005A
     */
    public static function protocolo($num)
    {
        $protocolo = date("ym") . str_pad($num, 5, '0', STR_PAD_LEFT);
        return $protocolo;
    }

    /**
     * @param int $item numero para comparacao com id
     * @param int $id compara com item
     * @example Help::selected(1,3);
     * @return  'selected' ou '';
     */
    public static function selected($item, $id)
    {
        $array = is_array($id) ? $id : array($id);
        return in_array($item, $array) ? 'selected' : '';
    }

    /**
     * @param vachar $tipo tipo de alerta sucesso,info,aviso,erro
     * @param vachar $titulo titulo do alerta
     * @param vachar $msg msg sobre descricao do erro
     * @example Help::alertas('erro','erro','item nao cadastrado');
     * @return vachar 
     */
    public static function alertas($tipo, $titulo, $msg)
    {
        switch ($tipo)
        {
            case 'sucesso': $tipo = 'success';
                break;
            case 'info': $tipo = 'info';
                break;
            case 'aviso': $tipo = 'warning';
                break;
            case 'erro': $tipo = 'danger';
                break;
            default: $tipo = 'info';
                break;
        }
        return ' <div class="alert alert-' . $tipo . ' alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>' . $titulo . '</strong> ' . $msg . '
                </div>';
    }

    /**
     * @param vachar $modulo informa o modulo menu que tem permissao pela session
     * @example Help::permissaoMenu('oficio');
     * @return boleano 
     */
    public static function permissaoMenu($modulo)
    {
        $menu = unserialize($_SESSION['permissao']);
        return in_array($modulo, array_keys($menu[$modulo]));
    }

    /**
     * @param vachar $modulo informa o modulo que tem permissao pela session
     * @param vachar $item informa tela do  modulo que tem permissao pela session
     * @example Help::permissaoItem('oficio','consultar');
     * @return boleano 
     */
    public static function permissaoItem($modulo, $item)
    {
        $menu = unserialize($_SESSION['permissao']);
        return in_array($item, array_values(($menu[$modulo])));
    }

    public static function permissaoChecked($permissao, $modulo, $acesso)
    {
        return in_array($acesso, array_values($permissao[$modulo])) == true ? 'checked' : '';
    }

    /**
     * @param vachar $include informa include a ser inserido
     * @example Help::includes('header');
     * @return include 
     */
    public static function includes($include)
    {
        require(INCLUDES . $include . ".php");
    }

    /**
     * @param vachar $file informa o arquivo para remover nome e deixar extensao
     * @example Help::ext('oficio.php');
     * @return vachar = 'oficio' 
     */
    public static function ext($file)
    {
        return substr($file, 0, -4);
    }

    /**
     * @param vachar $indice indice da url
     * @example Help::getUrl('protocolo');
     * URL: http://sisges/protocolo/1234
     * @return vachar = 1234 
     */
    public static function getParam($indice)
    {

        $explode = explode('/', $_GET['url']);
        unset($explode[0], $explode[1]);

        if (end($explode) == null)
        {
            array_pop($explode);
        }
        $i = 0;
        if (!empty($explode))
        {
            foreach ($explode as $value)
            {
                if ($i % 2 == 0)
                {
                    $ind[] = $value;
                }
                else
                {
                    $val[] = $value;
                }
                $i++;
            }
        }
        else
        {
            $ind = array();
            $val = array();
        }

        if (count($ind) == count($val) && !empty($ind) && !empty($val))
        {
            $parametros = array_combine($ind, $val);
        }
        else
        {
            return null;
        }
        if (!empty($indice))
        {
            return $parametros[$indice];
        }
        else
        {
            return $parametros;
        }
    }

    /**
     * @param vachar $dados limpa indices de array vazios
     * @example Help::limparEmpty($array = ['carro'=>'']);
     * @return array $array = ['carro'=>null]; 
     */
    public static function limparEmpty($dados)
    {
        foreach ($dados as $key => $value)
        {
            if (empty($value))
            {
                $dados[$key] = NULL;
            }
        }
        return $dados;
    }

    /**
     * @param vachar $dados 
     * @example Help::limparEmpty('011.569.835-33');
     * @return vachar '01156983533'; 
     */
    public static function limparCarateres($string)
    {
        $crt = ['-', '.'];
        return str_replace($crt, '', $string);
    }

    /**
     * @param vdate $dt_incial data inicial 
     * @param int $prazo tempo a ser calculado
     * @param vachar $tipoPrazo 'u'=uteis ou 'c'=corrido
     * @example Help::calculoDias('08/09/2016',10,'u');
     * @return vachar '08/09/2016 + 15 days'; 
     */
    public static function calculoDias($dt_inicial, $prazo, $tipoPrazo = "u")
    {
        $data          = strtotime($dt_inicial);
        $dtinicial     = date('d-m-Y', $data);
        $dias_ulteis   = 0;
        $dias_corridos = 0;

        //contador para dias uteis e dias corridos
        while ($dias_ulteis < $prazo)
        {
            $dias_corridos++;
            $dt_temporaria = strtotime(($dtinicial . ' + ' . ($dias_corridos - 1) . ' days'));
            $nova          = date('w', $dt_temporaria);
            if ($nova > 0 && $nova < 6)
            {
                $dias_ulteis++;
            }
        }
        //se for corrido "c" pega o contador $dias_ulteis, se for dias uteis "u" pega o contador $dias_corridos
        $condicao = $tipoPrazo == "u" ? $dias_corridos : $dias_ulteis;
        $datanova = $dt_inicial . ' + ' . ($condicao - 1) . ' days';

        //caso escape algum dia escape no sababdo ou domingo, sera jogado para o proximo dia util
        if (date('w', strtotime($datanova)) == 6)
        {
            $datanova = $dt_inicial . ' + ' . (($condicao + 2) - 1) . ' days';
        }
        elseif (date('w', strtotime($datanova)) == 0)
        {
            $datanova = $dt_inicial . ' + ' . (($condicao + 1) - 1) . ' days';
        }
        return $datanova;
    }

}
