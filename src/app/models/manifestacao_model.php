<?php

class manifestacao_model extends Model
{

//    private $_id;
    private $_usu_id;
//    private $_usuario_fiscal_id;
    private $_bai_id;
    #private $_cat_id;
    private $_dem_cat_id;
    private $_dem_complemento;
    private $_dem_dt_cadastro;
    private $_dem_sol_id;
//    private $_arquivo_id;
    private $_end_id;
//    private $_num_solicitacao;
    private $_dem_nome_solicitante;
    private $_dem_tel_celular;
    private $_dem_tel_residencial;
    private $_dem_end_solicitante;
    private $_dem_cep;
    private $_dem_ponto_referencia;
    private $_dem_solicitacao;
//    private $_nome_infrator;
    private $_dem_email;

//    private $_end_infrator;
//    private $_coordenadas;
//    private $_prazo_notificacao;
//    private $_obs;

    public function __construct()
    {
        $this->setDados();
    }

    public function setDados()
    {
        $post  = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $dados = $this->limparEmpty($post);

        $this->_usu_id               = $_SESSION['usuario_id'];
        $this->_bai_id               = $dados['bai_id'];
        $this->_dem_cat_id           = $dados['dem_cat_id'];
        $this->_dem_nome_solicitante = $dados['dem_nome_solicitante'];
        $this->_dem_tel_residencial  = $dados['dem_tel_residencial'];
        $this->_dem_tel_celular      = $dados['dem_tel_celular'];
        $this->_dem_end_solicitante  = $dados['dem_end_solicitante'];
        $this->_dem_complemento      = $dados['dem_complemento'];
        $this->_end_id               = $dados['dem_end_id'];
        $this->_dem_cep              = $dados['dem_cep'];
        $this->_dem_ponto_referencia = $dados['dem_ponto_referencia'];
        $this->_dem_solicitacao      = $dados['dem_solicitacao'];
        $this->_dem_dt_cadastro      = $this->data('', 1);
        $this->_dem_sol_id           = $dados['dem_sol_id'];
        $this->_dem_email            = $dados['dem_email'];
        return $this;
    }

    public function cadastrar()
    {
        $dados = [
            'usu_id'               => $this->_usu_id,
            'bai_id'               => $this->_bai_id,
            'dem_cat_id'           => $this->_dem_cat_id,
            'dem_nome_solicitante' => $this->_dem_nome_solicitante,
            'dem_tel_residencial'  => $this->_dem_tel_residencial,
            'dem_tel_celular'      => $this->_dem_tel_celular,
            'dem_end_solicitante'  => $this->_dem_end_solicitante,
            'dem_complemento'      => $this->_dem_complemento,
            'dem_dt_cadastro'      => $this->_dem_dt_cadastro,
            'end_id'               => $this->_end_id,
            'dem_cep'              => $this->_dem_cep,
            'dem_ponto_referencia' => $this->_dem_ponto_referencia,
            'dem_sol_id'           => $this->_dem_sol_id,
            'dem_email'            => $this->_dem_email,
            'dem_solicitacao'      => $this->_dem_solicitacao];

        $ultimoId = $this->insert('demanda', $dados);

        $protocolo = $this->protocolo($ultimoId) . "A";

        $dadosu = ['dem_num_solicitacao' => $protocolo];

        $this->update('demanda', 'dem_id', $ultimoId, $dadosu);

        if ($ultimoId)
        {
            return $protocolo;
        }
        else
        {
            return false;
        }
    }

    public function consultar($protocolo)
    {
        $fields = 'dem_num_solicitacao,
                    dem_dt_cadastro,
                    dem_nome_solicitante,
                    dem_email,
                    dem_end_solicitante,
                    dem_cep,
                    dem_complemento,
                    dem_ponto_referencia,
                    dem_tel_residencial,
                    dem_tel_celular,
                    dem_nome_infrator,
                    dem_end_infrator,
                    dem_solicitacao,
                    usu_nome,
                    org_nome,
                    dep_nome,
                    bai_nome,
                    dem_cat_nome, dem_cat_descricao';

        $tabela = ' demanda as d
                    LEFT JOIN usuario as u on u.usu_id = d.usu_id
                    LEFT JOIN bairro as b on b.bai_id = d.bai_id
                    LEFT JOIN demanda_categoria as c on c.dem_cat_id = d.dem_cat_id
                    LEFT JOIN demanda_solicitante as ds on d.dem_sol_id = ds.dem_sol_id
                    LEFT JOIN orgao as o on o.org_id = ds.org_id
                    LEFT JOIN departamento as dep on dep.dep_id = ds.dep_id';
        return $this->select($tabela, 'dem_num_solicitacao', $protocolo, $fields, 0);
    }

}
