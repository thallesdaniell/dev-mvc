<?php

$imagem = new Imagem();

switch ($imagem->metodo())
{
    case 'certificado':
        $imagem->exibirImagem();
        break;

    case 'qrcode':
        $imagem->exibirQrCode();
        break;

    case 'texto':
        $imagem->exibirTexto();
        break;
}
