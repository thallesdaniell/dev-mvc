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
            <nav role="navigation">
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

        <?php Helper\funcoes_helper::includes('menu'); ?>
        <div id="wrapper">
            <div class="small-header transition animated fadeIn">
                <div class="hpanel">
                    <div class="panel-body">
                        <div id="hbreadcrumb" class="pull-right">
                            <ol class="hbreadcrumb breadcrumb">
                                <li>Home</li>
                                <li class="active">
                                    <span>Início</span>
                                </li>
                            </ol>
                        </div>
                        <h2 class="font-light m-b-xs">
                            Home
                        </h2>
                        <small>Informações do sistema e comunicados</small>
                    </div>
                </div>
            </div>

            <div class="content animate-panel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hpanel">
                            <div class="panel-body">
                                <h1>SISGES - Sistema de Gestão da SEMA </h1>
                                <p class="lead">Sistema desenvolvido pelo DTI - Departamento de Tecnologia da Informação.</p>
                                <h3 id="grid-intro">Informações</h3>
                                <p>O SISGES tem como objetivo otimizar e organizar o controle de protocolos internamente.</p>
                                <ul>
                                    <li>Módulos por departamentos.<?php echo $nome; ?></li>
                                    <li>Rastreamento de processos.<?php echo $idade; ?></li>
                                    <li>Integração de informações.<?php echo $sexo; ?></li>
                                </ul>
                                <h3 id="grid-intro">Avisos</h3>
                                <p>Para um funcionamento correto segue algumas normas.</p>
                                <ul>
                                    <li>O sistema desloga após 10 minutos de ociosidade.</li>
                                    <li>Em caso de dúvidas ou problemas que ocorram no acesso ou manuseio, procure o DTI da SEMA.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php Helper\funcoes_helper::includes('footer'); ?>
    </body>
</html>




