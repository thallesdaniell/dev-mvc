<?php ?>
<!DOCTYPE html>
<html>
<?php Helper\funcoes_helper::includes('head'); ?>
    <body class="fixed-small-header fixed-navbar fixed-sidebar fixed-footer">


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


        <aside id="menu">
            <div id="navigation">
<?php Helper\funcoes_helper::includes('menu'); ?>
            </div>
        </aside>


        <div id="wrapper">

            <div class="small-header transition animated fadeIn no-print">
                <div class="hpanel">
                    <div class="panel-body">
                        <div id="hbreadcrumb" class="pull-right">
                            <ol class="hbreadcrumb breadcrumb">
                                <li>Demanda</li>
                                <li class="active">
                                    <span>Cadastrar órgão.</span>
                                </li>
                            </ol>
                        </div>
                        <h2 class="font-light m-b-xs">
                            Cadastro de órgão.
                        </h2>
                        <small>Formulário.</small>
                    </div>
                </div>
            </div>
            <div class="content animate-panel" id="print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hpanel">
                            <div class="panel-body">

                                <form name="formulario" novalidate="novalidate" action="" id="formulario" method="post">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="form-group col-lg-12 text-right">
<?php echo $msg; ?>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="org_nome">Órgão:</label>
                                                <input type="text" class="form-control" id="org_nome" required="" aria-required="true" name="org_nome" style="width: 100%">
                                            </div>
                                            <div class="form-group col-lg-8">
                                                <label for="org_descricao">Descrição do órgão:</label>
                                                <input type="text" class="form-control" id="org_descricao" required="" aria-required="true" name="org_descricao" style="width: 100%">
                                            </div>                                 

                                            <div class="form-group col-lg-12 text-right">
                                                <label></label>
                                                <button class="btn btn-warning" type="reset">Cancelar</button>
                                                <button class="btn btn-primary" type="submit" id="cadastrar">Cadastrar</button>
<?php if ($protocolo): ?>
                                                    <a href="<?php echo BASEURL . "manifestacao/impressao/protocolo/" . $protocolo; ?>" target="_blank" class="btn btn-info" role="button">Imprimir manifestação <?php echo $protocolo; ?></a>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group col-lg-12 text-right">
                                                <label for="org_nome"></label>
                                            </div>

                                            <div class="col-lg-12">
                                                <legend> <small> </small></legend>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label >Órgãos cadastrados:</label>
                                                <ul class="list-group">
<?php foreach (help_model::listarTabela('orgao') as $value): ?>
                                                        <li class="list-group-item"><?php echo $value['org_nome'] . " - " . $value['org_descricao']; ?> </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php Helper\funcoes_helper::includes('footer'); ?>

                </body>
                </html>

