<?php

namespace Helper;

Class imagem extends Model
{

    private $_metodo;
    private $_fonte;
    private $_diretorio;
    private $_acao;
    private $_header;

    public  function __construct()
    {
        $this->_header = header("Content-type: image/jpeg");

        $this->_metodo = $this->getUrl('tipo');

        $this->_acao = $this->getUrl('retorno');

        $this->_fonte = LIBS . 'mpdf/ttfonts/iskpota.ttf';

        $this->_diretorio = SYSTEM . 'protegido/certificado/';
    }

    public  function metodo()
    {
        return $this->_metodo;
    }

    ######Tipo de Imagem ###########

    public  function exibirImagem()
    {

        if ($this->_acao != NULL && is_file($this->_diretorio . $this->_acao))
        {
            readfile($this->_diretorio . $this->_acao);
        }
    }

    public  function exibirQrCode()
    {

        $qrcode = new Qrcode($this->_acao, 'Q');
        $qrcode->disableBorder();
        $qrcode->displayPNG(100);
    }

    public function exibirTexto()
    {

        $tamanhofonte = 150;

        $tamanho = imagettfbbox($tamanhofonte, 0, $this->_fonte, $this->_acao);
        $largura = $tamanho[2] + $tamanho[0] + 8;
        $altura  = abs($tamanho[1]) + abs($tamanho[7]);

        $imagem = imagecreate($largura, $altura);

        $fundoBranco = imagecolorallocate($imagem, 255, 255, 255);
        imagecolortransparent($imagem, $fundoBranco);

        $corfonte = imagecolorallocate($imagem, 133, 114, 108);

        imagefttext($imagem, $tamanhofonte, 0, 0, abs($tamanho[5]), $corfonte, $this->_fonte, $this->_acao);

        imagejpeg($imagem);
        imagedestroy($imagem);
    }

}
