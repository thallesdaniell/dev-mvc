<?php
$manifestacao = new Manifestacao();

if (isset($_POST['protocolo']))
{
    $consulta = $manifestacao->consultar($_POST['protocolo']);
}
?>
<!DOCTYPE html>
<html>
    <?php Helper\funcoes_helper::includes('head'); ?>
    <body class="fixed-small-header fixed-navbar fixed-sidebar fixed-footer">

        <!-- Simple splash screen-->
        <div class="splash">
            <div class="color-line"></div>
            <div class="splash-title">
                <h1>SISGES | Sistema de Gestão da SEMA</h1>
                <p>  Secretaria Municipal do Meio Ambiente 2016</p>
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>




        <!-- Header -->
        <div id="header">
            <div class="color-line">
            </div>
            <div id="logo" class="light-version">
                <a class="" href="<?php echo BASEURL; ?>home">
                    <span class="nav-label font-light m-b-xs">

                        SISGES
                    </span>
                </a>
            </div>
            <nav role="navigation" class="no-print">
                <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
                <div class="small-logo">
                    <span class="text-primary">HOMER APP</span>
                </div>

                <div class="navbar-left">
                    <ul class="nav navbar-nav no-borders">
                        <li class="dropdown font-light ">
                            <a style="pointer-events: none;"></a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-right">
                    <ul class="nav navbar-nav no-borders">
                        <li class="dropdown">
                            <a href="<?php echo BASEURL . "logout"; ?>">
                                <i class="pe-7s-upload pe-rotate-90"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Navigation -->
        <aside id="menu">
            <div id="navigation">
                <?php Helper\funcoes_helper::includes('menu'); ?>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="small-header transition animated fadeIn no-print">
                <div class="hpanel">
                    <div class="panel-body">
                        <div id="hbreadcrumb" class="pull-right">
                            <ol class="hbreadcrumb breadcrumb">
                                <li>Manifestação</li>
                                <li class="active">
                                    <span>Consultar</span>
                                </li>
                            </ol>
                        </div>
                        <h2 class="font-light m-b-xs">
                            Consulta de Manifestação
                        </h2>
                        <small>Consulta de andamento de manifestações
                        </small>
                    </div>
                </div>
            </div>
            <div class="content animate-panel" id="print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hpanel">
                            <div class="panel-body">
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
                                <?php
                                if ($consulta != '')
                                {
                                    ?>

                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <!--                                <div class="icons-box">
                                                                                <div class="infont col-md-2"><i class="fa fa-check-square-o"></i>Fiscalização<br><?php echo dataBr($consulta['dem_dt_cadastro']); ?></div>
                                                                                <div class="infont col-md-2"><i class="fa fa-square-o"></i> fa-square-o</div>
                                                                                <div class="infont col-md-2"><i class="fa fa-square-o"></i> fa-square-o</div>
                                                                                <div class="infont col-md-2"><i class="fa fa-square-o"></i> fa-square-o</div>
                                                                                <div class="infont col-md-2"><i class="fa fa-square-o"></i> fa-square-o</div>
                                                                                <div class="infont col-md-2"><i class="fa fa-square-o"></i> fa-square-o</div>
                                                                            </div>-->
                                            <div class="row bs-wizard" style="border-bottom:0;">

                                                <div class="col-xs-2 bs-wizard-step complete">
                                                    <div class="text-center bs-wizard-stepnum">Cadastro</div>
                                                    <div class="progress"><div class="progress-bar"></div></div>
                                                    <a href="#" class="bs-wizard-dot"></a>
                                                    <div class="bs-wizard-info text-center"><?php echo dataBr($consulta['dem_dt_cadastro']); ?></div>
                                                </div>

                                                <div class="col-xs-2 bs-wizard-step active">
                                                    <div class="text-center bs-wizard-stepnum">-</div>
                                                    <div class="progress"><div class="progress-bar"></div></div>
                                                    <a href="#" class="bs-wizard-dot"></a>
                                                    <div class="bs-wizard-info text-center">00/00/0000</div>
                                                </div>

                                                <div class="col-xs-2 bs-wizard-step disabled">
                                                    <div class="text-center bs-wizard-stepnum">-</div>
                                                    <div class="progress"><div class="progress-bar"></div></div>
                                                    <a href="#" class="bs-wizard-dot"></a>
                                                    <div class="bs-wizard-info text-center">00/00/0000</div>
                                                </div>

                                                <div class="col-xs-2 bs-wizard-step disabled">
                                                    <div class="text-center bs-wizard-stepnum">-</div>
                                                    <div class="progress"><div class="progress-bar"></div></div>
                                                    <a href="#" class="bs-wizard-dot"></a>
                                                    <div class="bs-wizard-info text-center">00/00/0000</div>
                                                </div>

                                                <div class="col-xs-2 bs-wizard-step disabled">
                                                    <div class="text-center bs-wizard-stepnum">-</div>
                                                    <div class="progress"><div class="progress-bar"></div></div>
                                                    <a href="#" class="bs-wizard-dot"></a>
                                                    <div class="bs-wizard-info text-center">00/00/0000</div>
                                                </div>

                                                <div class="col-xs-2 bs-wizard-step disabled">
                                                    <div class="text-center bs-wizard-stepnum">-</div>
                                                    <div class="progress"><div class="progress-bar"></div></div>
                                                    <a href="#" class="bs-wizard-dot"></a>
                                                    <div class="bs-wizard-info text-center">00/00/0000</div>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">

                                                <div class="form-group col-lg-3 border-right border-bottom">
                                                    <dl>
                                                        <dt>Protocolo:</dt>
                                                        <dd><?php echo $consulta['dem_num_solicitacao']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-3 border-right border-bottom">
                                                    <dl>
                                                        <dt>Data da solicitação:</dt>
                                                        <dd><?php echo Helper\funcoes_helper::data($consulta['dem_dt_cadastro'], 2); ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-3 border-right border-bottom">
                                                    <dl>
                                                        <dt>Origem da solicitação:</dt>
                                                        <dd><?php
                                                            echo (!empty($consulta['org_nome'])) ? ' Órgão - ' . $consulta['org_nome'] : '';
                                                            echo (!empty($consulta['dep_nome'])) ? ' Departamento - ' . $consulta['dep_nome'] : '';
                                                            ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-3 border-right border-bottom">
                                                    <dl>
                                                        <dt>Responsável pela solicitação:</dt>
                                                        <dd><?php echo $consulta['usu_nome']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-4 border-right border-bottom">
                                                    <dl>
                                                        <dt>Nome do solicitante:</dt>
                                                        <dd><?php echo $consulta['dem_nome_solicitante']; ?><br></dd>
                                                    </dl>
                                                </div>


                                                <div class="form-group col-lg-4 border-right border-bottom">
                                                    <dl>
                                                        <dt>E-mail:</dt>
                                                        <dd><?php echo $consulta['dem_email']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-4  border-right border-bottom">
                                                    <dl>
                                                        <dt>Tipo de solicitação:</dt>
                                                        <dd><?php echo $consulta['dem_cat_nome'] . " - " . $consulta['dem_cat_descricao']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-6  border-right border-bottom">
                                                    <dl>
                                                        <dt>Endereço da solicitação:</dt>
                                                        <dd><?php echo $consulta['dem_end_solicitante']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-3  border-right border-bottom">
                                                    <dl>
                                                        <dt>Bairro:</dt>
                                                        <dd><?php echo $consulta['bai_nome']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-3  border-right border-bottom">
                                                    <dl>
                                                        <dt>CEP:</dt>
                                                        <dd><?php echo $consulta['dem_cep']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-12  border-right border-bottom">
                                                    <dl>
                                                        <dt>Complemento:</dt>
                                                        <dd><?php echo $consulta['dem_complemento']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-6  border-right border-bottom">
                                                    <dl>
                                                        <dt>Ponto de referência:</dt>
                                                        <dd><?php echo $consulta['dem_ponto_referencia']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-3  border-right border-bottom">
                                                    <dl>
                                                        <dt>Telefone residencial:</dt>
                                                        <dd><?php echo $consulta['dem_tel_residencial']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <div class="form-group col-lg-3  border-right border-bottom">
                                                    <dl>
                                                        <dt>Telefone celular:</dt>
                                                        <dd><?php echo $consulta['dem_tel_celular']; ?><br></dd>
                                                    </dl>
                                                </div>

                                                <?php
                                                if ($consulta['dem_cat_id'] <= 14)
                                                {
                                                    ?>

                                                    <div class="form-group col-lg-6  border-right border-bottom">
                                                        <dl>
                                                            <dt>Nome do Infrator:</dt>
                                                            <dd><?php echo $consulta['dem_nome_infrator']; ?><br></dd>
                                                        </dl>
                                                    </div>

                                                    <div class="form-group col-lg-6  border-right border-bottom">
                                                        <dl>
                                                            <dt>Endereço do Infrator:</dt>
                                                            <dd><?php echo $consulta['dem_end_infrator']; ?><br></dd>
                                                        </dl>
                                                    </div>

                                                    <div class="form-group col-lg-3  border-right border-bottom">
                                                        <dl>
                                                            <dt>Horário da Infração:</dt>
                                                            <dd><?php echo $consulta['']; ?><br></dd>
                                                        </dl>
                                                    </div>

                                                    <div class="form-group col-lg-9  border-right border-bottom">
                                                        <dl>
                                                            <dt>Dias de ocorrência da Infração:</dt>
                                                            <dd><?php echo $consulta['']; ?><br></dd>
                                                        </dl>
                                                    </div>


                                                <?php } ?>

                                                <div class="form-group col-lg-12  border-right border-bottom">
                                                    <dl>
                                                        <dt>Objeto da solicitação:</dt>
                                                        <dd><?php echo $consulta['dem_solicitacao']; ?><br></dd>
                                                    </dl>
                                                </div>

                                            </div>


                                            <div class="form-group col-lg-12 text-right">
                                        <!--    <a href="<?php #echo BASEURL . "manifestacao/impressao/protocolo/" . $consulta['num_solicitacao'];          ?>" target="_blank" class="btn btn-info" role="button">Imprimir manifestação <?php #echo $consulta['num_solicitacao'];;          ?></a>-->

                                                <iframe style="display:none" src="<?php echo BASEURL . "manifestacao/impressao/protocolo/" . $consulta['dem_num_solicitacao']; ?>#zoom=140" width="100%" height="600px" id="pdf"></iframe>

                                                <button type="button" class="btn btn-info" onclick="document.getElementById('pdf').focus(); document.getElementById('pdf').contentWindow.print();">Imprimir manifestação</button>
                                            </div>

                                            <!-- Button trigger modal
                                                <button type="button" class="btn btn-primary btn-info" data-toggle="modal" data-target="#myModal">
                                                    Modal
                                                </button>
                                            <!-- Modal
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-body" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <iframe src="<?php #echo BASEURL . "manifestacao/impressao/protocolo/" . $consulta['num_solicitacao'];          ?>#zoom=140" width="100%" height="600px"  id="pdf"></iframe>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            <button type="button" class="btn btn-primary" onclick="document.getElementById('pdf').focus(); document.getElementById('pdf').contentWindow.print();">Imprimir</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->



                                        </div>
                                        <?php
                                    }
                                    elseif ($consulta === false)
                                    {
                                        ?>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="solicitante">Protocolo Não Encontrado</label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>






                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <?php Helper\funcoes_helper::includes('footer'); ?>
    </body>
</html>





