<?php
echo'chegou<hr>';
echo $senha_criptografada;
echo '<hr>';
echo $carro;
echo '<hr>';

echo $nome;
echo '<hr>';
echo $cargo;
echo '<hr>';
echo $carro;
echo '<hr>';
echo $agent;

foreach ($usuarios as $value)
{
    echo $value['usu_id'] . ' - ' . $value['usu_nome'] . '<hr>';
}
?>

<html>
    <body class="fixed-small-header fixed-navbar fixed-sidebar fixed-footer">
        <form name="formulario" novalidate="novalidate" action="" id="formulario" method="post">
            <div class="form-group col-lg-4">
                <label for="protocolo">Protocolo:</label>
                <div class="input-group">
                    <input type="text" name="protocolo" id="protocolo" maxlength="10" placeholder="" class="form-control" value="" >
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">Consultar</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

